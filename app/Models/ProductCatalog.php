<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pdf',
        'image'
    ];

    /**
     * PDFs are stored OUTSIDE the public folder, so they can never be
     * opened by typing a URL. Only the controllers below can read them.
     */
    public function pdfFullPath(): ?string
    {
        if (!$this->pdf) {
            return null;
        }
        return storage_path('app/private/' . ltrim($this->pdf, '/'));
    }
}
