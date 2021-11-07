<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class title_data extends Model
{
    use HasFactory;

    protected $table = 'title_data';
    protected $primaryKey = 'id';
    protected $fillable = ['type_name','country','employer_id','employee_id','created_by','received_by','notes'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
