<?php

include("connection.php");
$con = connection();

$id=$_POST["ID"];
$nombre = $_POST['Nombre'];
$username = $_POST['UserName'];
$nota = $_POST['Nota'];

$sql="UPDATE notes SET Nombre='$nombre', UserName='$username', Nota='$nota' WHERE ID='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>