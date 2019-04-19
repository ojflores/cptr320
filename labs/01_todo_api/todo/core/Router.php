<?php

/*************************************************************************
 *
 * Provided by the book.
 * 
 */

class Router
{
    private $routes = [];

    function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    function getFilename(string $url)
    {
        foreach ($this->routes as $route => $file) {
            if (strpos($url, $route) !== false) {
                return $file;
            }
        }
        // Default when no route exists.
        return "info.php";
    }

}