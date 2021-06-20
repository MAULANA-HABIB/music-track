<?php

namespace App;

Class Track extends DB{
    private $id;
    private $track_name;
    private $artist_id;
    private $album_id;
    private $time;

    public function setId($id){
        return $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setTrackName($track_name){
        return $this->track_name = $track_name;
    }

    public function getTrackName(){
        return $this->track_name;
    }

    public function setTime($time){
        return $this->time = $time;
    }

    public function getTime(){
        return $this->time;
    }

    public function setArtistId($artist_id){
        return $this->artist_id = $artist_id;
    }

    public function getArtistId(){
        return $this->artist_id;
    }

    public function setAlbumId($album_id){
        return $this->album_id = $album_id;
    }

    public function getAlbumId(){
        return $this->album_id;
    }

    public function getTrack(){
        $sql = "SELECT track.*, album.album_name, artist.artis_name FROM track 
                                inner join artist ON artist.id = track.artist_id 
                                inner join album ON album.id = track.album_id 
                                order by track.id desc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }
    
    public function store(){
        $track_name = $this->getTrackName();
        $artist_id = $this->getArtistId();
        $album_id = $this->getAlbumId();
        $time = $this->getTime();

        $sql = "INSERT INTO track VALUES('', '$track_name', '$artist_id', '$album_id', '$time')";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function edit($id){
        $sql = "SELECT * FROM track WHERE id='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data;
    }

    public function update(){
        $id = $this->getId();
        $track_name = $this->getTrackName();
        $album_id = $this->getAlbumId();
        $artist_id = $this->getArtistId();
        $time = $this->getTime();

        $sql = "UPDATE track SET track_name='$track_name', time='$time', album_id='$album_id', artist_id='$artist_id' WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function delete(){
        $id = $this->getId();

        $sql = "DELETE FROM track WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();        
    }
}

