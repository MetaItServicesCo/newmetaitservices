<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImageTrait
{
    public function uploadImage($file, $directory)
    {
        // $file should be an instance of UploadedFile
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            $originalName = $file->getClientOriginalName();
            $filename = time() . '_' . $originalName;
            $file->storeAs($directory, $filename, 'public');

            return $filename;
        }

        return null;
    }

    public function updateImage(Request $request, $inputName, $directory, $oldFileName = null)
    {
        $removeKey = $this->buildRemoveKey($inputName);

        if ($this->shouldRemoveImage($request, $removeKey)) {
            $this->deleteStoredFile($this->buildStoragePath($directory, $oldFileName));
            return null;
        }

        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);

            $this->deleteStoredFile($this->buildStoragePath($directory, $oldFileName));

            return $this->uploadImage($file, $directory);
        }

        return $oldFileName;
    }

    public function updateStoredFile(Request $request, string $inputName, string $directory, ?string $oldPath = null)
    {
        $removeKey = $this->buildRemoveKey($inputName);

        if ($this->shouldRemoveImage($request, $removeKey)) {
            $this->deleteStoredFile($oldPath);
            return null;
        }

        if ($request->hasFile($inputName)) {
            $this->deleteStoredFile($oldPath);
            return $request->file($inputName)->store($directory, 'public');
        }

        return $oldPath;
    }

    public function removeGalleryImages(array $existing, array $removeList, ?string $directory = null): array
    {
        $removeList = array_values(array_filter($removeList ?? []));

        if (empty($removeList) || empty($existing)) {
            return $existing;
        }

        $remaining = [];
        foreach ($existing as $image) {
            if (in_array($image, $removeList, true)) {
                $this->deleteStoredFile($this->buildStoragePath($directory, $image));
                continue;
            }

            $remaining[] = $image;
        }

        return array_values($remaining);
    }


    // Helper for multiple gallery images
    public function uploadMultipleImages($existingImages, $files, $directory)
    {
        foreach ($files as $file) {
            $existingImages[] = $this->uploadImage($file, $directory);
        }
        return $existingImages;
    }

    public function handleCKEditorUpload(Request $request, $directory = 'ckeditor')
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = $this->uploadImage($file, $directory);

            if ($filename) {
                $url = asset('storage/' . $directory . '/' . $filename);
                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $filename,
                    'url' => $url
                ]);
            }
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'File upload failed.']
        ]);
    }

    protected function buildRemoveKey(string $inputName): string
    {
        $normalized = preg_replace('/\W+/', '_', $inputName);
        $normalized = trim($normalized, '_');

        return 'remove_' . $normalized;
    }

    protected function shouldRemoveImage(Request $request, string $removeKey): bool
    {
        $value = $request->input($removeKey);

        return $value === '1' || filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    protected function buildStoragePath(?string $directory, ?string $fileName): ?string
    {
        if (! $fileName) {
            return null;
        }

        if (! $directory) {
            return $fileName;
        }

        if (str_starts_with($fileName, $directory . '/')) {
            return $fileName;
        }

        return $directory . '/' . $fileName;
    }

    protected function deleteStoredFile(?string $path): void
    {
        if (! $path) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
