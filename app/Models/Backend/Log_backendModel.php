<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Log_backendModel extends Model
{
    protected $table = 'log_backend';
    protected $primaryKey = 'id';
    protected $fillable = ['id','auth_id','type_status','error_log','error_line','url','created','updated'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;


    
}
