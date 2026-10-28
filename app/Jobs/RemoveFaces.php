<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\Image as VisionImage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Image as SpatieImage;

class RemoveFaces implements ShouldQueue
{
    use Queueable;

    private $article_image_id;

    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    public function handle(): void
    {
        $image = Image::find($this->article_image_id);
        if (! $image) {
            return;
        }

        $src = storage_path('app/public/'.$image->path);
        $imageContent = file_get_contents($src);
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credential_ottobre2026.json'));

        $googleVisionClient = new ImageAnnotatorClient;
        $googleImage = new VisionImage(['content' => $imageContent]);

        $googleFeature = new Feature;
        $googleFeature->setType(Type::FACE_DETECTION);

        $request = new AnnotateImageRequest;
        $request->setImage($googleImage);
        $request->setFeatures([$googleFeature]);

        $batchRequest = new BatchAnnotateImagesRequest;
        $batchRequest->setRequests([$request]);

        $responseBatch = $googleVisionClient->batchAnnotateImages($batchRequest);
        $responses = $responseBatch->getResponses();
        $faces = $responses[0]->getFaceAnnotations();

        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();
            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }

            $x = $bounds[0][0];
            $y = $bounds[0][1];
            $width = $bounds[2][0] - $bounds[0][0];
            $height = $bounds[2][1] - $bounds[0][1];

            SpatieImage::useImageDriver(ImageDriver::Gd)->load($src)
                ->watermark(
                    base_path('public/images/image.png'),
                    AlignPosition::TopLeft,
                    paddingX: $x,
                    paddingY: $y,
                    width: $width,
                    height: $height,
                    fit: Fit::Stretch,
                )
                ->save($src);
        }

        $googleVisionClient->close();
    }
}
