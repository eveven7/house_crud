<?php
include "./models/House.php";

class HouseController{

    public static function index(){
        $houses = House::all();
        return $houses;
    }


    public static function store(){
        House::create();
        print_r("vdxcfgv");
    }

    public static function show(){
        $house = House::find($_POST['id']);
        return $house;
    }

    public static function update(){
       $item = new House();
       $item->id = $_POST['id'];
       $item->address = $_POST['address'];
       $item->roomCount = $_POST['roomCount'];
       $item->isHouse = $_POST['isHouse'];
       $item->floor = $_POST['floor'];
       $item->update();
    }

    public static function destroy(){
        House::destroy($_POST['id']);
    }

    public static function getfilterParams(){
        return House::getfilterParams();
     }


    public static function filter(){
        return House::filter();
     }

     public static function search(){
        return House::search();
     }

}
?>