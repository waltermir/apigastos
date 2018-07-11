<?php
use App\periodo;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    //     Periodo::truncate();
        
        Periodo::create
        ([
            'periodo' => '2018-07-01',
            'sueldo' => 45158.00
        ]);
        
        
        
    }
}
