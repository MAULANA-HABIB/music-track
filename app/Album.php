<?php

namespace App;

Class Album extends DB{
    private $id;
    private $album_name;
    private $artist_id;

    public function setId($id){
        return $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setAlbumName($album_name){
        return $this->album_name = $album_name;
    }

    public function getAlbumName(){
        return $this->album_name;
    }

    public function setArtistId($artist_id){
        return $this->artist_id = $artist_id;
    }

    public function getArtistId(){
        return $this->artist_id;
    }

    public function getAlbum(){
        $sql = "SELECT album.*, artist.artis_name FROM album inner join artist ON artist.id = album.artist_id order by album.id desc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }
    
    public function store(){
        $album_name = $this->getAlbumName();
        $artist_id = $this->getArtistId();

        $sql = "INSERT INTO album VALUES('', '$album_name', '$artist_id')";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function edit($id){
        $sql = "SELECT * FROM album WHERE id='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data;
    }

    public function update(){
        $id = $this->getId();
        $album_name = $this->getAlbumName();
        $artist_id = $this->getArtistId();

        $sql = "UPDATE album SET album_name='$album_name', artist_id='$artist_id' WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function delete(){
        $id = $this->getId();

        $sql = "DELETE FROM album WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();        
    }
}

