<?php
include('BD/conectar.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}   
if (isset ($_REQUEST['clave'])&& !empty($_REQUEST['clave'])){
    $_SESSION['clave']=$_REQUEST['clave'];
}
if (isset ($_REQUEST['tarea'])){
    $_SESSION['tarea']=$_REQUEST['tarea'];
}

if (isset ($_REQUEST['tema'])){
    $u=$_SESSION['user'];
    $c=$_SESSION['clave'];
    $t=$_REQUEST['tema'];
    $archivo=$_FILES['archivo']['name'];
    $id=$_SESSION['tarea'];
    $insertar="INSERT INTO mistareas VALUES (NULL,'$u','$c','$t',NULL,'$archivo','$id',NULL)";
    mysqli_query($con,$insertar);
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $carpeta_destino = "tareas/";
    move_uploaded_file($_FILES['archivo']['tmp_name'],$carpeta_destino.$archivo);
}
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    // Buscar el archivo en la base de datos
    $sql = "SELECT * FROM mistareas WHERE idmitarea = '$id'";
    $resultado = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $archivo = $fila['archivo'];
        $ruta_archivo = "tareas/" . $archivo;
    
        // Verificar que el archivo exista en el servidor
        if (file_exists($ruta_archivo)) {
            // Enviar el archivo al navegador
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $archivo . '"');
            readfile($ruta_archivo);
        } else {
            echo "El archivo no existe en el servidor.";
        }
    } else {
        echo "El archivo no se encontró en la base de datos.";
    }
    }
    if (isset ($_REQUEST['ea'])){
        $e=$_REQUEST['ea'];
        $delete="DELETE FROM mistareas WHERE idmitarea='$e'";
        $eliminar=mysqli_query($con,$delete);
    }
if (isset($_REQUEST['idmitarea'])&& !isset($_REQUEST['idmitarea']) &&  isset($_REQUEST['cal'])&& !isset($_REQUEST['cal']))
{   $not=$_REQUEST['cal'];
    $id=$_REQUEST['idmtarea'];
mysqli_query($con,("UPDATE mistareas SET nota='$not' WHERE  mistareas.idmitarea='$id'"));
}
$tarea=mysqli_query($con,("SELECT * FROM tareas WHERE idtarea='".$_SESSION['tarea']."'"));
$arraytarea=mysqli_fetch_assoc($tarea);
$nt=mysqli_num_rows($tarea);
$tareas=mysqli_query($con,("SELECT * FROM mistareas WHERE idtarea='".$_SESSION['tarea']."' && clave='".$_SESSION['clave']."' && Usuario='".$_SESSION['user']."'"));
$arraytareas=mysqli_fetch_assoc($tareas);
$nts=mysqli_num_rows($tareas);
$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'")));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregar Tareas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
<?php include ('includes/menu.php')?>
<?php include ('includes/arriba.php') ;
if($B['Tipo']=='alumno'){
?>
                        <div class="card mb-5">
                            <div class="card-body p-sm-5">
                             <h1 class="text-center mb-4">Entregar Tarea</h1>
                             <?php 
                             if($nts==0){
                             ?>
                             <?php echo "<h3  class='text-center mb-4'>".$arraytarea['titulo']."</h3>" ?>
                             <form action="entregatarea.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3"><input  class="form-control" type="text" name="tema" placeholder="comentario sobre la tarea" required></div>
                            <input class="form-control" type="file" name="archivo" value="<?php if (isset ($_REQUEST['ma'])){ echo $mpal['archivo'] ;} ?>"><br>
                            <input type="hidden" name="archivoa" value= "<?php if (isset ($_REQUEST['ma'])){ echo $mpal['archivo'] ;} ?>">
                            <input class="btn btn-primary d-block w-100" type ="submit" <?php if (isset ($_REQUEST['ma']))  {echo "value='Editar'";}else { echo "value='Agregar'";}?>><br>
                            </from>
                            <?php 
                           } else {
                            echo"<article  style='border-style: solid;border-color:rgb(1,1,1);'>";
                            ?>
                            <?php
                            echo "<h3  class='text-center mb-4'>".$arraytarea['titulo']."</h3>";
                            echo"<p> Comentario : ".$arraytareas['comentario']."</p>";
                            echo"<p>Archivo de clase : ".$arraytareas['archivo']."</p>";
                            echo"<td><a class='btn btn-primary' href='entregatarea.php?id=".$arraytareas['idmitarea']."'>Descargar tarea</a> </td></tr>";
                            echo"<td><a class='btn btn-danger' href='entregatarea.php?ea=".$arraytareas['idmitarea']."'>Eliminar tarea</a> </td></tr>";
                            echo "</article> ";
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php
                      }
                      ?>
                      <?php
                     if($B['Tipo']=='profe'){
$tareas=mysqli_query($con,("SELECT * FROM mistareas, usuario WHERE usuario.usuario=mistareas.usuario AND idtarea='".$_SESSION['tarea']."' && clave='".$_SESSION['clave']."'"));
$arraytareas=mysqli_fetch_assoc($tareas);
$nts=mysqli_num_rows($tareas);
    ?>
<div class="row">
 <div class="col-md-15" style="width: 1200.6px;height: 175px;margin: 9px;">
<div class="table-responsive">
<table class="table table-striped table table-bordered" center>
<thead class="table-dark" >
 
<tr>
<th>Alumno</th>
<th>Comentario</th>
<th>fecha</th>
<th>archivo</th>
<th>descargar</th>
 </tr>
 </thead>
<tr>
 <?php
if ($nts>0)
{
do{
?><tr>
 <?php 
echo"<td>".$arraytareas['NombreUsuario']."</td>";
 echo"<td>".$arraytareas['comentario']."</td>";
echo"<td>".$arraytareas['fecha']."</td>";
echo"<td>".$arraytareas['archivo']."</td>";
echo"<td><a class='btn btn-primary' href='entregatarea.php?id=".$arraytareas['idmitarea']."'>Descargar tarea</a> </td></tr>";

}while($arraytareas=mysqli_fetch_assoc($tareas)); 
 }else {
echo"<tr><td colspan='5'>Nadie Subio las tareas </td></tr>";
}
?>
 </table >
 <script>
    function evaluar(targ,selObj, restore){
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if(restore)selObj.selectedIndex=0;
    }
</script>
<?php
}
?>

</body>
</html>