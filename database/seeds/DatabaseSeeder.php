<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//Creación de datos por defecto en la base de datos
        $this->call(PermissionsTableSeeder::class);
    }
}
