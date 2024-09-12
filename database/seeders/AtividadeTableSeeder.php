<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

//importando o model
use App\Models\Atividade;

class AtividadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criando um novo registro de Atividade
        Atividade::create([
            'title' => '#Vemproif',
            'description' => 'Evento de apresentação do campus para a comunidade acadêmica',
            'scheduledto' => '2023-10-11'
        ]);

        Atividade::create([
            'title' => 'Evento Napne',
            'description' => 'Evento do Núcleo Pessoas com Nec. Educ. Específicas',
            'scheduledto' => '2023-09-21'
        ]);

        $dataatual = Carbon::now();
        for($i=1; $i<=100; $i++){
            Atividade::create([
                'title' => 'Evento ' . $i,
                'description' => 'Desc. do evento ' . $i,
                'scheduledto' => $dataatual->addDays($i)
            ]);
        }
    }
}
