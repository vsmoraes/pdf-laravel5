<?php
namespace Vsmoraes\Pdf;

use Illuminate\Http\Response;

class Dompdf implements Pdf
{
    /**
     * @var
     */
    protected $dompdfInstance;

    /**
     * @var string
     */
    protected $filename = 'dompdf_out.pdf';


    public function __construct(\DOMPDF $dompdf, array $config = [])
    {
        $this->dompdfInstance = $dompdf;
    }


    /**
     * @param $html
     * @param string $size
     * @param string $orientation
     * @return $this
     */
    public function load($html, $size = 'A4', $orientation = 'portrait')
    {
        $this->dompdfInstance->load_html($html);
        $this->setPaper($size, $orientation);

        return $this;
    }

    /**
     * @param null $filename
     * @return null|string
     */
    public function filename($filename = null)
    {
        if ($filename) {
            $this->filename = $filename;
        }

        return $this->filename;
    }

    /**
     * @param $size
     * @param $orientation
     * @return mixed
     */
    public function setPaper($size, $orientation)
    {
        return $this->dompdfInstance->set_paper($size, $orientation);
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return $this->dompdfInstance->render();
    }

    /**
     * @return bool
     */
    public function clear()
    {
        \Image_Cache::clear();

        return true;
    }

    /**
     * @param array $options
     * @return mixed
     */
    public function show($options = ['compress' => 1, 'Attachment' => 0])
    {
        $this->render();
        $this->clear();

        return $this->dompdfInstance->stream($this->filename(), $options);
    }

    /**
     * @param array $options
     * @return Response
     */
    public function download($options = ['compress' => 1, 'Attachment' => 1])
    {
        return new Response($this->show($options), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename=".' . $this->filename() . '"'
        ]);
    }

    /**
     * @param array $options
     * @return mixed
     */
    public function output($options = ['compress' => 1])
    {
        $this->render();

        return $this->dompdfInstance->output($options);
    }
}
