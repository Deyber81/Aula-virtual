<?php
include('BD/conectar.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}   

$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'")));
if($B['Tipo']=='alumno') {
    $menusalto=mysqli_query($con,("SELECT * FROM misclases, clase WHERE misclases.clave=clase.clave AND misclases.usuario='".$_SESSION['user']."'"));
    $ams=mysqli_fetch_assoc($menusalto);
    $x=mysqli_num_rows($menusalto);
    }else{
    $menusalto=mysqli_query($con,(" SELECT * FROM  clase WHERE usuario='".$_SESSION['user']."'"));
    $ams=mysqli_fetch_assoc($menusalto);
    $x=mysqli_num_rows($menusalto);
    }
if ($x==0){
    ?><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
<?php include ('includes/menu.php');?>
<?php include ('includes/arriba.php') ?>
<h1> NO ESTA REGISTRADO EN NINGUN CURSO</h1>
    </body>
    </html>
    <?php

} else {
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
$busc="SELECT * FROM clase WHERE Usuario='".$_SESSION['user']."'";
$cone=mysqli_query($con,$busc);
$x=mysqli_num_rows($cone);
$a=mysqli_fetch_assoc($cone);
$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'")));
$profe= mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM clase, usuario WHERE clase.Usuario=usuario.Usuario  AND clave='".$_SESSION['clave']."' ")));
$qalumnos=mysqli_query($con,("SELECT * FROM misclases, usuario WHERE misclases.Usuario=usuario.Usuario  AND misclases.clave='".$_SESSION['clave']."' "));
$alumnos= mysqli_fetch_assoc($qalumnos);
$nm=mysqli_num_rows($qalumnos);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
<?php include ('includes/menu.php')
 ?>
<?php include ('includes/arriba.php');
$queryplan=mysqli_query($con,("SELECT * FROM tareas WHERE  clave='".$_SESSION['clave']."' ORDER BY fecha desc"));
$n=mysqli_num_rows($queryplan);
$aplan=mysqli_fetch_assoc($queryplan); ?>

<div class="container"><span style="font-size: 32px;" center>LISTA DE ESTUDIANTES</span></div>
<form action="crearclase.php" method="post" enctype="multipart/form-data">
                <div class="container">
              
                    
                <div class="container">
                </form>
                <form>
                    <?php
                if (isset ($_REQUEST['e'])){
                $e=$_REQUEST['e'];
                 $delete="DELETE FROM clase WHERE idclase='$e'";
                $eliminar=mysqli_query($con,$delete);
                ?>
                <div  class="alert alert-success" role="alert">
                    Clase eliminada
                </div>
                <?php
               
                }
                ?>
                    <div class="row">
                        <div class="col-md-12" style="width: 930.6px;height: 175px;margin: 9px;">
                            <div class="table-responsive">
                              <table class="table table-striped table table-bordered" >
                                    <thead class="table-dark" >
                                        <center> <tr>
                                            <th>Nombre y apellido</th>
                                            <th>tipo</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <?php
                                        echo"<tr><td>".$profe['NombreUsuario']."</td>";
                                        echo"<td>".$profe['Tipo']."</td>";    
                                        ?>
                                     </tr> 
                                         <?php 
                                            if ($nm>0)
                                            {
                                            do{
                                            ?><tr>
                                            <?php 
                                            echo"<td>".$alumnos['NombreUsuario']."</td>";
                                            echo"<td>".$alumnos['Tipo']."</td>";
                                            ?>
                                            <?php 
                                         }while($alumnos= mysqli_fetch_assoc($qalumnos)); 
                                        }else {
                                            echo"<tr><td colspan='4'>NO esta registrado a alumno </td></tr>";
                                           }
                                         ?></center> 
                                        <script>
                                            function preguntar()
                                            {
                                                eliminar=confirm("Seguro que quiere eliminar este curso")
                                               if (eliminar ){
                                                window.location.herf="crearclase.php?e="+valor;

                                                }
                                            }
                                        </script>
                                </table > 
                               
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>
<?php
}   
?>
   

