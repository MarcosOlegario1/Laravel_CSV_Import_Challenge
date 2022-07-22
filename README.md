## Como rodar este projeto

 - Clonar o Laradock (Estrutura que eu pessoalmente utilizo)
 - Clone do projeto na mesma hierarquia da pasta laradock
 git clone https://github.com/Laradock/laradock.git
 - Dentro da pasta laradock
 ```sh
cp .env.example .env
```
 - Ir até a pasta Nginx/sites/ e dentro do arquivo "default.conf" altere a linha 13 adicionando o nome da pasta
 ```sh
root /var/www/NomeDaPastaDoProjeto/public;
```
 - Voltar ao terminal dentro da pasta do Laradock, rodar o comando: 
  ```sh
docker-compose up -d nginx mysql phpmyadmin workspace 
```
 - Após subir os containeres rodar o comando para acessar o container:
  ```sh
docker exec -it laradock-workspace-1 bash
cd NomeDaPastaDoProjeto
cp .env.example .env
```
 - Abra outro terminal fora do container do docker, rode o comando:
```sh
docker ps
```
 - Pegue o CONTAINER ID do container laradock-mysql-1
 - Coloque o ID no campo DB_HOST do arquivo .env e coloque root no DB_PASSWORD.
 - Voltando ao terminal do container, rode os seguintes comandos:
 ```sh
npm i && composer install
php artisan key:generate
php artisan migrate
```
 - Acesse localhost/
