<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    public function run()
    {
        Ticket::insert([
            [
                'title' => 'Erro na tela de login',
                'description' => 'Ao tentar logar, a tela trava e não carrega.',
                'status' => 'open',
                'priority' => 'high',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Bug no relatório de vendas',
                'description' => 'O PDF não é gerado corretamente.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Falha na autenticação',
                'description' => 'Usuário não consegue acessar sua conta.',
                'status' => 'open',
                'priority' => 'high',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Problema no cadastro de clientes',
                'description' => 'Alguns campos obrigatórios não são validados.',
                'status' => 'closed',
                'priority' => 'low',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
