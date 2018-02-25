## Installation
This package needs Laravel 5.x

Begin by installing this package through Composer. Require it directly from the Terminal to take the last stable version:
```bash
$ composer require alyahmmed/facebook-pixel dev-master
```

Once this operation completes, you must add the service provider. Open `app/config/app.php`, and add a new item to the providers array.
```php
'providers' => [
    // ...
    Alyahmmed\LaravelMailCampaigns\FacebookPixelProvider::class,
],
```

At this point the inliner should be already working with the default options. If you want to fine-tune these options, you can do so by publishing the configuration file:
```bash
$ php artisan vendor:publish --provider=Alyahmmed\FacebookPixel\FacebookPixelProvider
```

Add the following to your main route file `routes/web.php` feel free to alter these routes to what suits you best
```
Route::group(['namespace' => 'Backend', 'prefix' => '/backend'], function()
{
    Route::get('/pixel_stats', "FacebookAdsController@stats");
});
```
