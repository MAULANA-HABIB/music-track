<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="title-page">
                <img src="assets/images/dashboard.png" width="20" height="20" class="icon-img-title" alt=""> 
                <h4>Played</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">Pages <i class="fas fa-chevron-right"></i> </li>
                <li class="breadcrumbs-item active">Played</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-cs">
                <div class="card-title-cs"><h5>Played Data</h5></div>
                <a href="app.php?page=played/create">
                    <button class="btn-cs btn-cs-success">Add</button>
                </a>
                <p></p>
    
                <div class="table-responsive">
                    <?php
                        require_once "../env.php";

                        $played = new App\Played();
                        $playeds = $played->getPlayed(); 

                        if (isset($_POST['submit'])) {
                            $played->setId($_POST['id']);
                            
                            $played->delete();
                            header('location:app.php?page=played/index');
                        }
                    ?>
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Artis Name</th>
                                <th>Album Name</th>
                                <th>Track Name</th>
                                <th>Time Played</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($playeds)) { ?>
                           <tr>
                                <td colspan="6" style="text-align: center">Data masih kosong</td>
                           </tr> 
                        <?php } ?>
                            
                        <?php foreach ($playeds as $played) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $played['artis_name'] ?></td>
                                <td><?php echo $played['album_name'] ?></td>
                                <td><?php echo $played['track_name'] ?></td>
                                <td><?php echo $played['played'] ?></td>
                                <td>
                                    <a href="app.php?page=played/edit&id=<?php echo $played['id'] ?>">
                                        <button class="btn-cs btn-cs-warning">Edit</button>
                                    </a>
                                    <form method="POST" style="display: inline-block">
                                        <input type="hidden" name="id" value="<?php echo $played['id'] ?>">
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