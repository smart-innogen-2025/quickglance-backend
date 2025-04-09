<?php

use Illuminate\Support\Str;

if (!function_exists('convertKeysToCamelCase')) {
    function convertKeysToCamelCase($data)
    {
        if (is_array($data)) {
            return collect($data)->mapWithKeys(function ($value, $key) {
                $newKey = is_string($key) ? Str::camel($key) : $key;

                return [$newKey => convertKeysToCamelCase($value)];
            })->toArray();
        }

        // If it's a collection (Laravel collection), convert to array then recurse
        if ($data instanceof \Illuminate\Support\Collection) {
            return convertKeysToCamelCase($data->toArray());
        }

        return $data;
    }
}
