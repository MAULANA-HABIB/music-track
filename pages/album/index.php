<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <img src="assets/images/dashboard.png" width="20" height="20" class="icon-img-title" alt=""> 
                <h4>Album</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active">Album</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Album Data</h5></div>
                <a href="app.php?page=album/create">
                    <button class="btn-cs btn-cs-success">Add</button>
                </a>
                <p></p>
    
                <div class="table-responsive">
                    <?php
                        require_once "../env.php";

                        $album = new App\Album();
                        $albums = $album->getAlbum(); 

                        if (isset($_POST['submit'])) {
                            $album->setId($_POST['id']);
                            
                            $album->delete();
                            header('location:app.php?page=album/index');
                        }
                    ?>
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Album Name</th>
                                <th>Artist Name</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($albums)) { ?>
                           <tr>
                                <td colspan="4" style="text-align: center">Data masih kosong</td>
                           </tr> 
                        <?php } ?>
                            
                        <?php foreach ($albums as $album) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $album['album_name'] ?></td>
                                <td><?php echo $album['artis_name'] ?></td>
                                <td>
                                    <a href="app.php?page=album/edit&id=<?php echo $album['id'] ?>">
                                        <button class="btn-cs btn-cs-warning">Edit</button>
                                    </a>
                                    <form method="POST" style="display: inline-block">
                                        <input type="hidden" name="id" value="<?php echo $album['id'] ?>">
                                        <button type="submit" name="submit" class="btn-cs btn-cs-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>