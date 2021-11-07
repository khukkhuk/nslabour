<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_data extends Model
{
    use HasFactory;

    protected $table = 'employee_data';
    protected $primaryKey = 'id';
    protected $fillable = ['prefix','name','surname','gender','image','b_date','age','b_place','tel_number','cople_status','business','position','workplace_type','workplace_address_th','workplace_group_th','workplace_road_th','workplace_address_en','workplace_group_en','workplace_road_en','workplace_province_id','workplace_district_id','workplace_subdistrict_id','workplace_zipcode','m_prefix','m_name','m_surname','f_prefix','f_name','f_surname','passport_type','passport_number','passport_place','passport_country','passport_create','passport_expire','permit_number','permit_create','permit_expire','employer_id','delete_status'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false; 
}
