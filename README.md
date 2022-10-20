<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

1. clone repo
2. copy ".env.example" and rename the copy to ".env"
3. in your terminal:

```sh
> php artisan key:generate
```

```sh
> composer install
```

```sh
> npm install && npm run dev
```

```sh
> php artisan serve
```

Open your browser: "http://localhost:8000"

---

Create a symlink to the storage (for image upload component)

```sh
php artisan storage:link
```
