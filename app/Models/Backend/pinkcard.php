<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinkcard extends Model
{
    use HasFactory;

    protected $table = 'pinkcard';
    protected $primaryKey = 'id';
    protected $fillable = ['status','title_id','created_by','received_by','notes'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
