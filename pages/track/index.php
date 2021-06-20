<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <img src="assets/images/dashboard.png" width="20" height="20" class="icon-img-title" alt=""> 
                <h4>Track</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active">Track</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Track Data</h5></div>
                <a href="app.php?page=track/create">
                    <button class="btn-cs btn-cs-success">Add</button>
                </a>
                <p></p>
    
                <div class="table-responsive">
                    <?php
                        require_once "../env.php";

                        $track = new App\Track();
                        $tracks = $track->getTrack(); 

                        if (isset($_POST['submit'])) {
                            $track->setId($_POST['id']);
                            
                            $track->delete();
                            header('location:app.php?page=track/index');
                        }
                    ?>
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Track Name</th>
                                <th>Artist Name</th>
                                <th>Album Name</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($tracks)) { ?>
                           <tr>
                                <td colspan="5" style="text-align: center">Data masih kosong</td>
                           </tr> 
                        <?php } ?>
                            
                        <?php foreach ($tracks as $track) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $track['track_name'] ?></td>
                                <td><?php echo $track['artis_name'] ?></td>
                                <td><?php echo $track['album_name'] ?></td>
                                <td>
                                    <a href="app.php?page=track/edit&id=<?php echo $track['id'] ?>">
                                        <button class="btn-cs btn-cs-warning">Edit</button>
                                    </a>
                                    <form method="POST" style="display: inline-block">
                                        <input type="hidden" name="id" value="<?php echo $track['id'] ?>">
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