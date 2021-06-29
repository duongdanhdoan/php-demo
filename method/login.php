<?php
require_once("./db/dbconnect.php");
error_reporting(E_ERROR | E_PARSE);
login();
checkLogin();
function login(){
    
    if(!empty($_POST)){
        $uname=$_POST['uname'];
        $pwd=$_POST['pwd'];
        echo $uname."-".$pwd;
    }
}
function checkLogin(){
    global $mysqli;
    $query1  = "SELECT * FROM admin where userAdmin = '".$_POST['uname']."'and pwdAdmin = '".$_POST['pwd']."'";
    $result = mysqli_query($mysqli,$query1);
    if(mysqli_num_rows($result) > 0 ){
        header("location: ./admin/admin.php");
    }else {
        $query2  = "SELECT * FROM shop where username = '".$_POST['uname']."'and pwd = '".$_POST['pwd']."'";
        $result = mysqli_query($mysqli,$query2);
        if(mysqli_num_rows($result)>0){
            header("location: ./shop/shopinterface.php");
        }

    }
    
    // if ($uname == "duongdanhdoan@gmail.com" && $pwd == "doan"){
    //     header("location: admin/admin.php");
    // }
    // else{ header("location shop/shopinterface.php");}
}

?>