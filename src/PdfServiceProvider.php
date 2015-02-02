<?php
namespace Vsmoraes\Pdf;

use Illuminate\Support\ServiceProvider;
use Vsmoraes\Pdf\Dompdf as MyDompdf;

class PdfServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->package('vsmoraes/pdf');
    }

    /**
     *
     */
    public function register()
    {
        $this->app->bind('DOMPDF', function() {
            define('DOMPDF_ENABLE_AUTOLOAD', false);

            require_once __DIR__ . '/../vendor/dompdf/dompdf/dompdf_config.inc.php';

            return new \DOMPDF();
        });

        $this->app->bind(Pdf::class, MyDompdf::class);
    }
}
