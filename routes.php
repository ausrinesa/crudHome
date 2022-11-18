<?php
include "./controllers/HomeController.php";

$edit = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        HomeContoller::store();
        header("Location:./index.php");
        die;
    }
    if (isset($_POST['edit'])) {
        $home = HomeContoller::show();
        $homes = HomeContoller::index();
        $edit = true;
    }

    if (isset($_POST['update'])) {
        HomeContoller::update();
        header("Location: ./index.php");
        die;
    }
    if (isset($_POST['destroy'])) {
        HomeContoller::destroy();
        header("Location: ./index.php");
        die;
    }


}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['filter'])) {
        $homes = HomeContoller::filter();
        // } else if (isset($_GET['search'])) {
        //     $movies = MovieContoller::search();
    } else {
        $homes = HomeContoller::index();
    }
}



// $genres = MovieContoller::getGenre();


?>