<?php

use App\Models\Mensaje;
use Illuminate\Database\Seeder;

class MensajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensaje::create([
            'conversacion_id' => 1,
            'contenido' => '¿Hola como estas?',
            'estado' => 'Leido',
        ]);

        Mensaje::create([
            'conversacion_id' => 2,
            'contenido' => 'yo muy bien',
        ]);
    }
}
