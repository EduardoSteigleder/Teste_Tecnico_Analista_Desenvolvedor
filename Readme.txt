## Tecnologias Utilizadas

- **PHP**: Versão 7.x ou superior.
- **SQL**: MySQL (versão 5.7 ou superior).
- **HTML**: Estrutura de páginas web.
- **CSS**: Estilo visual das páginas.
- **JavaScript**: Interatividade básica, como validação de formulários.
- **XAMPP**: usei o XAMPP para testar 

-**ARQUIVO PRINIPAL**:index.php,userlist.php

## Banco de Dados

O banco de dados utilizado é composto pela seguinte estrutura:

- **Nome do banco de dados**: `cadastro_usuarios`
  
A tabela utilizada no banco de dados é a `users`, com a seguinte estrutura:

### Estrutura da Tabela `users`

| Campo           | Tipo       | Descrição                          |
|-----------------|------------|------------------------------------|
| `id`            | `INT`      | Identificador único do usuário (chave primária, autoincremento) |
| `nome`          | `VARCHAR`  | Nome completo do usuário           |
| `cpf`           | `VARCHAR`  | CPF do usuário                     |
| `email`         | `VARCHAR`  | E-mail do usuário                  |
| `data_nascimento` | `DATE`    | Data de nascimento do usuário      |
| `telefone`      | `VARCHAR`  | Número de telefone do usuário      |
| `senha`         | `VARCHAR`  | Senha do usuário                   |




**Configuração do Banco de Dados**: Agora inclui a seção que explica onde estão localizadas as configurações do banco de dados (`dbconfig.php`). Ela descreve as variáveis necessárias, como o `host`, o `dbname`, o `username` e o `password`.