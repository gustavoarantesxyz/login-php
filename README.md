# Sistema de Login em PHP e Bootstrap.

## Introdução
Este é um projeto que desenvolvi a partir do zero para aplicar meus conhecimentos em PHP, Bootstrap e Docker.

Para o desenvolvimento deste projeto, utilizei Sessões do PHP para gerenciar erros e a lógica de acesso, alem disso usei o mysqli para executar as operações no banco de dados e, usei a função MD5 para salvar a senha de forma criptografada no banco de dados. Já no frontend utilizei o Bootstrap 5 para criar as interfaces.

Para configurar o ambiente de desenvolvimento, fiz o uso Docker com Docker Compose. Utilizei a imagem do Apache com PHP 8.2 e, para o banco de dados, utilizei a imagem do MariaDB. Também utilizei a imagem do PHPMyAdmin para auxiliar na administração do banco de dados.

## Funcionalidades do Sistema
O sistema inclui as seguintes funcionalidades:
- Login.
- Criação de conta.
- Recuperação de senha.
- Logout.

## Interfaces do Projeto

Tela de Login:

![Tela de Login](img/login.png)

Tela de Cadastro:

![Tela de Cadastro](img/criarConta.png)

Tela de Recuperar Senha:

![Tela de Recuperar](img/recuperarConta.png)

Tela de Início:

![Tela de Dashboard](img/dashboard.png)

## Tecnologias Utilizadas:
- Docker e Docker Compose
- Apache
- PHP 8.2
- Bootstrap 5
- MariaDB
- PHPMyAdmin

## Observações
Para que o sistema funcione você deve seguir alguns passos:

### Configuração do Banco de Dados

Acesse o PHPMyAdmin no endereço "localhost:8080". 

Faça login com as seguintes credenciais:

Usuário: root   
Senha: root

Crie um novo banco de dados com o nome "sistemalogin".

Execute a seguinte consulta SQL para criar a tabela "usuarios" no banco de dados "sistemalogin":
```
CREATE TABLE `sistemalogin`.`usuarios` (`id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `senha` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

### Correção da imagem Docker
Para que o MySQLi funcione na imagem do Apache com PHP, é necessário habilitar o módulo mysqli.

Acesse o container do php-apache-1 com o comando:
```
docker exec -it php-apache-1 /bin/bash
```
Dentro do container, execute o seguinte comando para instalar o módulo mysqli:
```
docker-php-ext-install mysqli
```

Após a instalação, faça o commit das alterações no container para que o módulo mysqli fique disponível na imagem. Use o comando:

```
docker commit php-apache-1 php-apache:mysqli
```
Dessa forma, o MySQLi estará habilitado e pronto para ser usado na imagem do Apache com PHP.
