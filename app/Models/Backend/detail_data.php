<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_data extends Model
{
    use HasFactory;

    protected $table = 'detail_data';
    protected $primaryKey = 'id';
    protected $fillable = ['title_id','type','created_by','sent','sent_by','notes','deleted_status'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
