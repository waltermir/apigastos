<?php
use Illuminate\Database\Seeder;

class Oaut2Seeder extends Seeder
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
        
        DB::table('oauth_clients')->insert
        (
            [
                'id' => "1",
                'secret' => 'ankara',
                'name' => 'walterm'
            ]
        );
        
        
    }
}
