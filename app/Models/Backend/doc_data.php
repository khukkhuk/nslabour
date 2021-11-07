<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doc_data extends Model
{
    use HasFactory;

    protected $table = 'doc_data';
    protected $primaryKey = 'id';
    protected $fillable = ['detail_id','doc_name','path','deleted_status'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
