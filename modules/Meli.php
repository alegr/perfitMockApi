<?php

include('../lib/meli/meli.php');

/**
 * MercadoLibre library
 *
 * Handles MeLi interactions
 * @version 1.0
 * @package MeLi
*/
class Meli 
{

    /**
     * @var Meli $meli MeLi instance
     */
    private $meli = null; 

    /**
     * Retrieve the request method.
     *
     * @param string $key
     * @return string
     */
    public static function __construct ()
    {
        $this->meli = new Meli('1442982409057048', 'g1g6SpZ0ijyKB0lxoBefXOums8BiMiPK');
    }

    /**
     * Retrieve the request method.
     *
     * @param string $key
     * @return string
     */
    public static function method ()
    {
        $override = filter_input(INPUT_GET, '_method', FILTER_SANITIZE_STRING);
        return $override?: $_SERVER['REQUEST_METHOD'];
    }

}
