<?php


/**
 * Methodes statiques de Debug
 */
class Debug
{
    /**
     * Réécriture de la fonction var_dump
     * @param mixed $var
     * @return void
     */
    static public function dump($var){
        echo '<pre>';

        var_dump($var);
        echo '</pre>';
    }


    /**
     * dump et die
     * @param mixed $var
     * @return void
     */
    static public function dd($var)
    {
        self::dump($var);
        die;
    }
}