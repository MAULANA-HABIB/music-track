<?php

namespace App;
use PDO;

class DB{
    protected $db;

    public function __construct(){
        try{
            $this->db = new PDO("mysql:host=localhost; dbname=db_album_track", "root", "");
        } catch(\Exception $e){
            die ("Error : " . $e->getMessage());
        }
    }
}