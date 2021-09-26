# PesaKit Interview User API Example

# Installation Guide
- Download the repo and run `composer install`
- Copy the .env.example into .env and key in the database credentials
- Run `php artisan:migrate --seed` to setup database with admin user and 1000 users for testing purposes
- Run `npm install && npm run dev`
- Run `php artisan serve`


# API Authentication calls
To start

    - Register a new user on
        /api/register
        form-data - 'name','email','phone_number','password','password_confirmation'
OR

    - Login as existing user
        /api/login
        form-data - 'email', 'password'

Once registered or logged in you will get a response with a `user object and token`

Preferable to use `POSTMAN` as your api-platform for testing

* To access below endpoints pass the above `token` as bearer-token

- /api/users (GET)
  - Lists all users
- /api/users (POST)
  - Creates a new user
  - form-data - 'name','email','phone_number','password','password_confirmation'
- /api/users/{id} (GET)
  - retrieves individual user
- /api/users/{id} (PUT)
  - Updates individual user
- /api/users/{id} (DELETE)
  - deletes individual user


# Admin Authentication
- Head to `localhost:8000/login`
- email: `admin@admin.com` password: `password`

Admin can:
* View all users
* View individual user details


