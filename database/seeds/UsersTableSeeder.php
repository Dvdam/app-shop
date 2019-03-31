<?php


use Illuminate\Database\Seeder;

// Obtuvimos ese error al correr " php artisan db:seed"
// Symfony\Component\Debug\Exception\FatalThrowableError  : Class 'User' not found
// para solventar ese error aplicamos el sigueitne codigo
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos nuestro seeder
        User::create([
            'name'=> 'David',
            'username' => 'admin',
        	'email'=> 'rdvdam@gmail.com',
        	'password'=> bcrypt('Prueba123'),
            'admin'=> true


        ]);

    }
}
