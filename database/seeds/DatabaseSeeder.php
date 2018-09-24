<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('gastos_periodo')->truncate();
         DB::table('gasto')->truncate();
         $this->call('GastosSeeder');
         DB::table('periodo')->truncate();
         $this->call('PeriodoSeeder');
         DB::table('oauth_clients')->truncate();
         $this->call('Oaut2Seeder');
         
    }
}
?>