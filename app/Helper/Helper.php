<?php

namespace App\Helper;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function resJson(string $message, $data, int $code)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function uploadFile($file, $dir)
    {
        if (!$file instanceof \Illuminate\Http\UploadedFile) {
            throw new \InvalidArgumentException('The file must be an instance of UploadedFile.');
        }
        $originalName = $file->getClientOriginalName();
        if (preg_match('/\.php$/i', $originalName) || preg_match('/[<>:"\/|?*\x00-\x1F]/', $originalName)) {
            throw new \Exception('The file name or extension contains unsupported characters');
        }
        $safeName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($dir, $safeName);
        return $path;
    }
    public static function deleteFile($file)
    {
        $url = Storage::url('/');
        $file = str_replace($url, '', $file);
        if (Storage::exists($file)) {
            Storage::delete($file);
        }
    }
    public static function jsonToArraySourceFile($json_file){
        $converted_file = json_decode($json_file, true);
        if (is_array($converted_file)) {
            return array_map(function ($file) {
                return Storage::url($file);
            }, $converted_file);
        }
        return null;
    }

    public static function parseEncodeQueryParams(string $params)
    {
        // Parse the URL and extract the query string
        $query = base64_decode($params);
        // Parse query string into an associative array
        parse_str($query, $params);

        return $params;
    }

    public static function currencyFormatting($string, $currencySymbol = '', $currencySymbolPosition ='before', $decimal = 0, $decimal_separator = ',', $thousand = '.')
    {
        $value = '';
        if(!empty($currencySymbol))
        {
            if($currencySymbolPosition == 'before')
            {
                $value .= $currencySymbol;

                return $value . ' ' . number_format($string, $decimal, $decimal_separator, $thousand);
            }

            if($currencySymbolPosition == 'after')
            {
                $value .= $currencySymbol;
                return number_format($string, $decimal, $decimal_separator, $thousand) . ' '. $value;
            }
        }else{
            return number_format($string, $decimal, $decimal_separator, $thousand);
        }
    }
}
