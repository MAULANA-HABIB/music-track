<!DOCTYPE html>
<html lang="en">
    <?php include '../partials/header_script.php'; ?>
<body>
    <?php include '../components/_header.php'; ?>
    
    <div class="dashboard">
        <?php include '../components/_sidebar.php'; ?>
        <?php
            if(isset($_GET['page'])){
                include '../pages/'. $_GET['page'] . '.php';
            }else{
                include '../pages/dashboard.php';
            }
        ?>
    </div>

    <?php include '../components/_footer.php'; ?>
    <?php include '../partials/footer_script.php'; ?>


</body>
</html>