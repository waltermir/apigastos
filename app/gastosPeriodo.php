<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GastosPeriodo extends Model
{
    protected $table = 'gastos_periodo';
    
    protected $primaryKey = 'id';
              
    protected $fillable = array('periodo_id','gasto_id','pagar');
    
    protected $hidden = ['created_at','updated_at'];
}
