<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <i class="fas fa-tag icon-img-title"></i>
                <h4>Album</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active">Album</a> <i class="fas fa-chevron-right"></i></li>
                <li class="breadcrumbs-item active">Add Album</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Add Album</h5></div>

                <?php
                    require_once "../env.php";

                    $track = new App\Track();
                    $row = $track->edit($_GET['id']);

                    $album = new App\Album();
                    $albums = $album->getAlbum();

                    $artist = new App\Artist();
                    $artists = $artist->getArtist();

                    if (isset($_POST['submit'])) {
                        $track->setId($_POST['id']);
                        $track->setTrackName($_POST['track_name']);
                        $track->setAlbumId($_POST['album_id']);
                        $track->setArtistId($_POST['artist_id']);

                        $track->update();
                        header('location:app.php?page=track/index');
                    }  
                ?>
                <form action="" class="form-cs" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <div class="form-group-cs">
                        <label for="track_name" class="label-form-cs">Track Name</label>
                        <input type="text" id="track_name" name="track_name" class="form-control-cs" value="<?php echo $row['track_name'] ?>" required>
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

                    <div class="form-group-cs">
                        <label for="time" class="label-form-cs">Time (Minute)</label>
                        <input type="text" id="time" name="time" class="form-control-cs" value="<?php echo $row['time'] ?>" required>
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
 
    