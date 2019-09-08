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
    protected function uploadFiles($files, $type, $title, $deletedFiles = null)
    {
        $deletedFiles = json_decode($deletedFiles, true) ?? $deletedFiles;

        if (is_array($deletedFiles)) {
            foreach ($deletedFiles as $key => $value) {
                $deletedFiles[$key] = 'uploads/' . $type . '/' . $value;
            }
        } elseif (is_string($deletedFiles)) {
            $deletedFiles = 'uploads/' . $type . '/' . $deletedFiles;
        }

        if ($deletedFiles) {
            $this->deleteFile($deletedFiles);
        }

        if (is_array($files)) {
            $filenames = [];

            foreach ($files as $value) {
                $filenames[] = uploadFiles($value, $type, $title);
            }

            return json_encode($filenames);
        } else {
            $filename = uniqid($type . '-' . str_replace(' ', '-', strtolower($title)) . '-') . '.' . $files->getClientOriginalExtension();

            $files->storeAs(
                'uploads/' . $type . '/', $filename
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