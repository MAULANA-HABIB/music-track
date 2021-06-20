<?php

require_once "env.php";

if (isset($_SESSION['email'])) {
    require_once "layouts/app.php";    
}else{
    require_once "layouts/auth.php";    
}
