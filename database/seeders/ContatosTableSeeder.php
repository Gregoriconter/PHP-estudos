<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('Contato')->insert([
			'nome' => 'Gregori',
	        'telefone' => '(54) 991240338',
	        'email' => 'gregori_conter@hotmail.com',
	    ]);

    }
}
