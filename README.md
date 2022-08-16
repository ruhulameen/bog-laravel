## BOGaming Laravel 
BlueOceanGaming Seamless integration API library package for laravel.

![Packagist Downloads](https://img.shields.io/packagist/dt/ruhul/bog-laravel?style=plastic) ![Packagist Stars](https://img.shields.io/packagist/stars/ruhul/bog-laravel?style=plastic)
###### Complete documantation coming soon.........

### Quick Installation

```bash
composer require ruhul/bog-laravel
```

Once the ruhul/bog-laravel package has been installed, you need to install using this artisan command:
```bash
php artisan bogaming:install
```
## Usage

```php
// fetch all games
return BlueOceanGamiang::getGamelist([
'currency' => 'USD'
]);


// create player account to blueoceangaming system
return BlueOceanGaming::createPlayer([
'user_username' => 'xxxxxx',
'user_password' => 'xxxxxx',
'currency'      => 'USD'
]);

// lauchning game
return BlueOceanGaming::getGame([
'user_username' => 'xxxxxx',
'user_password' => 'xxxxxx',
'currency'      => 'USD',
'lang'          => 'en', // by default english
'game_id'       => 'xxxx',
'homeurl'       => 'http://yoursite.com',
'cashierurl'    => 'http://yousite.com/cashier',
'play_for_fun'  => true, // if false then real mode
]);

```

## Env
````bash
#For staging BOG_SANDBOX=true, for production BOG_SANDBOX=false
BOG_SANDBOX=true
BOG_PASSWORD="blueoceanaming API password"
BOG_PASSWORD="blueoceanaming API login"
````


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
