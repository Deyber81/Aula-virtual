<?php

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

?>


<div id="wrapper">
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-book-reader"></i></div>
            <div class="sidebar-brand-text mx-3"><span>mi Educa</span></div>
                </a>
                <hr class="sidebar-divider my-0"><a href="incio.php"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                <hr class="sidebar-divider my-0">
                <?php include ('Barra.php');?>
                    <hr class="sidebar-divider my-0">
                    <!--Docente-->
                    <?php
                    if($B['Tipo']=='profe'){
                        ?>
                    <li class="nav-item"><a class="nav-link active" href="crearclase.php"><i class="fas fa-book"></i><span>Crear un Curso</span></a></li>
                    <hr class="sidebar-divider my-0">
                     <!-- Alumno-->
                     <?php
                      }
                      ?>
                      <?php
                     if($B['Tipo']=='alumno'){
                     ?>
                     <li class="nav-item"><a class="nav-link active" href="unirseclase.php"><i class="fas fa-book"></i><span> Unirse un curso&nbsp;&nbsp;</span></a></li>
                    <hr class="sidebar-divider my-0">
                    <?php 
                    }?>
                    <li class="nav-item"><a class="nav-link" href="miembros.php"><i class="fas fa-user-friends"></i><span>Miembros de clase</span></a></li>
                    <hr class="sidebar-divider my-0">
                    <li class="nav-item"><a class="nav-link" href="tareas.php"><i class="far fa-list-alt"></i><span>Tareas</span></a></li>
                    <hr class="sidebar-divider my-0">
                    <li class="nav-item"><a class="nav-link" href="tareasalum.php"><i class="far fa-calendar"></i><span>Gestios de tareas</span></a></li>
                    <hr class="sidebar-divider my-0">
      
                     </ul>
</div>
 </nav>
 