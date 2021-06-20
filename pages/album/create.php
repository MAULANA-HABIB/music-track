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
                <li class="breadcrumbs-item active"><a href="kategori/index.php">Album</a> <i class="fas fa-chevron-right"></i></li>
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
                    
                    $album = new App\Album();
                    $artist = new App\Artist();
                    $artists = $artist->getArtist();

                    if (isset($_POST['submit'])) {
                        $album->setAlbumName($_POST['album_name']);
                        $album->setArtistId($_POST['artist_id']);
                        $album->store();
                        header('location:app.php?page=album/index');
                    }  
                ?>

                <form action="" class="form-cs" method="POST">
                    <div class="form-group-cs">
                        <label for="album_name" class="label-form-cs">Album Name</label>
                        <input type="text" id="album_name" name="album_name" class="form-control-cs" required>
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

                    <div class="card-footer-cs">
                        <button class="btn-cs btn-cs-success" type="submit" name="submit">Simpan</button>
                        <a href="app.php?page=album/index">
                            <button class="btn-cs btn-cs-danger" type="button">Batal</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>