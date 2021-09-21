<?php

namespace App\Utilities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostResourceUtilities
{
    protected static $defaultThumbnail = 'thumbnails/default.jpg';

    /**
     * Generate the post excerpt from body
     *
     * @param string $body
     * @return string
     */
    public static function generateExcerpt(string $body) : string
    {
        return Str::limit( strip_tags($body), 200, '...' );
    }

    /**
     * Get the current authenticated user id
     *
     * @return int
     */
    public static function getAuthorId() : int
    {
        return auth()->user()->id;
    }

    /**
     * Store the post thumbnail
     *
     * @param $thumbnail
     * @return string
     */
    public static function storeThumbnail($thumbnail) : string
    {
        if (! $thumbnail) {
            return self::$defaultThumbnail;
        }

        return $thumbnail->store('thumbnails');
    }

    /**
     * Update the post thumbnail
     *
     * @param $thumbnail
     * @return string
     */
    public static function updateThumbnail($thumbnail) : string
    {
        $oldThumbnail = request()->post->thumbnail;

        if (! $thumbnail) {
            return $oldThumbnail;
        }

        static::deleteThumbnail($oldThumbnail);

        return $thumbnail->store('thumbnails');
    }

    /**
     * Delete the post thumbnail
     *
     * @param $thumbnail
     * @return null
     */
    public static function deleteThumbnail($thumbnail)
    {
        if ($thumbnail !== self::$defaultThumbnail) {
            Storage::delete($thumbnail);
        }
    }
}
