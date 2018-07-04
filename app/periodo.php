<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model{
    
    protected $table = 'periodo';
    
    protected $primaryKey = 'id';
              
    protected $fillable = array('periodo','sueldo');
    
    protected $hidden = ['created_at','updated_at'];
    
}