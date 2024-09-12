<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    //nomes da tabela no banco de dados
    protected $table = "atividades";

    //configurar para sempre converter a propridade para um tipo específico
    protected $casts = [
        'scheduledto' => 'datetime',
    ];
}


