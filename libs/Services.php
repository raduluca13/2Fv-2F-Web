<?php

class Services
{
    public function __construct()
    {
        $this->db = new DatabaseFactory();
    }
}
?>
