<?php
/*************************************************************************
 *
 * Modified book code to allow for more database configuration.
 * 
 */

class DB
{
    function connect($db)
    {
        try {
            $conn = new PDO("mysql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}", $db['username'], $db['password']);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }
}