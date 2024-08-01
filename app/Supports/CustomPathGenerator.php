<?php

namespace App\Supports;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        // Menggunakan ID user sebagai bagian dari path
        $modelName = strtolower(class_basename($media->model_type));
        $modelId = $media->model_id;
        $collectionName = $media->collection_name;

        return "{$modelName}/{$modelId}/{$collectionName}/{$media->id}/";
    }

    public function getPathForConversions(Media $media): string
    {
        $modelName = strtolower(class_basename($media->model_type));
        $modelId = $media->model_id;
        $collectionName = $media->collection_name;

        return "{$modelName}/{$modelId}/{$collectionName}/{$media->id}/conversions/";
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        $modelName = strtolower(class_basename($media->model_type));
        $modelId = $media->model_id;
        $collectionName = $media->collection_name;

        return "{$modelName}/{$modelId}/{$collectionName}/{$media->id}/responsive-images/";
    }
}
