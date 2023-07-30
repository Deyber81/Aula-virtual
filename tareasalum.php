<?php
include('BD/conectar.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}   
if (isset ($_REQUEST['clave'])&& !empty($_REQUEST['clave'])){
    $_SESSION['clave']=$_REQUEST['clave'];
}
$menusalto=mysqli_query($con,(" SELECT * FROM  clase WHERE usuario='".$_SESSION['user']."'"));
$ams=mysqli_fetch_assoc($menusalto);
$x=mysqli_num_rows($menusalto);
if ($x>0)
{
   if(isset($_REQUEST['clave'])){
    $_SESSION['clave']=$_REQUEST['clave'];
    $clase=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM clase WHERE clave='".$_REQUEST['clave']."'")));
}else if (!isset($_SESSION['clave']))
{
    if ($B['Tipo']=='alumno'){
        $cclase=mysqli_query($con,"SELECT * FROM misclases, clase WHERE misclases.clave=clase.clave AND misclases.usuario='".$_SESSION['user']."'");
        $clase=mysqli_fetch_assoc($cclase);
        }else{
        $cclase=mysqli_query($con," SELECT *FROM  clase WHERE usuario='".$_SESSION['user']."'");
        $clase=mysqli_fetch_assoc($cclase);
        }
        $_SESSION['clave']=$clase['clave'];
    
}else {
    $clase=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM clase WHERE clave='".$_SESSION['clave']."'")));
}


}  else {

   }

$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'")));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Asignadas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
<?php include ('includes/menu.php')?>
<?php include ('includes/arriba.php'); 
if ($x>0)
{
   if(isset($_REQUEST['clave'])){
    $_SESSION['clave']=$_REQUEST['clave'];
    $clase=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM clase WHERE clave='".$_REQUEST['clave']."'")));
}else if (!isset($_SESSION['clave']))
{

    if ($B['Tipo']=='alumno'){
        $cclase=mysqli_query($con,"SELECT * FROM misclases, clase WHERE misclases.clave=clase.clave AND misclases.usuario='".$_SESSION['user']."'");
        $clase=mysqli_fetch_assoc($cclase);
        }else{
        $cclase=mysqli_query($con," SELECT *FROM  clase WHERE usuario='".$_SESSION['user']."'");
        $clase=mysqli_fetch_assoc($cclase);
        }
        $_SESSION['clave']=$clase['clave'];
   
}else {
    $clase=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM clase WHERE clave='".$_SESSION['clave']."'")));
    }
    $queryplan=mysqli_query($con,("SELECT * FROM tareas WHERE  clave='".$_SESSION['clave']."' ORDER BY fecha desc"));
    $n=mysqli_num_rows($queryplan);
    $aplan=mysqli_fetch_assoc($queryplan);
    $qtaraes=mysqli_query($con,("SELECT * FROM tareas WHERE  clave='".$_SESSION['clave']."' ORDER BY fecha DESC "));
$ntareas=mysqli_num_rows($qtaraes);
$arraytareas=mysqli_fetch_assoc($qtaraes);
?>
<center><h1>LISTADO DE TAREAS</h1></center>
    <?php 
    if($ntareas>0)
    {
        do{
            echo "<a  class='list-group-item list-group-item-action fs-1' href='entregatarea.php?tarea=".$arraytareas['idtarea']."'>".$arraytareas['titulo']."</a><br>";

        }while($arraytareas=mysqli_fetch_assoc($qtaraes));{

        }

    }else {
        echo "<H1>NO HAY NINGUNA TAREA</H1>";
    }
    ?>
<?php

}  else {
 echo "<h1> NO HAY NINUGNA TAREA</h1>";
   }

?>
</body>
</html>