<h1>Phinx Core</h1> 

<h2>Installation Steps</h2>

1) step 1
```
git clone https://github.com/Neamix/PhinxCore.git
```

2) step 2 

<ul>
    <li>Create mysql database</li>
    <li>Import route.sql (you will find it in root)</li>
</ul>

3) Step 3

<ul>
    <li>Create .env</li>
</ul>

4) Step 4

    ```
    composer install
    php artisan migrate
    php artisan db:seed
    ```
    
<h2>Setup</h2>

In setup page you can add the main information of the website and they can be retrive by using laravel service container

<h3>Website Seo Title</h3>
Retrive it by

```
<title> {{ app()->make('setup',['type' => 'website title'])[0]; }} -  Adminpanal </title>
```
