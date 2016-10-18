<?php

namespace App\Service;


use App\Models\Media as MediaModel;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Media
{
    /**
     * @var MediaModel
     */
    private $mediaModel;

    /**
     * Media constructor.
     * @param MediaModel $mediaModel
     */
    public function __construct(MediaModel $mediaModel)
    {
        $this->mediaModel = $mediaModel;
    }

    public function saveImageOnAllSizes($imageSrc, $imageName)
    {
        $sizes = config('image.sizes');

        $imageName = str_cleaner($imageName);

        $media = $this->mediaModel->create([
            'title' => $imageName,
            'file_name' => $imageName
        ]);

        $image = Image::make($imageSrc);

        foreach ($sizes as $size) {
            $width = $size['width'];
            $height = $size['height'];
            $imagePath = $this->createFolderIfNotExists($width, $height);

            $image->resize($width, $height);
            if ($image->save(public_path($imagePath . '/' . $imageName))) {
                $media->mediaSizes()->create([
                    'title' => $imageName,
                    'path' => $imagePath . '/' . $imageName,
                    'mime_type' => $image->mime(),
                    'width' => $width,
                    'height' => $height
                ]);
            }
        }

        return $media;
    }

    private function createFolderIfNotExists($width, $height)
    {
        $fullPath = 'uploads/post/' . $width . 'x' . $height;

        if (! File::exists(public_path($fullPath))) {
            File::makeDirectory(public_path($fullPath), 0775, true, true);
        }

        return $fullPath;
    }

    public function all()
    {
        return MediaModel::with('mediaSizes')->orderBy('id', 'desc')->get();
    }
}