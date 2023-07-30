
<?php
include('BD/conectar.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}   
function random_password()  
{  
  $longitud = 8;   
  $pass = substr(md5(rand()),0,$longitud);  
  return($pass);   
}  

$busc="SELECT * FROM clase WHERE Usuario='".$_SESSION['user']."'";
$cone=mysqli_query($con,$busc);
$x=mysqli_num_rows($cone);
$a=mysqli_fetch_assoc($cone);
$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'")));

?>  
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
<?php include ('includes/menu.php')
 ?>
<?php include ('includes/arriba.php') ?>

<div class="container"><span style="font-size: 32px;">Crear un nuevo curso</span></div>
<form action="crearclase.php" method="post">
                <div class="container">
                <?php
                if (isset ($_REQUEST['clase'])&& !empty($_REQUEST['clase'])){
                    $c=$_REQUEST['clase'];
                    $co=random_password() ;
                    $u=$_SESSION['user'];
                    $insertar="INSERT INTO clase VALUES (null,'$c','$co','$u',null)";
                    $comparar="SELECT * FROM clase WHERE nombre='$c'";
                    $checar=mysqli_num_rows(mysqli_query($con,$comparar));
            if ($checar==1){
             ?>
                <div class="alert alert-danger" role="alert">
                Ya hay una clase con ese nombre
                </div> <?php
            }else 
            {
            $checar=mysqli_query($con,$insertar);
            ?>
            <div class="alert alert-success" role="alert">
             Clase Creada Correctamente
                </div>
                <?php
                }
            }
                ?>
                    <input type="text" name="clase" style="width: 223.6px;height: 36px;margin: 8px;">
                    <button class="btn btn-primary" type="submit" style="width: 124.875px;margin: 22px;">Crear curso</button></div>
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
                        <div class="col-md-12" style="width: 1200.6px;height: 175px;margin: 9px;">
                            <div class="table-responsive">
                                <table class="table table-striped table table-bordered" center>
                                    <thead class="table-dark" >
                                        <tr>
                                            <th>Nombre de la Clase</th>
                                            <th>Clave de la Clase</th>
                                            <th>Fecha de Creacion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                        <?php
                                        if($x>0){
                                            do{
                                                echo"<tr><td>".$a['nombre']."</td>";
                                                echo"<td>".$a['clave']."</td>";
                                                echo"<td>".$a['fecha']."</td>";
                                               echo"<td><a class='btn btn-danger' href='crearclase.php?e=".$a['idclase']."'>Eliminar</a>
                                               <a class='btn btn-primary' href='material.php?clave=".$a['clave']."'>Ver material</a>
                                               <a class='btn btn-info' href='tareas.php?clave=".$a['clave']."'>Ver tareas</a>
                                               </td>"; 
                                            }while($a=mysqli_fetch_assoc($cone));
                                            echo"<tr><td colspan='4'>Total de clases ".$x."</td></tr>";
                                        }else {
                                            echo"<tr><td colspan='4'>No hay clases</td></tr>";
                                        }
                                        ?>
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
