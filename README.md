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
    php artisan storage:link
    ```
    
<h2>Setup</h2>

In setup page you can add the main information of the website and they can be retrive by using laravel service container

to start to use it create in public/storage system file and inside it add large,medium,small folders

<h3>Website Seo Title</h3>
Retrive it by

```
<title> {{ app()->make('setup',['type' => 'website title'])[0]; }} -  Adminpanal </title>
```
by default you will get  Website Seo Title, Website Seo Description, Website Footer Description,header logo , footer logo ,fav logo but u can add another field by simple add the input and give a name to it then add validation to it in SetupRequest and add it's insertion in setup model like that

in setup/index

```
  <div class="form-group">
                <label>new field</label>
                <textarea class="form-control" placeholder="Website Footer Description" name="website_footer_description_en">{{app()->make('setup',['type' => 'website footer description english'])[0]}}</textarea>
                <p class="error error_website_footer_description"></p>
            </div>
```

```
if ( $request->website_description )  {

            self::updateOrCreate(
                ['type' => 'new field'],
                [
                    'type'  => 'new field val',
                    'value' => $request->field_name
                ]
            );

        }

```

and after that you will be able to retrive it by using this command

```
{{ app()->make('setup',['type' => 'new field'])[0]; }}
```
