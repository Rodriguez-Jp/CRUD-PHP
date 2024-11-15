<?php
include("connection.php");
$con = connection();

$id = null;
$nombre = $_POST['Nombre'];
$username = $_POST['UserName'];
$nota = $_POST['Nota'];

$sql = "INSERT INTO notes VALUES('$id','$nombre','$username','$nota')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>