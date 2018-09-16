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
        // $this->call(UsersTableSeeder::class);
        // Descomentamos la linea que venia por default para hacer uso de nuestro seeder
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
