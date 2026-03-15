# Sistema de Cadastro de Pessoas

## Descrição
- Este projeto é um sistema web para gerenciamento de pessoas, construído com **Laravel** no backend e **Vue.js** no frontend.  
Ele permite cadastrar pessoas físicas e jurídicas, armazenar suas informações no **MariaDB**.
---

## 🛠 Tecnologias Utilizadas
- **Backend:** Laravel  
- **Frontend:** Vue.js 3 + Tailwind CSS  
- **Banco de Dados:** MariaDB 
- **Gerenciamento de Pacotes:** Composer, NPM  

---

## ⚙️ Funcionalidades
- CRUD completo de pessoas (físicas e jurídicas)   
- Dashboard com estatísticas
- Lista de Pessoas
- Interface responsiva com Tailwind CSS  

---

## 💻 Pré-requisitos
- Composer  
- Node.js e NPM  
- MariaDB  

---

## 🚀 Instalação e Execução

- Crie o banco de dados no MariaDB.

- Clone o repositório:  
git clone https://github.com/mateusschulleleite/teste-apresenta.me.git  

- Navegue até pasta do projeto.  
cd teste-apresenta.me

- Instale as dependências do Laravel.  
composer install

- Instale as dependências do node.  
npm install

- Copie o arquivo .env  
copy .env.example .env #Windows  
cp .env.example .env #Linux/macOS

- Edite o .env e altere.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=root
DB_PASSWORD=sua_senha

- Gere a chave da aplicação  
php artisan key:generate

- Rodar as migrations
php artisan migrate

- Rodar a criação de usuário  
php artisan db:seed --class=AdminUserSeeder

- Rodar o Laravel  
php artisan serve

- Rodar o Vue  
npm run dev

- Usuário Admin:  
email: admin@teste.com  
senha: 123456