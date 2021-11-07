<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class health extends Model
{
    use HasFactory;

    protected $table = 'health';
    protected $primaryKey = 'id';
    protected $fillable = ['title_id','business_type','company','inspector','insurance_create','insurance_expire','insurance_period','insurance_right','social_security','status','notes'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
