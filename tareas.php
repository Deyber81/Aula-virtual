<?php 
include('BD/conectar.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}   
if (isset ($_REQUEST['clave'])&& !empty($_REQUEST['clave'])){
    $_SESSION['clave']=$_REQUEST['clave'];

}
if (isset ($_REQUEST['fe'])&& !isset($_REQUEST['modificar'])){
    $u=$_SESSION['user'];
    $c=$_SESSION['clave'];
    $t=$_REQUEST['titulo'];
    $tx=$_REQUEST['texto'];
    $fe=$_REQUEST['fe'];
    $for="INSERT INTO tareas VALUES (NULL,'$u','$c','$t','$tx',NULL,'$fe')";
    mysqli_query($con, $for);

}
if (isset ($_REQUEST['modificar'])){
    $u=$_SESSION['user'];
    $c=$_SESSION['clave'];
    $t=$_REQUEST['titulo'];
    $tx=$_REQUEST['texto'];
    $fe=$_REQUEST['fe'];
    $for="UPDATE tareas SET titulo='$t',texto='$tx', fechaentrega='$fe' where idtarea='".$_REQUEST['modificar']."'";
    mysqli_query($con, $for);

}
if (isset ($_REQUEST['ea'])){
    $e=$_REQUEST['ea'];
    $delete="DELETE FROM tareas WHERE idtarea='$e'";
    $eliminar=mysqli_query($con,$delete);
}
if (isset ($_REQUEST['ma'])) {
    $m=$_REQUEST['ma'];
  $mq= mysqli_query($con,("SELECT * FROM tareas Where idtarea='$m'"));
 $mpal=mysqli_fetch_assoc($mq);
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
$queryplan=mysqli_query($con,("SELECT * FROM tareas WHERE  clave='".$_SESSION['clave']."' ORDER BY fecha desc"));
$n=mysqli_num_rows($queryplan);
$aplan=mysqli_fetch_assoc($queryplan);

}  else {

   }
$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'")));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
        <?php include ('includes/menu.php') ?>
        <?php include ('includes/arriba.php') ?>
        <section class="container">
<?php

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

if($B['Tipo']=='profe'){
    ?>
    <section class="position-relative py-4 py-xl-5">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-lg-5 col-xl-5 col-xxl-4 offset-lg-0">
                        <div class="card mb-5">
                            <div class="card-body p-sm-5">
                                <h1 class="text-center mb-4">Crear un nueva tarea</h1>
                                <form action="tareas.php" method="post">
                                <div class="mb-3"><input  class="form-control" type="text" name="titulo" 
                                <?php if (isset ($_REQUEST['ma'])){ echo "value='".$mpal['titulo']."'";} ?> 
                                 placeholder="Titulo" required></div>
                                 <div class="mb-3"><textarea class="form-control" name="texto" id="" cols="30" rows="10" placeholder="Comentario del material" required><?php if (isset ($_REQUEST['ma'])){ echo $mpal['comentario'] ;} ?></textarea></div>
                                 <div class="mb-3"> <input class="form-control"   type="date" name="fe" placeholder="Fecha de entrega"<?php if (isset ($_REQUEST['ma'])){ echo "value='".$mpal['fechaentrega']."'";} ?> required></div>
                                 <?php if (isset ($_REQUEST['ma'])){ echo "<input type='hidden' name='modificar' value='".$_REQUEST['ma']."'>";} ?>
                                 <input  class="btn btn-primary d-block w-100" type="submit" <?php if (isset ($_REQUEST['ma']))  {echo "value='Editar'";}else { echo "value='Agregar'";}?>>  
                            </from>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    <h1 class="text-center mb-4">Tareas del Curso</h1>
                        <?php
        if ($n>0){
            do{
            echo"<article class=<br>";
            echo"<h1> Titulo de la tarea : ".$aplan['titulo']."</h1></br>";
            echo"<p>".$aplan['fecha']."<p>";
            echo"<p>Comentario sobre la tarea : ".$aplan['comentario']."</p>";
            echo"<p> fecha de entrega : ".$aplan['fechaentrega']."</p>";
            echo"<td><a class='btn btn-danger' href='tareas.php?ea=".$aplan['idtarea']."'> eliminar actividad</a> </td></tr>";
            echo"<td><a class='btn btn-warning' href='tareas.php?ma=".$aplan['idtarea']."'>editar actividad</a> </td></tr>";
            echo "<hr>";
        }while($aplan=mysqli_fetch_assoc($queryplan));
        echo"<tr><td colspan='4'>total de sus planes ".$n."</td></tr>"; 
        }else {
            echo"<tr><td colspan='4'>no hay ningun plan </td></tr>";
        }
        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php }
        ?>
        <?php
          if($B['Tipo']=='alumno'){
            ?>
             <section class="position-relative py-4 py-xl-5">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center" style="height: 96px;margin-right: 2px;">
                <div class="col-md-12" style="width: 930.6px;height: 175px;margin: 9px;">
    
       <?php
        if ($n>0){
            do{
            echo"<article  style='border-style: solid;border-color:rgb(1,1,1);'>";
            ?>
            <?php
            echo"<h1 style='text-align:center; color:blue; border-style: solid;border-color:rgb(1,1,1); font-weight: bold;'>".$aplan['titulo']."</h1></br>";
            echo"<p style='color: blue ;'> fecha :".$aplan['fecha']."</p>";
            echo"<p style='color: blue ;'> comentario de tarea :".$aplan['comentario']."</p>";
            echo"<p style='color: var(--bs-teal);' >".$aplan['titulo']."</p>";
            echo"<p style='color: red;'>fecha de entrega:".$aplan['fechaentrega']."</p>";
            echo "</article> ";
        }while($aplan=mysqli_fetch_assoc($queryplan));
        echo"<tr><td colspan='5'>total de sus planes ".$n."</td></tr>"; 
        }else {
            echo"<tr><td colspan='5'>no hay ningun plan </td></tr>";
        }
        ?>
                      
                    </div>
                </div>
            </div>
        </section>
    
    
            <?php }
        ?>
        </section>
        <?php

}  else {
 echo "<h1> NO ESTA REGISTRADO EN NINGUN CURSO</h1>";
   }

?>


 
</body>
</html>