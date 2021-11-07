<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follower_data extends Model
{
    use HasFactory;

    protected $table = 'follower_data';
    protected $primaryKey = 'id';
    protected $fillable = ['prefix','name','surname','employee_id','image'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
