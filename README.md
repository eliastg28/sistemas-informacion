# Pasos para clonar el repositorio

### Ejecutar el siguiente comando para clonar el repositorio
```
git clone https://github.com/nameUser/nameProject.git
```

### Entrar a la ruta donde se encuentra el proyecto y ejecutar los siguientes comandos (uno por uno)
```
composer install
```
```
cp .env.example .env
```
```
php artisan key:generate
```
```
php artisan serve
```