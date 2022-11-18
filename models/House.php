<?php
include "./models/DB.php";


  class House{
    public $id;
    public $address;
    public $room_count;
    public $is_house;
    public $floor;

        public function __construct($id = null, $address = null, $room_count = null, $is_house = null, $floor = null){
            $this->id = $id;
        $this->address = $address;
        $this->roomCount = $room_count;
        $this->isHouse = $is_house;
        $this->floor = $floor;
        }

        public static function all(){
            $houses = [];
            $db = new DB();
            $query = "SELECT * FROM `namuciai`";
            $result = $db->conn->query($query);

                while($row = $result->fetch_assoc()){
                    $houses[] = new House ($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);

                }
            $db->conn->close();
            return $houses;
        }

        public static function create(){
            $db = new DB();
            // print_r($_POST);die;
            $stmt = $db->conn->prepare("INSERT INTO `namuciai`( `address`, `room_count`, `is_house`, `floor`) VALUES (?,?,?,?)");
            $stmt->bind_param("siii", $_POST['address'], $_POST['roomCount'], $_POST['isHouse'], $_POST['floor']);
           // $stmt->execute();
            if(!$stmt->execute()) {
                print_r( $stmt->error_list);
            }
            //    die;
            $stmt->close();
            $db->conn->close();
            }

    public static function find($id){
            $house = new House();
            $db = new DB();
            $query = "SELECT * FROM `namuciai` where `id`=". $id;
            $result = $db->conn->query($query);

                while($row = $result->fetch_assoc()){
                    $house = new House ($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);
                }
            $db->conn->close();
            return $house;
        }

    public function update(){       
            $db = new DB();
            $stmt = $db->conn->prepare("UPDATE `namuciai`( `address`, `room_count`, `is_house`, `floor`) VALUES (?,?,?,?)");
            $stmt->bind_param("siii", $_POST['address'], $_POST['roomCount'], $_POST['isHouse'], $_POST['floor']);
            $stmt->execute();
    
            $stmt->close();
            $db->conn->close();
    }

    public static function destroy($id){
            $db = new DB();
            $stmt = $db->conn->prepare("DELETE FROM `namuciai` WHERE `id` = ?");
            $stmt->bind_param("i", $_POST['id']);
            $stmt->execute();
    
            $stmt->close();
            $db->conn->close(); 
    }

    public static function getfilterParams(){
            $params = [];
            $db = new DB();
            $query = "SELECT DISTINCT `room_count` FROM `namuciai`";
            $result = $db->conn->query($query);

                while($row = $result->fetch_assoc()){
                    $params [] = $row['room_count'];
                }
            $db->conn->close();
            return $params;
    }

    public static function filter(){
            $items = [];
            $db = new DB();
            $query = "SELECT * FROM `namuciai`";
            $first = true;
            if ($_GET['filter'] != "") {
                $first = false;
                $query .= "WHERE `room_count` = '" . $_GET['filter'] . "' ";
            }
            

            if ($_GET['from'] != "") {
            $query .= (($first)? "WHERE" : "AND") . "`floor` >= " . $_GET['from'] . " ";
                $first = false;
            }


            if ($_GET['to'] != "") {
                $query .= (($first)? "WHERE" : "AND") . "`floor` <= " . $_GET['to'] . " ";
                $first = false;
         }


        switch ($_GET['sort']){
            case '1':
                $query .= "ORDER by `floor`";
                break;
            case '2':
                $query .= "ORDER by `floor` DESC";
                break;
            case '3':
                $query .= "ORDER by `address`";
                break;
            case '4':
                $query .= "ORDER by `address` DESC";
                break;
        }



            // echo $query;
            // die;
            $result = $db->conn->query($query);

                while($row = $result->fetch_assoc()){
                    $houses[] = new House ($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);

                }
            $db->conn->close();
            return $houses;
    }

    public static function search(){
        $houses = [];
        $db = new DB();
        $query = "SELECT * FROM `namuciai` where `address` like \"%" . $_GET['search'] . "%\"";
        $result = $db->conn->query($query);

            while($row = $result->fetch_assoc()){
                $houses[] = new House ($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);

            }
        $db->conn->close();
        return $houses;
    }

  }

?>