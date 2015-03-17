# pdf-laravel5

DOMPDF module for Laravel 5

[![Build Status](https://api.travis-ci.org/vsmoraes/pdf-laravel5.svg)](https://travis-ci.org/vsmoraes/pdf-laravel5)
[![License](https://poser.pugx.org/vsmoraes/laravel-pdf/license.svg)](https://packagist.org/packages/vsmoraes/laravel-pdf)

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
To the `providers` array on your `config/app.php`

## Usage

```php
$router->get('/pdf/view', function() {
    return PDF::load(view('pdfs.example1'))->show();
});
```

### Force download
```php
$router->get('/pdf/download', function() {
    return PDF::load(view('pdfs.example1'))->download();
});
```

### Output to a file
```php
$router->get('/pdf/output', function() {
    PDF::load(view('pdfs.example1'))
        ->filename('/tmp/example1.pdf')
        ->output();
    
    return 'PDF saved';
});
```

### Inject on your controller

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
        $html = view('pdfs.example1');

        return $this->pdf
            ->load($html)
            ->show();
    }
}
```
