<?php
include('BD/conectar.php');
session_start();
if(isset($_SESSION['user'])){
    header("Location:inicio.php");
}
if (isset ($_REQUEST['u'])&& !empty($_REQUEST['u']))
{
    $u=$_REQUEST['u'];
    $p=$_REQUEST['p'];
    $buscar="SELECT * FROM usuario WHERE Usuario='$u' AND Password='$p'";
    $siesta= mysqli_num_rows(mysqli_query($con,$buscar));
    if ($siesta==1){
        $_SESSION['user']=$u;
        header("Location:inicio.php");
    }
    echo "<script> alert('ERROR, usuario o contraseña incorrecta')</script>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>

</head>
<body>
      <div class="container">
        <div class="box form-box">
            <header>Inicio de sesión</header>
            <form action="" method="post">
                <div class="field input">
                    <label>Usuario</label>
                    <input type="text" name="u"autocomplete="off" required>
                </div>

                <div class="field input">
                    <label >Contraseña</label>
                    <input type="password" name="p" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Acceder" required>
                </div>
                <div class="links">
                ¿No cuenta con una cuenta? <a href="RegistrarU.php">Registrate</a> 
                </div>
            </form>
        </div>  
      </div>
</body>
</html>