README


## INSTALAÇÃO DO SITE JORNAL LIVRE ##

	Pré requisitos:
		- Instalação do docker
		- Porta 8080 liberada
		- Porta 3306 liberada

Existem duas formas de instalação:

	A primeira é sem dump do banco de dados, ou seja, só necessita transferir o arquivo ibdata1 (baixado através do link informado no e-mail) para a pasta db e dentro do terminal no diretorio do arquivo "docker-compose.yml" executar o comando: docker-compose up -d

	Desta forma o site estará funcionando, você poderá fazer o login e acessar as páginas solicitadas no sprit. 

	Segunda opção é através da importação do Banco de Dados. Nessa opção, você deve excluir a pasta db da mesma pasta do arquivo "docker-compose.yml" e seguir os seguintes passos:
	1. Dentro do terminal na pasta do arquivo "docker-compose.yml" dê um docker-compose up -d;
	2. Após a instalação do docker, acesse o terminal do container que está o mysql através do seguinte comando: docker exec -it container_id bash no terminal da sua maquina;
	3. Após acessar o terminar do container, insira o seguinte comando: mysql -u exampleuser -p exempledb < /var/lib/mysql/file.sql
	4. Insira a senha que é: exemplepass;
	5. Pronto, só abrir o site no endereço localhost:8080
	OBS: a pasta do wordpress deve estar na mesma pasta do docker-compose.yml e deve conter o tema conforme esta no github.


Usuários e senhas:
- Ygor – jornallivre13
- lucas – jornallivre14
- Bairro – jornallivre15


Obrigado!!
