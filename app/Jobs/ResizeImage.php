<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Enums\Unit;
use Spatie\Image\Image;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    // Uniformato $fileName con la N maiuscola
    private $w;

    private $h;

    private $path;

    private $fileName;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;

        // Usato $this->fileName con la N maiuscola
        $srcPath = storage_path('app/public/'.$this->path.'/'.$this->fileName);
        $destPath = storage_path('app/public/'.$this->path."/crop_{$w}x{$h}_".$this->fileName);

        Image::useImageDriver(ImageDriver::Gd)->load($srcPath)
            ->fit(Fit::Crop, $w, $h)
            ->watermark(
                base_path('public/images/logo.png'),
                position: AlignPosition::Center,
                paddingX: 0,
                paddingY: 0,
                paddingUnit: Unit::Percent,
                width: 60,
                widthUnit: Unit::Percent,
                alpha: 60,
            )
            ->save($destPath);
    }
}
