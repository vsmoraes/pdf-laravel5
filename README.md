# pdf-laravel5

Laravel module for dompfg

## Instalation
Add:
```
"vsmoraes/laravel-pdf": "dev-master"
```
To your `composer.json`

or

Run:
```
composer require vsmoraes/laravel-pdf
```

Then add:
```php
"Vsmoraes\Pdf\PdfServiceProvider"
```
To the `providers` array on you `config/app.php`

## Usage

```php
$router->get('/test', function() {

    $pdf = $this->app->make('Vsmoraes\Pdf\Pdf');

    $pdf->load('<html><head></head><body><h1>Hello world!</h1></body></html>');
    echo $pdf->show();
});
```

# Inject on your controller

```php
<?php namespace App\Http\Controllers;

use Vsmoraes\Pdf\Pdf;

class HomeController extends BaseControler
{
    private $pdf;

    public function __construct(Pdf $pdf)
    {
        $this->pdf = $pdf;
    }

    public function helloWorld()
    {
        $html = '<html><head></head><body><h1>Hello world!</h1></body></html>';

        $this->pdf->load($html);

        return $this->pdf->show();
    }
}
```
