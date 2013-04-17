IssoAiApp
=======

1. estrutura
 - O projeto foi implementado com o framework CakePHP e banco de dados MySQL
 - A programação FrontEnd foi baseada no framework Javascript JQuery e o framework CSS Twitter Bootstrap.
 - O login do usuário é gerenciado pelo Facebook utilizando a API Javascript fornecida pelo mesmo e Ajax para validação do login na aplicação.
 
2. funcionalidades
 - O sistema possui cadastro de usuários com os perfis de Participante, Organizador e Administrador, login de Participante através do Facebook, cadastro de eventos* e inscrição em eventos*

3. configuração

### Instalação ###

 - As dependências do projeto são gerenciadas pelo composer. Para a instalação das dependências, deve-se efetuar os seguintes procedimentos:
    
    $ cd app    
    $ php composer.phar install

### banco de dados ###

 - A configuração do banco é feita no arquivo app/Config/Database.php. Caso não exista, deve-se copiar o arquivo app/Config/Database.php.example e renomeá-lo para Database.php.
 - A configuração do banco é feita em um array associativo:

    public $default = array(
                              'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

 - Deve-se lembrar de remover o comentário da linha 'encoding' => 'utf8',

 - Para criar as tabelas do banco, deve-se ter um banco de dados existente e configurado. O utilitário de linha de comando do CakePHP irá gerar as tabelas do banco de acordo com o arquivo de esquema do banco localizado em app/Config/Schema/schema.php e nos arquivos de migração nomeados schema_1.php e assim por diante. O comando é o seguinte:

    php Console/cake.php schema create

 - O comando deve ser executado no diretório app.
 - O esquema do banco de dados também está disponível no arquivo app/Config/Schema/schema.sql
 
4. integrantes
 - Bruno Paulino
 - Daniela Pitta
 - Livio Ribeiro

*funcionalidade ainda não implementada