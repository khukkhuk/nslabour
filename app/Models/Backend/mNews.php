<?php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    
    protected $table = 'employer';
    protected $primaryKey = 'id';
    protected $fillable = ['type','id_card','legal_number','company_name','prefix_th','name_th','surname_th','nickname_th'];
}
?>