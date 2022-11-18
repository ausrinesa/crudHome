<?php

include "./models/Home.php";
class HomeContoller
{

    public static function index()
    {
        $homes = Home::all();
        return $homes;
    }

    public static function store()
    {
        Home::create();
    }

    public static function show()
    {
        $home = Home::find($_POST['id']);
        return $home;
    }

    public static function update()
    {
        $home = new Home;
        $home->id = $_POST['id'];
        $home->address = $_POST['address'];
        $home->roomCount = $_POST['roomCount'];
        $home->isHouse = $_POST['isHouse'];
        $home->floor = $_POST['floor'];
        $home->update();
    }

    public static function destroy()
    {
        Home::destroy($_POST['id']);
    }

//     public static function getGenre()
// {
//     return Home::getGenre();
// }

    public static function filter()
    {
        return Home::filter();

    }

// public static function search()
// {
//     return Movie::search();
// }

}