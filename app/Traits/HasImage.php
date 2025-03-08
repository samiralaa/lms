<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

trait HasImage
{
    /**
     * Upload and attach an image to a model (polymorphic).
     *
     * @param UploadedFile $image
     * @param string $directory
     * @return Image
     */
    public function uploadImage(UploadedFile $image, string $directory = 'uploads')
    {
        // Store image in public storage
        $imagePath = $image->store($directory, 'public');

        // Delete old image if exists (optional, if updating)
        if ($this->images()->exists()) {
            $this->deleteImage();
        }

        // Attach new image to model
        return $this->images()->create(['url' => $imagePath]);
    }

    /**
     * Delete the existing image from storage and database.
     */
    public function deleteImage()
    {
        $image = $this->images()->first();

        if ($image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
    }

    /**
     * Relationship: A model can have multiple images (polymorphic).
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
