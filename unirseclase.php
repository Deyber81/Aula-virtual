<?php
include('BD/conectar.php');
session_start();
$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'")));
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}   
if (isset ($_REQUEST['e'])){
    $e=$_REQUEST['e'];
    $eliminar=mysqli_query($con,("DELETE FROM misclases WHERE idmiclase='$e'"));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unirse a clases</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
<?php include ('includes/menu.php')
 ?>
<?php include ('includes/arriba.php') ?>
<div class="container"><span style="font-size: 32px;">Crear un nuevo curso</span></div>
<form action="unirseclase.php" method="post" enctype="multipart/form-data">
                <div class="container">
                <?php
               if(isset($_REQUEST['clave'])){
                $u=$_SESSION['user'];
                $c=$_REQUEST['clave'];
                $verificar=mysqli_num_rows(mysqli_query($con,("SELECT * FROM clase WHERE clave='".$_REQUEST['clave']."'")));
               if($verificar>0) {
                    $pre="SELECT * FROM misclases WHERE clave='".$_REQUEST['clave']."' AND usuario='".$_SESSION['user']."'";
                    $pre2=mysqli_num_rows(mysqli_query($con,$pre));
                    if ($pre2==1){
                        echo "<div class='alert alert-danger' role='alert'>
                        Ya esta registrado en este curso
                        </div> ";
                    }
                    else{
                        mysqli_query($con,("INSERT INTO misclases VALUES (NULL,'$u','$c')"));
                        echo " <div class='alert alert-success' role='alert'>
                        Se registro en el curso correctamente
                           </div>"; 
                }
                }
                else {
                    echo "<div class='alert alert-danger' role='alert'>
                    El curso ingresado no existe
                    </div> ";
                }
            }
                ?>
                    <input type="text" name="clave" style="width: 223.6px;height: 36px;margin: 8px;">
                    <button class="btn btn-primary" type="submit" style="width: 124.875px;margin: 22px;">Unirse</button></div>
                <div class="container">
                </form>
                <form>
                <?php
               if (isset ($_REQUEST['e'])){
                $e=$_REQUEST['e'];
                $eliminar=mysqli_query($con,("DELETE FROM misclases WHERE idmiclase='$e'"));
                echo " <div class='alert alert-success' role='alert'>
                Se registro en el curso correctamente
                   </div>";
                 }
                ?>
                    <div class="row">
                        <div class="col-md-12" style="width: 1200.6px;height: 175px;margin: 9px;">
                            <div class="table-responsive">
                                <table class="table table-striped table table-bordered" >
                                    <thead class="table-dark" >
                                        <tr>
                                            <th>Nombre de la Clase</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                        <?php
                                        $m="SELECT clase.nombre, misclases.idmiclase, clase.clave FROM clase, misclases WHERE clase.clave=misclases.clave  AND misclases.usuario='".$_SESSION['user']."'";
                                        $cox=mysqli_query($con,$m);
                                        $n=mysqli_num_rows($cox);
                                        $a=mysqli_fetch_assoc($cox);
                                        if($n>0){
                                            do{
                                                echo"<tr><td>".$a['nombre']."</td>";
                                               echo"<td><a class='btn btn-danger' href='unirseclase.php?e=".$a['idmiclase']."'>Salir</a>
                                               <a class='btn btn-primary' href='material.php?clave=".$a['clave']."'>Ver Material</a>
                                               <a class='btn btn-info' href='tareas.php?clave=".$a['clave']."'>Ver tareas</a>
                                               </td>"; 
                                            }while($a=mysqli_fetch_assoc($cox));
                                            echo"<tr><td colspan='2'>Total de clases ".$n."</td></tr>";
                                        }else {
                                            echo"<tr><td colspan='2'>No hay clases</td></tr>";
                                        }
                                        ?>
                                </table>
                                
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