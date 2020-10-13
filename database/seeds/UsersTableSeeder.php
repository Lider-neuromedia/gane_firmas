<?php

use Illuminate\Database\Seeder;
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
        User::create([
                'nombre' => 'admin ',
                'cargo' => 'director',
                'area' => 'web',
                'cedula' => '123',
                'indicativo1' => '57',
                'indicativo2' => '2',
                'telefono' => '1234567',
                'extension' => '123',
                'celular' => '123',
                'email' => 'admin@gmail.com',
                'direccion' => 'calle 13',
                'lugar' => 'diagonal',
                'departamento_id' => 76,
                'ciudad_id' => 76001,
                'imagen' => ''
            ]);
    }
}
