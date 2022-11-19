<?php

include "./models/DB.php";

class Home
{
    public $id;
    public $address;
    public $roomCount;
    public $isHouse;
    public $floor;

    public function __construct($id = null, $address = null, $roomCount = null, $isHouse = null, $floor = null)
    {
        $this->id = $id;
        $this->address = $address;
        $this->roomCount = $roomCount;
        $this->isHouse = $isHouse;
        $this->floor = $floor;

    }

    public static function all()
    {
        $homes = [];
        $db = new DB();
        $query = "SELECT * FROM `homes`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $homes[] = new Home($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);
        }
        $db->conn->close();
        return $homes;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `homes`(`address`, `room_count`, `is_house`, `floor`) VALUES (?,?,?,?)");
        $stmt->bind_param("siii", $_POST['address'], $_POST['roomCount'], $_POST['isHouse'], $_POST['floor']);
        $stmt->execute();
        $stmt->close();

        $db->conn->close();
    }

    public static function find($id)
    {
        $home = new Home();
        $db = new DB();
        $query = "SELECT * FROM `homes` where `id`=" . $id;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $home = new Home($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);
        }
        $db->conn->close();
        return $home;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `homes` SET `address`= ? ,`room_count`= ? ,`is_house`= ? ,`floor`= ? WHERE `id` = ?");
        $stmt->bind_param("siiii", $_POST['address'], $_POST['roomCount'], $_POST['isHouse'], $_POST['floor'], $_POST['id']);
        $stmt->execute();


        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `homes` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }


    public static function filter()
    {
        $homes = [];
        $db = new DB();
        $query = "SELECT * FROM `homes` ";
        $first = true;
        if ($_GET['isHouse'] != "") {
            $query .= "WHERE `is_house`=" . $_GET['isHouse'];
            $first = false;

        }

        if ($_GET['roomFrom'] != "") {
            $query .= (($first) ? "WHERE" : "AND") . " `room_count` >= " . $_GET['roomFrom'] . " ";
            $first = false;
        }

        if ($_GET['roomTo'] != "") {
            $query .= (($first) ? "WHERE" : "AND") . " `room_count` <= " . $_GET['roomTo'] . " ";
            $first = false;
        }

        switch ($_GET['sort']) {
            case '1':
                $query .= "ORDER BY `room_count`";
                break;

            case '2':
                $query .= "ORDER BY `room_count` DESC";
                break;

            case '3':
                $query .= "ORDER BY `address`";
                break;

            case '4':
                $query .= "ORDER BY `address` DESC";
                break;
        }



        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $homes[] = new Home($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);
        }
        $db->conn->close();
        return $homes;
    }

    public static function search()
    {
        $homes = [];
        $db = new DB();
        $query = "SELECT * FROM `homes` where `address` like \"%" . $_GET['search'] . "%\"";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $homes[] = new Home($row['id'], $row['address'], $row['room_count'], $row['is_house'], $row['floor']);
        }
        $db->conn->close();
        return $homes;
    }

}

?>