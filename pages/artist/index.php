<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <img src="assets/images/dashboard.png" width="20" height="20" class="icon-img-title" alt=""> 
                <h4>Artist</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active">Artist</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Artist Data</h5></div>
                <a href="app.php?page=artist/create">
                    <button class="btn-cs btn-cs-success">Add</button>
                </a>
                <p></p>
    
                <div class="table-responsive">
                    <?php
                        require_once "../env.php";

                        $artist = new App\Artist();
                        $artists = $artist->getArtist(); 

                        if (isset($_POST['submit'])) {
                            $artist->setId($_POST['id']);
                            
                            $artist->delete();
                            header('location:app.php?page=artist/index');
                        }
                    ?>
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Artist Name</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($artists)) { ?>
                           <tr>
                                <td colspan="3" style="text-align: center">Data masih kosong</td>
                           </tr> 
                        <?php } ?>
                            
                        <?php foreach ($artists as $artist) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $artist['artis_name'] ?></td>
                                <td>
                                    <a href="app.php?page=artist/edit&id=<?php echo $artist['id'] ?>">
                                        <button class="btn-cs btn-cs-warning">Edit</button>
                                    </a>
                                    <form method="POST" style="display: inline-block">
                                        <input type="hidden" name="id" value="<?php echo $artist['id'] ?>">
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