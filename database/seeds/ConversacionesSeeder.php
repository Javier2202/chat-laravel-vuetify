<?php

use App\Models\Conversacion;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConversacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversacion::create([
            'de' => 1,
            'para' => 2,
            'ultimo_mensaje' => 'yo muy bien',
            'fecha_ultimo_mensaje' => Carbon::now()->toDateTimeString(),
        ]);

        Conversacion::create([
            'de' => 2,
            'para' => 1,
            'ultimo_mensaje' => 'yo muy bien',
            'fecha_ultimo_mensaje' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
