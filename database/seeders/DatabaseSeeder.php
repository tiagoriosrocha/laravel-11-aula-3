<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //chame aqui as classes que você quer criar os seeders
        $this->call(AtividadeTableSeeder::class);
        
        // Usando Factory
        // User::factory(10)->create();

        // Usando Factory
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        
        // NÃO REMOVA OU MODIFIQUE O CÓDIGO ABAIXO
        // Criando um usuário para mim no banco de dados para testes futuros
        User::factory()->create([
            'name' => 'Tiago Rios da Rocha',
            'email' => 'tiago.rios@ibiruba.ifrs.edu.br',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
