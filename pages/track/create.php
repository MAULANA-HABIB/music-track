<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <i class="fas fa-tag icon-img-title"></i>
                <h4>Track</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active"><a href="kategori/index.php">Track</a> <i class="fas fa-chevron-right"></i></li>
                <li class="breadcrumbs-item active">Add Track</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Add Track</h5></div>

                <?php
                    require_once "../env.php";
                    
                    $track = new App\Track();
                    $album = new App\Album();
                    $artist = new App\Artist();
                    $albums = $album->getAlbum();
                    $artists = $artist->getArtist();

                    if (isset($_POST['submit'])) {
                        $track->setTrackName($_POST['track_name']);
                        $track->setTime($_POST['time']);
                        $track->setAlbumId($_POST['album_id']);
                        $track->setArtistId($_POST['artist_id']);
                        $track->store();
                        
                        header('location:app.php?page=track/index');
                    }  
                ?>

                <form action="" class="form-cs" method="POST">
                    <div class="form-group-cs">
                        <label for="track_name" class="label-form-cs">Track Name</label>
                        <input type="text" id="track_name" name="track_name" class="form-control-cs" required>
                    </div>

                    <div class="form-group-cs">
                        <label for="artist_id" class="label-form-cs">Artist Name</label>
                        <select id="artist_id" name="artist_id" class="form-control-cs" required>
                            <option value="">-Silahkan Pilih-</option>
                            <?php foreach ($artists as $artist) { ?>
                                <option value="<?php echo $artist['id'] ?>"><?php echo $artist['artis_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group-cs">
                        <label for="album_id" class="label-form-cs">Album Name</label>
                        <select id="album_id" name="album_id" class="form-control-cs" required>
                            <option value="">-Silahkan Pilih-</option>
                            <?php foreach ($albums as $album) { ?>
                                <option value="<?php echo $album['id'] ?>"><?php echo $album['album_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group-cs">
                        <label for="time" class="label-form-cs">Time (Minute)</label>
                        <input type="text" id="time" name="time" class="form-control-cs" required>
                    </div>

                    <div class="card-footer-cs">
                        <button class="btn-cs btn-cs-success" type="submit" name="submit">Simpan</button>
                        <a href="app.php?page=track/index">
                            <button class="btn-cs btn-cs-danger" type="button">Batal</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>