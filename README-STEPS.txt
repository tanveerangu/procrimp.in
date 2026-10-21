SECURE VIEW-ONLY CATALOG - STEPS
================================
1. Upload these 7 files to your server (same folder paths, replace old files).

2. MOVE the PDFs out of the public folder (very important):
     mkdir -p storage/app/private/product_catalogs
     mv public/product_catalogs/*.pdf storage/app/private/product_catalogs/
   (Database needs NO change: it already stores "product_catalogs/filename.pdf".)

3. Clear caches:
     php artisan route:clear && php artisan view:clear && php artisan cache:clear

4. In .env set APP_DEBUG=false (it is true right now on production).

5. Test:
   - /catalog -> "View Catalog" -> form -> viewer opens, no download button.
   - https://procrimp.in/product_catalogs/<old file name>.pdf  -> must give 404.
   - /product-catelogs/download/1 -> must give 404.
