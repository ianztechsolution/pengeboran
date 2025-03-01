<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Media;
use App\Helper\Helper;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function destroyByPath(string $media)
    {
        $media = Media::find($media);
        try {
            DB::beginTransaction();
            Helper::deleteFile($media->path);
            $media->delete();
            DB::commit();
            return Helper::resJson('success', null, 200);
        } catch (Throwable $th) {
            DB::rollback();
            return Helper::resJson($th->getMessage(), $th, 500);
        }
    }
}
