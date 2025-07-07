# 📚 API SISTEMA BIBIBLIOTECA

Uma API RESTful para gerenciamento de bibliotecas, desenvolvida com Laravel 12.

## Documentação
- https://documenter.getpostman.com/view/38812718/2sB34cp2rG

## 📋 Pré-requisitos

- PHP 8.2 ou superior
- Composer

## ⚙️ Instalação

### 1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/api-sistema-biblioteca.git
cd api-sistema-biblioteca
```

### 2. Instale as dependências
```bash
composer install
```

### 3. Configure o ambiente
```bash
cp .env.example .env
```

### 4. Gere as chaves de segurança
```bash
php artisan key:generate
php artisan jwt:secret
```

### 5. Execute as migrações
```bash
php artisan migrate
```

### 6. (Opcional) Popule o banco com dados de teste
```bash
php artisan db:seed
```

### 7. Inicie o servidor
```bash
php artisan serve
```

A API estará disponível em `http://localhost:8000`

