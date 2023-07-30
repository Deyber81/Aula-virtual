<?php 
include('BD/conectar.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}
$consul="SELECT * FROM usuario WHERE Usuario='".$_SESSION['user']."'";
$user=mysqli_query($con,$consul);
$a=mysqli_fetch_assoc( $user);
if (isset($_REQUEST['cerrar'])){
    session_destroy();
    header("Location:index.php");
}
if (isset ($_REQUEST['user'])&& !empty($_REQUEST['user'])){
    $u=$_REQUEST['user'];
    $p=$_REQUEST['password'];
    $n=$_REQUEST['NombreApellido'];
    $Edit="UPDATE usuario set Usuario='$u',NombreUsuario='$n' ,Password='$p' WHERE Usuario='".$_SESSION['user']."'";
    mysqli_query($con,$Edit);header("Location:editarU.php");
}
$B=mysqli_fetch_assoc(mysqli_query($con,("SELECT * FROM usuario ")));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
<?php include ('includes/menu.php')?>
<?php include ('includes/arriba.php') ?>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1 style="color: var(--bs-indigo);font-size: 22.112px;">EDITAR PERFIL</h1>
          
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <form action="editarU.php" class="text-center" method="post" enctype="multipart/form-data">
                                <div class="mb-3"><input class="form-control" type="Usuario" name="user" value="<?php echo $a['Usuario']?>" placeholder="Usuario"></div>
                                <div class="mb-3"><input class="form-control" type="NombreApellido" name="NombreApellido" value="<?php echo $a['NombreUsuario']?>" placeholder="Nombres y Apellidos"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" value="<?php echo $a['Password']?>" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">EDITAR</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</body>
</html>