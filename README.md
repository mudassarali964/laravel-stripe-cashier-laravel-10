# Laravel Stripe Cashier - Laravel-10

<img width="1430" alt="Stripe_admin_dashboard" src="https://user-images.githubusercontent.com/55048197/224141687-f339bf49-a2d1-43f0-bf3d-8b8fc4cca61f.png">
<img width="1430" alt="stripe_all_plans" src="https://user-images.githubusercontent.com/55048197/224142319-ce162a15-5ed1-4fa1-9c16-294775690e47.png">
<img width="1430" alt="stripe_plans" src="https://user-images.githubusercontent.com/55048197/224142398-f8868629-0d6d-4e09-b89c-8f15cde5e80a.png">

## Installation

``` bash
# clone the repo
$ git clone https://github.com/mudassarali964/laravel-stripe-cashier-laravel-10.git my-project

# go into app's directory
$ cd my-project

# install app's dependencies
$ composer install

# install app's dependencies
$ npm install

```

### If you choice to use SQLite

``` bash

# create database
$ touch database/database.sqlite
```
Copy file ".env.example", and change its name to ".env".
Then in file ".env" replace this database configuration:
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=laravel_admin
* DB_USERNAME=root
* DB_PASSWORD=

To this:

* DB_CONNECTION=sqlite
* DB_DATABASE=/path_to_your_project/database/database.sqlite

### If you choice to use PostgreSQL

1. Install PostgreSQL

2. Create user
``` bash
$ sudo -u postgres createuser --interactive
enter name of role to add: laravel
shall the new role be a superuser (y/n) n
shall the new role be allowed to create database (y/n) n
shall the new role be allowed to create more new roles (y/n) n
```
3. Set user password
``` bash
$ sudo -u postgres psql
postgres= ALTER USER laravel WITH ENCRYPTED PASSWORD 'password';
postgres= \q
```
4. Create database
``` bash
$ sudo -u postgres createdb laravel
```
5. Copy file ".env.example", and change its name to ".env".
   Then in file ".env" replace this database configuration:

* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=laravel_admin
* DB_USERNAME=root
* DB_PASSWORD=

To this:

* DB_CONNECTION=pgsql
* DB_HOST=127.0.0.1
* DB_PORT=5432
* DB_DATABASE=laravel_admin
* DB_USERNAME=laravel
* DB_PASSWORD=password

### If you choice to use MySQL

Copy file ".env.example", and change its name to ".env".
Then in file ".env" complete this database configuration:
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=laravel_admin
* DB_USERNAME=root
* DB_PASSWORD=

### Set APP_URL

> If your project url looks like: example.com/sub-folder
Then go to `my-project/.env`
And modify this line:

* APP_URL =

To make it look like this:

* APP_URL = http://example.com/sub-folder


### Next step

``` bash
# in your app directory
# generate laravel APP_KEY
$ php artisan key:generate

# run database migration and seed
$ php artisan migrate:refresh --seed

# generate mixing
$ npm run build

# and repeat generate mixing
$ npm run dev
```

## Usage

``` bash
# start local server
$ php artisan serve

# test
$ php vendor/bin/phpunit
```

Open your browser with address: [localhost:8000](localhost:8000)  
Click "Login" on sidebar menu and log in with credentials:
 
* E-mail: _user@user.com_
* Password: _password_

For admin panel Open your browser with address: [localhost:8000/admin](localhost:8000/admin)

* E-mail: _admin@admin.com_
* Password: _password_

## Compile Css & Js

Basically we are using the Vite mixin. Whenever do some styling/script changes, 
the files must be compiled through the given command:

``` bash
# generate mixing
$ npm run build

# and repeat generate mixing
$ npm run dev
```

## Stripe configuration using Laravel Cashier

``` bash
# install laravel cashier
$ composer require laravel/cashier

# publish cashier migration for creating tables
$ php artisan vendor:publish --tag="cashier-migrations"

# run the migration command to create a table
$ php artisan migrate
```

> Create Stripe Account & Get Stripe API Key and SECRET
1. This step is a very important step, if you don't have a stripe account then you need to create and if you have then 
proceeded to get Stripe Key and Secret. So, Let's open below stripe official website using the below link:
    https://stripe.com/en-in
2. After login, You need to go on Developers tab and get API keys.

<img width="1430" alt="stripe_API_Keys" src="https://user-images.githubusercontent.com/55048197/224141926-79a51d27-483e-44fc-82ea-94a51f06e72f.png">

3. Use API keys in .env file as:
> STRIPE_KEY = '...'
> STRIPE_SECRET = '...'
4. Finally login as admin and create the new plans. 
    go to this link http://127.0.0.1:8000/admin/plans/create
    
    <img width="1430" alt="stripe_create_new_plan" src="https://user-images.githubusercontent.com/55048197/224142041-34a6697f-ed76-48b8-a67b-c9255dcf8dd2.png">

    NOTE: This would be create a plan, first in your stripe account (https://dashboard.stripe.com/test/products) 
    and second it will create in the database.

> If you didn't create plan one by one manually (from admin panel) so simply you will run a seeder named as `PlanSeeder`
* Before run the seeder you need to create your plan manually from the stripe dashboard (https://dashboard.stripe.com/test/products)

<img width="1430" alt="stripe_product_list" src="https://user-images.githubusercontent.com/55048197/224142903-331d807c-b86c-4a60-ba66-18c384f673d6.png">

* Hit on top right `Add product`
* After the product has created, copy the `price_id` and `product_id` 
* Then paste these ids into PlaneSeeder `stripe_product` and `stripe_plan`
``` bash

# Run bellow command for run PlanSeeder seeder:
$ php artisan db:seed --class=PlanSeeder

```
5. After plan successfully created, you will find all the plans to subscribe by using the below link:
    http://127.0.0.1:8000/stripe_plans
6. Now you can check with following card details:
* Name: Test 
* Number: 4242 4242 4242 4242 
* CSV: 123 
* Expiration Month: 12 
* Expiration Year: 2028
