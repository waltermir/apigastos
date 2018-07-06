<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gastosPeriodo extends Model
{
    protected $table = 'gasto_periodo';
    
    protected $primaryKey = 'id';
              
    protected $fillable = array('periodo','gasto','sueldo');
    
    protected $hidden = ['created_at','updated_at'];
}
