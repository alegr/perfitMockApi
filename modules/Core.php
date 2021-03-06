<?php

/**
 * Core
 *
 * Core abstract class
 * @version 1.0
 * @package Core
*/
class Core
{

    /**
     * Set the output error
     * 
     * @param integer $code Error code
     * @param string $message Error message
     * @return boolean
     */
    static public function error ($code, $message)
    {
        Response::error($code, $message);
        return false;
    }

}