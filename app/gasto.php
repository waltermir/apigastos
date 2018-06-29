<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model{
    
    protected $table = 'gasto';
    
    protected $primaryKey = 'id';
              
    protected $fillable = array('codigo','descripcion');
    
    protected $hidden = ['created_at','updated_at'];
    
}