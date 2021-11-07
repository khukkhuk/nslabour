<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['prefix','name','surname','gender','image','b_date','age','b_place','tel_number','cople_status','business','position','workplace_type','address_th','group_th','road_th','address_en','group_en','road_en','province_id','district_id','subdistrict_id','zipcode','m_prefix','m_name','m_surname','f_prefix','f_name','f_surname','passport_type','passport_number','passport_place','passport_country','passport_create','passport_expire','permit_number','permit_created','permit_expire','employer_id','delete_status'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false; 
}
