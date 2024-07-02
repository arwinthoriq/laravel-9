<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'detail'
    ];

    
    public function transaksi(){
        return $this->hasMany('Transaksi::class');
        }
        public function user(){
            return $this->belongsTo('User::class');
            }
}