<?php

include "./controllers/HouseController.php";

$edit = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    if(isset($_POST['save'])){
        HouseController::store();
        header("Location: ./index.php");
        die;
    }      

    if(isset($_POST['edit'])){
    
        $house = HouseController::show();
        $houses = HouseController::index();
        $edit = true;
    }  

    if(isset($_POST['update'])){
        
        HouseController::update();
        header("Location: ./index.php");
        die;
    }

    if(isset($_POST['destroy'])){
        HouseController::destroy();
        header("Location: ./index.php");
        die;
    }

}

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(isset($_GET['filter'])){
            $houses = HouseController::filter();
        }
        
        if(isset($_GET['search'])){
            $houses = HouseController::search();
        }
        
        if (count($_GET) == 0){
            $houses = HouseController::index();
        }
    
        
    }
    $params = HouseController::getfilterParams();
    ?>