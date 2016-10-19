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
        $widthPath = $width != '' ? $width : '000';
        $heightPath = $height != '' ? 'x' . $height : 'x000';
        $folderPath = 'uploads/post/' . $widthPath . $heightPath;

        if (! File::exists(public_path($folderPath))) {
            File::makeDirectory(public_path($folderPath), 0775, true, true);
        }

        return $folderPath;
    }

    public function all()
    {
        return MediaModel::with('mediaSizes')->orderBy('id', 'desc')->get();
    }

    public function saveImage($file)
    {
        $imageName = $file->getClientOriginalName();
        $folder = 'uploads/post/';
        if (! File::exists(public_path($folder))) {
            File::makeDirectory(public_path($folder), 0775, true, true);
        }
        $media = $this->mediaModel->create([
            'title' => $imageName,
            'file_name' => $imageName
        ]);
        $image = Image::make($file);
        $publicUrl = $folder . $imageName;
        $imagePath = public_path($publicUrl);
        $image->save($imagePath);
        return [
            'filename' => $imageName,
            'status' => 'OK',
            'mediaId' => $media->id,
        ];
    }
}