<?php

/**
 * Class DB_Connect
 */
class DB_Connect
{
    /**
     * constructor
     */
    function __construct()
    {
        $this->connect();
    }

    /**
     * destructor
     */
    function __destruct()
    {
//        $this->close();
    }

    public function connect()
    {
        require_once __DIR__ . '/Config.php';
        $con = new PDO('mysql:host=localhost;dbname=malayeri;charset=utf8mb4', 'malayeri', '123456789');
//        $con = new PDO('mysql:host=localhost;dbname=arashhat_malayeri;charset=utf8mb4', 'arashhat_malayeri', 'malayeri123456');
        return $con;
    }

    /**
     * Closing database connection
     */
    public function close()
    {
        mysql_close();
    }
}