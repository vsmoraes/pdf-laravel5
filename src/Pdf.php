<?php
namespace Vsmoraes\Pdf;

interface Pdf
{
    /**
     * @param $html
     * @param string $size
     * @param string $orientation
     * @return mixed
     */
    public function load($html, $size = 'A4', $orientation = 'portrait');

    /**
     * @param null $filename
     * @return mixed
     */
    public function filename($filename = null);

    /**
     * @param $size
     * @param $orientation
     * @return mixed
     */
    public function setPaper($size, $orientation);

    /**
     * @return mixed
     */
    public function render();

    /**
     * @return mixed
     */
    public function clear();

    /**
     * @param array $options
     * @return mixed
     */
    public function show($options = ['compress' => 1, 'Attachment' => 0]);

    /**
     * @param array $options
     * @return mixed
     */
    public function download($options = ['compress' => 1, 'Attachment' => 0]);

    /**
     * @param array $options
     * @return mixed
     */
    public function output($options = ['compress' => 1]);

}
