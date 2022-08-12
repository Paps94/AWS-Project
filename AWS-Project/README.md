

## Running this project locally

Just like any other Laravel app you need to run through some basic commands before you can play with the project. After cloning the repository and cding into it you need to run the following commands (this assumnes you have Composer installed)

- [Install composer dependencies].
```
  composer install
```

- [Generate your .env file (You can simply take .env.example and rename it to .env)].
```
  composer install
```

- [Assuming you are using Wamp or Xamp then you need to create the database in localhost].

- [Run the migrations to generate the tables].
```
  php artisan run migrate
```

- [If you want you can run the seeders to create some database records].
```
php artisan db:seed
```

- [Lastly you should be able to run serve to launch the project locally].
```
php artisan serve
```

and you can see the page if you go to http://127.0.0.1:8000/
