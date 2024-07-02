# Laravel-Blog
This project is a blog web application built using Laravel framework, after completion of [Laracasts Laravel course](https://laracasts.com/series/laravel-8-from-scratch).
<br><br><br>
![image](https://github.com/smoawad66/Laravel-Blog/assets/93600247/f4ddccc3-d12e-4dc8-b944-d7fa319e3dde)


## Features
- Authentication system.
- View all posts.
- View posts for a specific category and/or author.
- Search posts.
- Pagination.
- Leave comments on posts.
- Favourite posts.
- Admin can create, edit and delete posts.



## Installation
1. Clone the repository ```git clone https://github.com/smoawad66/Laravel-Blog.git```.
2. Install dependencies ```composer install```.
3. Copy ```.env.example``` file and rename it ```.env```, then configure it.
4. Generate an application key ```php artisan key:generate```.
5. Run migrations and seed the database.
```
  php artisan migrate
  php artisan db:seed
```
6. Run the server ```php artisan serve```.
7. The application should work.
