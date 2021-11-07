<?php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setdatabase extends Model
{
    use HasFactory;
        protected $table = 'employee';
        protected $primaryKey = 'id';
        protected $fillable = ['prefix','name','surname','gender','b_date','age','b_place','tel_number'];
}
?>