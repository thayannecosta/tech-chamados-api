# Tech Chamados - Backend (API Laravel)

Projeto de backend para gerenciamento de chamados utilizando **Laravel 12** e **Sanctum** para autenticação.

---

## 🔹 Instalação

### 1. Clonar o repositório
```bash
git clone https://github.com/thayannecosta/tech-chamados-api.git
cd tech-chamados-api

### 2.  Instalar dependências:
composer install

### 3.  Instalar dependências:

Copie o arquivo .env.example para .env

### 3.  Rodar Migrations e Seeders:

php artisan migrate --seed
(Se quiser resetar todo o banco e popular novamente: php artisan migrate:fresh --seed
)

### 4.  Executando a aplicação
php artisan serve

🔹 Autenticação

Utiliza Laravel Sanctum.

A autenticação é feita via cookies.

Para testar, você pode usar o usuário criado pelo seeder.

🔹 Dicas e Observações

Certifique-se de que o banco de dados está rodando e as credenciais no .env estão corretas.

Limpar cache de configuração se necessário:

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

Tickets (requer autenticação via auth:sanctum)
| Método | Endpoint            | Ação                               |
| ------ | ------------------- | ---------------------------------- |
| GET    | `/api/tickets`      | Listar todos os tickets do usuário |
| POST   | `/api/tickets`      | Criar um novo ticket               |
| GET    | `/api/tickets/{id}` | Visualizar um ticket específico    |
| PUT    | `/api/tickets/{id}` | Atualizar um ticket                |
| DELETE | `/api/tickets/{id}` | Excluir um ticket                  |

