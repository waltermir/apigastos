<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\gasto;

class GastosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voi
     */
    public function run()
    {
        Gasto::truncate();
        
        Gasto::create
        ([
            'codigo' => 'AMEX',
            'descripcion' => 'American Express'
        ]);
        
        Gasto::create
        ([
            'codigo' => 'ABL',
            'descripcion' => 'Alumbrado Barrido y Limpieza'
        ]);
        
         Gasto::create
        ([
            'codigo' => 'VISA',
            'descripcion' => 'Tarjeta Visa'
        ]);
        
    }
}
?>