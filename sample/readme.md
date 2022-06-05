# Running Migrations
https://laravel.com/docs/9.x/migrations#migration-structure

### Run migration
> php artisan migrate
> 
### Rollback latest
> php artisan migrate:rollback

### E.g. Rollback last 5 migrations
> php artisan migrate:rollback --step=5

### Migration reset all
> php artisan migrate:reset

### Roll Back & Migrate Using A Single Command
> php artisan migrate:refresh

### Refresh the database and run all database seeds...
> php artisan migrate:refresh --seed

### Roll back and re-migrate the last five migrations
> php artisan migrate:refresh --step=5
> 
### Drop All Tables & Migrate
> php artisan migrate:fresh

# Create model, with migration
> php artisan make:model ModelName -m

## create controller with model for API
### when --api is used the controller will get created with the actions store, update, index, show and destroy
>php artisan make:controller AlbumController --model=Album --requests --api

### if you wish to specify the namespace, you can do something like
>php artisan make:controller V1\\AlbumController --model=Album --requests --api
## create controller with model with resource
### when --resource is used the controller will get created the actions methods create,store,edit,update,index,show and destroy
>php artisan make:controller PhotoController --model=Photo --resource --requests


## create table migration manually
>php artisan make:migration create_todos_table


## create resource
>php artisan make:resource V1\\AlbumResource


## add additional column to existing table
>php artisan make:migration add_{COLUMN_NAME}_to_{TABLE_NAME}_table --table={TABLE_NAME}


# Laravel breeze for auth features such as register, login , reset password etc.
> composer require laravel/breeze --dev
