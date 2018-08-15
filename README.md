# Piloti Test

### Pré-requisitos
* Laravel 5+
* MySQL
* Git
* NPM

### Instalação
Clone o repositório utilizando o comando:
```
git clone https://github.com/thulioprado/piloti-test.git
```

Em seguida, instale as dependências executando o comando:
```
npm i
```

Renomeie o arquivo `.env.example` para `.env` e configure os dados de conexão com o MySQL.

Crie um banco de dados no MySQL e, em seguida, execute o comando 
```
php artisan migrate
```
para instalar o banco de dados.
