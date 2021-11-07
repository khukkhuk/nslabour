<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Backend\Log_backendModel;

class Log_backendController extends Controller
{
    public static function save_logbackend($auth_id, $type_status, $error_log, $error_line, $error_url)
    {
        $data = new Log_backendModel;
        $data->auth_id = $auth_id;
        $data->type_status = $type_status;
        $data->error_log = $error_log;
        $data->error_line = $error_line;
        $data->error_url = $error_url;
        $data->created = date('Y-m-d H:i:s');
        $data->updated = date('Y-m-d H:i:s');
        if($data->save())
        {
            return $data->id;
        }
    }
}


