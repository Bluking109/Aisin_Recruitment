<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait FileHandler
{
    protected $typeFile;
    protected $resize;
    protected $ownerId;

    /**
     * Upload file (multiple maupun single)
     * @param  object $files file
     * @param  string $type  tipe dari file
     * @param  string $title nama dari title
     * @param  string $deletedFiles file yang akan di replace
     * @return string untuk multiple string berupa json
     */
    protected function uploadFiles($files, $type, $title, $deletedFiles = null, $isPublic = false)
    {
        $deletedFiles = json_decode($deletedFiles, true) ?? $deletedFiles;
        $folder = 'uploads';
        if ($isPublic) {
            $folder = 'public';
        }

        if (is_array($deletedFiles)) {
            foreach ($deletedFiles as $key => $value) {
                $deletedFiles[$key] = $folder . '/' . $type . '/' . $value;
            }
        } elseif (is_string($deletedFiles)) {
            $deletedFiles = $folder . '/' . $type . '/' . $deletedFiles;
        }

        if ($deletedFiles) {
            $this->deleteFile($deletedFiles);
        }

        if (is_array($files)) {
            $filenames = [];

            foreach ($files as $value) {
                $filenames[] = $this->uploadFiles($value, $type, $title, null, $isPublic);
            }

            return json_encode($filenames);
        } else {
            $filename = uniqid($type . '-' . str_replace(' ', '-', strtolower($title)) . '-') . '.' . $files->getClientOriginalExtension();

            $files->storeAs(
                $folder . '/' . $type . '/', $filename
            );

            return $filename;
        }
    }

    /**
     * delete files based on path
     * @param  void $paths
     * @return boolean
     */
    protected function deleteFile($paths)
    {
        return Storage::delete($paths);
    }
}