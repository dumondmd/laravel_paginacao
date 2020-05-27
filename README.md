<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Instruções pacotes node_modules

Instale com *npm install NOME*

## Instalando Jquery 
npm install jquery


## Instalando Bootstrap 
npm install bootstrap

## Configurando webpack.mix.js

No **webpack.mix.js** coloque *npm run dev*

```
mix
	.sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/site/style.css')
	.scripts('node_modules/jquery/dist/jquery.js', 'public/site/jquery.js')
	.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/site/bootstrap.js');	
```

## Quando for usar

Coloca no **head**
```
<link rel="stylesheet" type="text/css" href="{{asset('site/style.css')}}">
```
Coloca no final do **body**
```
<script src="{{asset('site/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('site/bootstrap.js')}}" type="text/javascript"></script>
```

## Criando e execuando um SEEDER

*php artisan make:seeder ClientesSeeder*


Adicione depois no arquivo **DatabaseSeeder**
```
$this->call(ClientesSeeder::class);
```
*php artisan db:seed*