# 📚 API SISTEMA BIBIBLIOTECA

Uma API RESTful para gerenciamento de bibliotecas, desenvolvida com Laravel 12.

## Documentação
- [https://documenter.getpostman.com/view/38812718/2sB34cp2rG](https://documenter.getpostman.com/view/38812718/2sB34cp2rG)

## Disponível em

- [https://api.biblioteca.juanfariasdev.com.br](https://api.biblioteca.juanfariasdev.com.br)

## 📋 Pré-requisitos

- Docker
- Git

## ⚙️ Instalação

### 1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/api-sistema-biblioteca.git
cd api-sistema-biblioteca
```

### 2. Instale as dependências
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

### 3. Configure o ambiente
```bash
cp .env.example .env
```

### 4. Gere as chaves de segurança
```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan jwt:secret
```

### 5. Execute as migrações
```bash
./vendor/bin/sail artisan migrate
```

### 6. (Opcional) Popule o banco com dados de teste
```bash
./vendor/bin/sail artisan db:seed
```

### 7. Testar a API
```bash
./vendor/bin/sail artisan test
```

A API estará disponível em `http://localhost`
