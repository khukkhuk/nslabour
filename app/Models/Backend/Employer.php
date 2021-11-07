<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'employer';
    protected $primaryKey = 'id';
    protected $fillable = ['type','id_card','legal_number','company_name','prefix_th','name_th','surname_th','nickname_th','image','prefix_en','name_en','surname_en','nickname_en','address_th','group_th','road_th','province_id','district_id','subdistrict_id','address_en','group_en','road_en','zipcode','tel_number','email','delete_status'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
