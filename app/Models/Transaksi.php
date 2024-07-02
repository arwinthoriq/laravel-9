<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class transaksi extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $table = 'transaksi';
    protected $guarded = [];

    
    public function product(){
        return $this->belongsTo('Product::class');
        }
        public function user(){
            return $this->belongsTo('User::class');
            }
}