# Informações do aluno
* RA: 09023391
* Nome: Lucas Dillenburg


# Introdução
O projeto é um sistema web em PHP com a estrutura MVC que tem como objetivo exibir produtos em um grid, permitir a exclusão, edição e adição de produtos, e realizar a autenticação de usuários através do Firebase Authentication. O banco de dados utilizado é o Firestore do Firebase, que é um banco de dados NoSQL. Para o gerenciamento de dependências, o projeto utiliza o Composer. Além disso, é necessário instalar a extensão grpc do PHP para realizar a conexão com o Firebase. Na documentação abaixo, você encontrará todas as informações necessárias para realizar a instalação e configuração do projeto.

# Tutorial de instalação em vídeo
https://user-images.githubusercontent.com/55420795/230796932-f122e8b3-b007-4779-bb36-d714b32a70ff.mp4

# Pré-requisitos
Infelizmente, a equipe de desenvolvimento do gRPC não oferece mais arquivos pré-compilados da extensão para Windows desde a versão 1.43.0 (que é para PHP 8.1), parece que o PHP vem sendo esquecido com o tempo, por esse motivo para rodarmos o projeto vamos precisar do PHP 8.1, atualmente as versões mais atualizadas do xampp vem com php 8.2, que não será compatível com o gRPC, então neste caso precisamos baixar uma versão anterior do xampp, o link está disponível abaixo.

Antes de começar a trabalhar com o projeto, é necessário garantir que os seguintes softwares e extensões estejam instalados no seu ambiente:
* [XAMPP 8.1.17](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.1.17/xampp-windows-x64-8.1.17-0-VS16-installer.exe) (com PHP 8.1.17)
* Extensão [gRPC 1.43.0](https://pecl.php.net/package/gRPC/1.43.0/windows) para PHP 8.1 ([Ver tutorial no YouTube](https://www.youtube.com/watch?v=EhJ-I1-FZsQ)):
   *  [8.0 Thread Safe (TS) x64](https://windows.php.net/downloads/pecl/releases/grpc/1.43.0/php_grpc-1.43.0-8.1-ts-vs16-x64.zip) (caso seu sistema seja 64 bits)
   *  [8.0 Thread Safe (TS) x86](https://windows.php.net/downloads/pecl/releases/grpc/1.43.0/php_grpc-1.43.0-8.1-nts-vs16-x86.zip) (caso seu sistema seja 32 bits)
* [Composer](https://getcomposer.org/download/) ([Ver tutorial no YouTube](https://www.youtube.com/watch?v=t-WoLniiBfc))
* serviceAccountKey.json (disponibilizado no ava)

# Instalação
Para instalar o projeto em sua máquina, siga os passos abaixo:

1. Instale o Xampp 8.1.17

2. Instale a extensão gRPC 1.43.0 no PHP

3. Instale o composer

3. Clone o repositório do GitHub (dentro da pasta htdocs no diretório do xampp):
`git clone https://github.com/LuquinhasSG/e-commerce`

4. Acesse o diretório do projeto:
`cd e-commerce`

4. Instale as dependências usando o Composer:
`composer install`

4. Crie uma pasta na raiz do projeto chamada "keys" e copie ou mova o arquivo serviceAccountKey.json (disponibilizado no envio da atividade junto ao link do projeto no GitHub) para dentro da pasta

Agora está tudo pronto, basta iniciar o apache no seu XAMPP e acessar o endereço "localhost/e-commerce" no seu navegador.

# Screenshots do banco de dados
Abaixo disponibilizo screenshots do Authentication e Firestore Database:

![image](https://user-images.githubusercontent.com/55420795/230701785-1107244d-9baf-4981-984f-9a39f36f0ad9.png)

![image](https://user-images.githubusercontent.com/55420795/230701693-e1f864bf-622a-4646-90b4-41e122168bf1.png)

![image](https://user-images.githubusercontent.com/55420795/230701855-411c0b81-bc51-427e-b924-3be1ea4a4605.png)
