<?php

namespace App\Http\Controllers;

use App\Service\Media;
use Illuminate\Http\Request;

use App\Http\Requests;
use Intervention\Image\Facades\Image;
use JildertMiedema\LaravelPlupload\Facades\Plupload;

class MediaController extends Controller
{
    /**
     * @var Media
     */
    private $mediaService;

    /**
     * MediaController constructor.
     */
    public function __construct(Media $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public  function saveImage(Request $request) {
        $imageSrc = $request->input('image_src');
        $imageName = $request->input('image_name');

        $image = $this->mediaService->saveImageOnAllSizes($imageSrc, $imageName);

        return $image->toJson();
    }

    public function getMedia()
    {
        $medias = $this->mediaService->all();
        return $medias->toJson();
    }

    public function uploadImageHandler(Request $request)
    {
        return Plupload::receive('file', function ($file) {
            return $this->mediaService->saveImage($file);
        });
    }
}
