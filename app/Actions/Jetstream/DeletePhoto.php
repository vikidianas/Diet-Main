<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Storage;

trait DeletePhoto
{
    public function deletePhoto(bool $null = false)
    {
        if (is_null($this->profile_photo_path)) {
            return;
        }

        Storage::disk($this->profilePhotoDisk())->delete($this->profile_photo_path);

        if ($null) {
            $this->setPhotoToNull();
        }
    }

    public function setPhotoToNull(): void
    {
        $this->forceFill([
            'profile_photo_path' => null,
        ])->save();
    }
}
