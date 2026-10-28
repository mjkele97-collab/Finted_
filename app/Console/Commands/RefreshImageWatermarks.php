<?php

namespace App\Console\Commands;

use App\Jobs\ResizeImage;
use App\Models\Image as ArticleImage;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;

#[Signature('app:refresh-image-watermarks')]
#[Description('Rigenera le immagini degli annunci con il watermark aggiornato')]
class RefreshImageWatermarks extends Command
{
    public function handle(): int
    {
        $updatedImages = 0;
        $skippedImages = 0;

        ArticleImage::query()
            ->whereNotNull('path')
            ->chunkById(100, function (Collection $images) use (&$updatedImages, &$skippedImages): void {
                foreach ($images as $image) {
                    if (! $image->path || ! Storage::disk('public')->exists($image->path)) {
                        $this->warn("Immagine originale non trovata: {$image->path}");
                        $skippedImages++;

                        continue;
                    }

                    Bus::dispatchSync(new ResizeImage($image->path, 800, 1200));
                    $updatedImages++;
                }
            });

        $this->info("Immagini aggiornate: {$updatedImages}.");

        if ($skippedImages > 0) {
            $this->warn("Immagini saltate perché l'originale non esiste: {$skippedImages}.");
        }

        return self::SUCCESS;
    }
}
