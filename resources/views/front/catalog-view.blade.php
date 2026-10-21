@extends('layouts.app')

@section('main')

    <style>
        .secure-viewer-wrap { background: #e9ecef; padding: 20px 0 40px; }
        .secure-viewer-bar {
            max-width: 920px; margin: 0 auto 15px; padding: 0 15px;
            display: flex; justify-content: space-between; align-items: center; gap: 10px;
        }
        .secure-viewer-bar h4 { margin: 0; font-size: 18px; }
        #pdfPages { max-width: 920px; margin: 0 auto; padding: 0 15px; }
        .pdf-page {
            position: relative; background: #fff; margin: 0 auto 14px;
            box-shadow: 0 2px 10px rgba(0,0,0,.2); width: 100%;
        }
        .pdf-page canvas { display: block; width: 100%; height: auto; }
        #pdfStatus { text-align: center; padding: 30px; font-weight: 600; }
        .secure-viewer-wrap, .secure-viewer-wrap * {
            -webkit-user-select: none; -moz-user-select: none; user-select: none;
            -webkit-touch-callout: none;
        }
        .pdf-page canvas { pointer-events: none; }
        /* Printing shows nothing */
        @media print { body * { display: none !important; } body::after { content: "Printing is not allowed."; display: block; } }
    </style>

    <section class="secure-viewer-wrap">
        <div class="secure-viewer-bar">
            <h4>{{ $catalog->title }}</h4>
            <div class="d-flex gap-2">
                <a href="{{ $downloadUrl }}" class="btn-1 btn-3"><span>Download PDF</span></a>
                <a href="{{ route('front.catalog') }}" class="btn-1 btn-3"><span>Back to Catalog</span></a>
            </div>
        </div>
        <div id="pdfStatus">Loading catalog…</div>
        <div id="pdfPages"></div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        (function () {
            const FILE_URL = @json($fileUrl);
            const WATERMARK = @json($watermark);

            pdfjsLib.GlobalWorkerOptions.workerSrc =
                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

            const pagesBox = document.getElementById('pdfPages');
            const statusBox = document.getElementById('pdfStatus');

            // ---- Deterrents (they stop casual users, not a determined attacker) ----
            ['contextmenu', 'dragstart', 'selectstart', 'copy', 'cut'].forEach(function (evt) {
                document.addEventListener(evt, function (e) { e.preventDefault(); });
            });
            document.addEventListener('keydown', function (e) {
                const k = (e.key || '').toLowerCase();
                if ((e.ctrlKey || e.metaKey) && ['s', 'p', 'u', 'c', 'a'].includes(k)) e.preventDefault();
                if (e.key === 'F12' || e.key === 'PrintScreen') e.preventDefault();
            });

            // ---- Burn the visitor's details into the page image ----
            function drawWatermark(ctx, w, h) {
                ctx.save();
                ctx.globalAlpha = 0.13;
                ctx.fillStyle = '#000';
                const size = Math.max(14, Math.round(w / 38));
                ctx.font = 'bold ' + size + 'px Arial, sans-serif';
                ctx.translate(w / 2, h / 2);
                ctx.rotate(-Math.PI / 6);
                const stepY = size * 7;
                const stepX = ctx.measureText(WATERMARK).width + size * 4;
                for (let y = -h; y < h; y += stepY) {
                    for (let x = -w; x < w; x += stepX) {
                        ctx.fillText(WATERMARK, x, y);
                    }
                }
                ctx.restore();
            }

            fetch(FILE_URL, { credentials: 'same-origin', cache: 'no-store' })
                .then(function (r) {
                    if (!r.ok) throw new Error('HTTP ' + r.status);
                    return r.arrayBuffer();
                })
                .then(function (buf) {
                    return pdfjsLib.getDocument({ data: new Uint8Array(buf) }).promise;
                })
                .then(async function (pdf) {
                    statusBox.style.display = 'none';

                    const first = await pdf.getPage(1);
                    const v1 = first.getViewport({ scale: 1 });
                    const ratio = v1.height / v1.width;

                    const observer = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (!entry.isIntersecting) return;
                            const holder = entry.target;
                            observer.unobserve(holder);
                            renderPage(holder, parseInt(holder.dataset.page, 10));
                        });
                    }, { rootMargin: '600px 0px' });

                    for (let i = 1; i <= pdf.numPages; i++) {
                        const holder = document.createElement('div');
                        holder.className = 'pdf-page';
                        holder.dataset.page = i;
                        holder.style.aspectRatio = (1 / ratio).toString();
                        pagesBox.appendChild(holder);
                        observer.observe(holder);
                    }

                    async function renderPage(holder, num) {
                        const page = await pdf.getPage(num);
                        const base = page.getViewport({ scale: 1 });
                        const cssWidth = holder.clientWidth || 900;
                        const dpr = Math.min(window.devicePixelRatio || 1, 2);
                        const scale = (cssWidth / base.width) * dpr;
                        const viewport = page.getViewport({ scale: scale });

                        const canvas = document.createElement('canvas');
                        canvas.width = Math.floor(viewport.width);
                        canvas.height = Math.floor(viewport.height);
                        const ctx = canvas.getContext('2d');

                        await page.render({ canvasContext: ctx, viewport: viewport }).promise;
                        drawWatermark(ctx, canvas.width, canvas.height);

                        holder.style.aspectRatio = (canvas.width / canvas.height).toString();
                        holder.appendChild(canvas);
                    }
                })
                .catch(function (err) {
                    console.error(err);
                    statusBox.textContent = 'Sorry, this catalog link has expired or is not available. Please go back and submit the form again.';
                });
        })();
    </script>

@endsection
