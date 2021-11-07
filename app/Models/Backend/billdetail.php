<?php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billdetail extends Model
{
    use HasFactory;
    
    protected $table = 'bill_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['bill_id','amount','type_id'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
?>