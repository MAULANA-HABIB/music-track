<?php

namespace App;

Class Played extends DB{
    private $id;
    private $time_played;
    private $track_id;
    private $artist_id;
    private $album_id;

    public function setId($id){
        return $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setTrackId($track_id){
        return $this->track_id = $track_id;
    }

    public function getTrackId(){
        return $this->track_id;
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

    public function getTimePlayed(){
        return $this->time_played;
    }
    
    public function setTimePlayed($time_played){
        return $this->time_played = $time_played;
    }

    public function getPlayed(){
        $sql = "SELECT played.*, track.track_name, album.album_name, artist.artis_name FROM played 
                                inner join artist ON artist.id = played.artist_id 
                                inner join album ON album.id = played.album_id 
                                inner join track ON track.id = played.track_id 
                                order by played.id desc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }
    
    public function store(){
        $time_played = $this->getTimePlayed();
        $track_id = $this->getTrackId();
        $artist_id = $this->getArtistId();
        $album_id = $this->getAlbumId();

        $sql = "INSERT INTO played VALUES('', '$time_played', '$artist_id', '$album_id', '$track_id')";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function edit($id){
        $sql = "SELECT * FROM played WHERE id='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data;
    }

    public function update(){
        $id = $this->getId();
        $track_id = $this->getTrackId();
        $album_id = $this->getAlbumId();
        $artist_id = $this->getArtistId();
        $time_played = $this->getTimePlayed();

        $sql = "UPDATE played SET track_id='$track_id', played='$time_played', album_id='$album_id', artist_id='$artist_id' WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function delete(){
        $id = $this->getId();

        $sql = "DELETE FROM played WHERE id='$id'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();        
    }
}

