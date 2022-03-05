<h1 align=center>Desafio JN2</h1>
<p align=center> API desenvolvida em PHP (Laravel) para controle de clientes</p>


<h1>⚙️Instalação</h1>

* Clone o repositório

* Execute os comandos abaixo para inicializar o docker
```
docker-compose build app
docker-compose up -d
```

* Execute as migrations
```
docker-compose exec app php artisan migrate
```
<h1>⚙️Rotas</h1>

<h3>Cadastrar novo cliente</h3>

```
 POST /cliente
 
 {
   "name":"rodrigo",
   "email":"rodrigo@gmail.com",
   "cellphone":"77999267785",
   "cpf":"95732322000",
   "license_plate":"BA7854215"
 }
 ```
 <h3>Editar um cliente já existente</h3>
 
 ```
 PUT /cliente/{id}
 
 {
   "name":"rodrigo",
   "email":"rodrigo@gmail.com",
   "cellphone":"77999267785",
   "cpf":"95732322000",
   "license_plate":"BA7854215"
 }
 ```
 <h3>Deletar um cliente existente</h3>
 
 ```
 DELETE /cliente/{id}
 ```
 <h3>Consultar dados de um cliente</h3>
 
  ```
 GET /cliente/{id}
 ```
 
  <h3>Consultar dados de clientes com base no último número da placa</h3>
 
  ```
 GET /consulta/final-placa/{numero}
 ```
