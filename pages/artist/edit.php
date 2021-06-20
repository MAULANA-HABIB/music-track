<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <i class="fas fa-tag icon-img-title"></i>
                <h4>Artist</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active">Artist</a> <i class="fas fa-chevron-right"></i></li>
                <li class="breadcrumbs-item active">Edit Artist</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Edit Artist</h5></div>

                <?php
                    require_once "../env.php";

                    $artist = new App\Artist();
                    $row = $artist->edit($_GET['id']);
                    
                    if (isset($_POST['submit'])) {
                        $artist->setId($_POST['id']);
                        $artist->setArtistName($_POST['artist_name']);

                        $artist->update();
                        header('location:app.php?page=artist/index');
                    }  
                ?>
                <form action="" class="form-cs" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <div class="form-group-cs">
                        <label for="artist_name" class="label-form-cs">Artist Name</label>
                        <input type="text" id="artist_name" name="artist_name" class="form-control-cs" value="<?php echo $row['artis_name'] ?>" required>
                    </div>

                    <div class="card-footer-cs">
                        <button class="btn-cs btn-cs-success" type="submit" name="submit">Simpan</button>
                        <a href="app.php?page=artist/index">
                            <button class="btn-cs btn-cs-danger" type="button">Batal</button>
                        </a>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
 
    