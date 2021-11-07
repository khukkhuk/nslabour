<?php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    
    protected $table = 'bill';
    protected $primaryKey = 'id';
    protected $fillable = ['bill_number','bill_date','company','tax_id','bill_type','type','income_type','name','tel_number','note','saver','payee','payer'];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamp = false;
}
?>