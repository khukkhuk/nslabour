<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typedetail extends Model
{
    use HasFactory;

    protected $table = 'type_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['type_id','name','cost','created'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
