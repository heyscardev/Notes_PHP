<?php
class ViewsController{
function app(){
   require_once('views/app.php');
}
function home(){
    require_once('views/home.php');
}
function createTask(){
    require_once('views/Tasks/Create.php');
}
function registerUser(){
    require_once('views/user/create.php');
}
}
?>