# Informações do aluno
* RA: 09023391
* Nome: Lucas Dillenburg


# Introdução
O projeto é um sistema web em PHP com a estrutura MVC que tem como objetivo exibir produtos em um grid, permitir a exclusão, edição e adição de produtos, e realizar a autenticação de usuários através do Firebase Authentication. O banco de dados utilizado é o Firestore do Firebase, que é um banco de dados NoSQL. Para o gerenciamento de dependências, o projeto utiliza o Composer. Além disso, é necessário instalar a extensão grpc do PHP para realizar a conexão com o Firebase. Na documentação abaixo, você encontrará todas as informações necessárias para realizar a instalação e configuração do projeto.

# Pré-requisitos
Antes de começar a trabalhar com o projeto, é necessário garantir que os seguintes softwares e extensões estejam instalados no seu ambiente:
* [XAMPP](https://www.apachefriends.org/pt_br/index.html) (com PHP 8.0)
* [Composer](https://getcomposer.org/download/) ([Ver tutorial no YouTube](https://www.youtube.com/watch?v=t-WoLniiBfc))
* Extensão [gRPC 1.38.0](https://pecl.php.net/package/gRPC/1.38.0/windows) para PHP 8.0 ([Ver tutorial no YouTube](https://www.youtube.com/watch?v=EhJ-I1-FZsQ)):
   *  [8.0 Thread Safe (TS) x64](https://windows.php.net/downloads/pecl/releases/grpc/1.38.0/php_grpc-1.38.0-8.0-ts-vs16-x64.zip) (caso seu sistema seja 64 bits)
   *  [8.0 Thread Safe (TS) x86](https://windows.php.net/downloads/pecl/releases/grpc/1.38.0/php_grpc-1.38.0-8.0-ts-vs16-x86.zip) (caso seu sistema seja 32 bits)
* serviceAccountKey.json

# Instalação
Para instalar o projeto em sua máquina, siga os passos abaixo:

1. Clone o repositório do GitHub:
`git clone https://github.com/SEU_NOME_DE_USUÁRIO@github.com/LuquinhasSG/e-commerce.git`

2. Acesse o diretório do projeto:
`cd e-commerce`

3. Instale as dependências usando o Composer:
`composer install`

4. Crie uma pasta na raiz do projeto chamada "keys" e copie ou mova o arquivo serviceAccountKey.json (disponibilizado no envio da atividade junto ao link do projeto no GitHub) para dentro da pasta

Agora está tudo pronto, basta iniciar o apache no seu XAMPP e acessar o endereço "localhost" no seu navegador.

# Screenshots do banco de dados
Abaixo disponibilizo screenshots do Authentication e Firestore Database:

![image](https://user-images.githubusercontent.com/55420795/230701785-1107244d-9baf-4981-984f-9a39f36f0ad9.png)

![image](https://user-images.githubusercontent.com/55420795/230701693-e1f864bf-622a-4646-90b4-41e122168bf1.png)

![image](https://user-images.githubusercontent.com/55420795/230701855-411c0b81-bc51-427e-b924-3be1ea4a4605.png)
