<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <i class="fas fa-tag icon-img-title"></i>
                <h4>Played</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active">Played</a> <i class="fas fa-chevron-right"></i></li>
                <li class="breadcrumbs-item active">Add Played</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Add Played</h5></div>

                <?php
                    require_once "../env.php";

                    $played = new App\Played();
                    $row = $played->edit($_GET['id']);

                    $track = new App\Track();
                    $tracks = $track->getTrack();

                    $album = new App\Album();
                    $albums = $album->getAlbum();

                    $artist = new App\Artist();
                    $artists = $artist->getArtist();

                    if (isset($_POST['submit'])) {
                        $played->setId($_POST['id']);
                        $played->setTimePlayed($_POST['played']);
                        $played->setTrackId($_POST['track_id']);
                        $played->setAlbumId($_POST['album_id']);
                        $played->setArtistId($_POST['artist_id']);

                        $played->update();

                        header('location:app.php?page=played/index');
                    }  
                ?>
                <form action="" class="form-cs" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <div class="form-group-cs">
                        <label for="played" class="label-form-cs">Time Played</label>
                        <input type="text" id="Rplayed" name="played" class="form-control-cs" value="<?php echo $row['played'] ?>" required>
                    </div>

                    <div class="form-group-cs">
                        <label for="track_id" class="label-form-cs">Artist Name</label>
                        <select id="track_id" name="track_id" class="form-control-cs" required>
                            <option value="">-Silahkan Pilih-</option>
                            <?php foreach ($tracks as $track) { ?>
                                <option value="<?php echo $track['id'] ?>" 
                                <?php if($track['id'] == $row['track_id']){ ?> selected <?php } ?> 
                                ><?php echo $track['track_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group-cs">
                        <label for="artist_id" class="label-form-cs">Artist Name</label>
                        <select id="artist_id" name="artist_id" class="form-control-cs" required>
                            <option value="">-Silahkan Pilih-</option>
                            <?php foreach ($artists as $artist) { ?>
                                <option value="<?php echo $artist['id'] ?>" 
                                <?php if($artist['id'] == $row['artist_id']){ ?> selected <?php } ?> 
                                ><?php echo $artist['artis_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group-cs">
                        <label for="album_id" class="label-form-cs">Album Name</label>
                        <select id="album_id" name="album_id" class="form-control-cs" required>
                            <option value="">-Silahkan Pilih-</option>
                            <?php foreach ($albums as $album) { ?>
                                <option value="<?php echo $album['id'] ?>"
                                <?php if($album['id'] == $row['album_id']) { ?> selected <?php } ?> ><?php echo $album['album_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="card-footer-cs">
                        <button class="btn-cs btn-cs-success" type="submit" name="submit">Simpan</button>
                        <a href="app.php?page=played/index">
                            <button class="btn-cs btn-cs-danger" type="button">Batal</button>
                        </a>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
 
    