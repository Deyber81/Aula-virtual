<?php 
include('BD/conectar.php');
 if (isset ($_REQUEST['nomape'])&& !empty($_REQUEST['nomape'])){
$no=$_REQUEST['nomape'];
$u=$_REQUEST['user'];
$p=$_REQUEST['password'];
$t=$_REQUEST['tipo'];
$checar=mysqli_num_rows(mysqli_query($con,("SELECT * FROM usuario WHERE Usuario='$u'")));
if ($checar==1){
    ?>
   <div class="alert alert-warning" role="alert">
  A simple warning alert—check it out!
</div>
   <?php
}else 
 {
$checar=mysqli_query($con,("INSERT INTO usuario VALUES (NULL,'$u','$no','$t','$p')"));
echo "<script> alert('Registro exitoso');</script>";
header("Location:index.php");
}
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" href="css/sb-admin-2.min.css" >
    <title>registrarse</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <header>Registrate</header>
            <form action="" method="post">
                

                <div class="field input">
                    <label >Nombre y apellido</label>
                    <input type="text" name="nomape" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label>Nombre de Usuario</label>
                    <input type="text" name="user"  autocomplete="off" required>
                </div>
                    <div class="field input">
                    <label >contraseña</label>
                    <input type="password" name="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label>tipo</label>
                    <select name="tipo" id="tipo">
                        <option value="profe">Porfesor</option>
                        <option value="alumno">Alumno</option>
                    </select> 
                    
                </div>
                <div class="field"> 
                    <input type="submit" class="btn" name="submit" value="Registrarse" required>
                </div>
                <div class="links">
                    <a href="index.php">Volver</a>
                </div>
            </form>
        </div>
      </div>
</body>
</html>