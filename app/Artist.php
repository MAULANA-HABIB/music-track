<?php

namespace App;

Class Artist extends DB{
    private $id;
    private $artist_name;

    public function setArtistName($artist_name){
        return $this->artist_name = $artist_name;
    }

    public function getArtistName(){
        return $this->artist_name;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getArtist(){
        $sql = "SELECT * FROM artist order by id desc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }
    
    public function store(){
        $artist_name = $this->getArtistName();

        $sql = "INSERT INTO artist VALUES('', '$artist_name')";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function edit($id){
        $sql = "SELECT * FROM artist WHERE id='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data;
    }

    public function update(){
        $id = $this->getId();
        $artist_name = $this->getArtistName();

        $sql = "UPDATE artist SET artis_name='$artist_name' WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function delete(){
        $id = $this->getId();

        $sql = "DELETE FROM artist WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();        
    }
}

