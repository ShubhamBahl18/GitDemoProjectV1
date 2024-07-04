<?php

  $username=isset($_POST["username"])?$_POST["username"]:"";

  $password=isset($_POST["password"])?$_POST["password"]:"";

  $confirm=isset($_POST["confirm"])?$_POST["confirm"]:"";

  if(!empty($username)&&!empty($password)){

if($password!=$confirm)

header("location:registration.php?msg=Password does not match.");

$host="localhost";

$user="root";

$pass="";

$database="UserData";

///open connection

$link = new mysqli($host,$user,$pass,$database);



if ($link->connect_error) {
    die('Connection error: ' . $link->connect_error);
}


$query = "SELECT * FROM users WHERE username='".$link->real_escape_string($username)."'";

$result = $link->query($query);

//count no of rows

$count = $result->num_rows;

if($count==1){

header("location:registration.php?msg=username already exists");

}

else

{

$qry="INSERT INTO users(username,password)VALUES('".$link->real_escape_string($username)."'
,'".$link->real_escape_string($password)."')";

$result = $link->query($qry);


if($result){

  echo "You are successfully registered.";

  }
}


$link->close();



}

  else

  {

  header("location:registration.php?msg=Username or password cannot be blank.");

  }