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
