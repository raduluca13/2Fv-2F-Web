<?php

class DatabaseFactory
{
    private $conn=null;

    private function getConnection(){
        $connection = mysqli_connect("localhost", "tw", "test", "tw");
        return $connection;
    }
    function __construct()
    {
        $this->conn = $this->getConnection();
        if (!$this->conn)
        {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        } else
        {
            //echo "Succes!";
        }
    }

    function GetConn()
    {
      return $this->conn;
    }

    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new DatabaseFactory();
        }
        return $inst;
    }
}
?>
