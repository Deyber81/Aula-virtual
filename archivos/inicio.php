<br />
<b>Warning</b>:  readfile(archivos/): Failed to open stream: No such file or directory in <b>C:\xampp\htdocs\virtual\inicio.php</b> on line <b>67</b><br />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body>
        

<div id="wrapper">
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-book-reader"></i></div>
            <div class="sidebar-brand-text mx-3"><span>mi Educa</span></div>
                </a>
                <hr class="sidebar-divider my-0"><a href="incio.php"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                <hr class="sidebar-divider my-0">
                <script>
    function CambiarClase(targ,selObj, restore){
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if(restore)selObj.selectedIndex=0;
    }
</script>

<from form method="post">
<select name="cambiarclase" class="form-select" onChange='CambiarClase("parent",this,1)'>
<option value="" >selecionar clase</option>
    <option value='inicio.php?clave=be75428e'>Calculo</option>         <option value='inicio.php?clave=b2166252'>czxc</option>         <option value='inicio.php?clave=838d00fe'>POO</option>         <option value='inicio.php?clave=58044b17'>as</option>     </from></select>                    <hr class="sidebar-divider my-0">
                    <!--Docente-->
                                        <li class="nav-item"><a class="nav-link active" href="crearclase.php"><i class="fas fa-book"></i><span>Crear un Curso</span></a></li>
                    <hr class="sidebar-divider my-0">
                     <!-- Alumno-->
                                                               <li class="nav-item"><a class="nav-link" href="miembros.php"><i class="fas fa-user-friends"></i><span>Miembros de clase</span></a></li>
                    <hr class="sidebar-divider my-0">
                    <li class="nav-item"><a class="nav-link" href="material.php"><i class="far fa-list-alt"></i><span>Tareas</span></a></li>
                    <hr class="sidebar-divider my-0">
                    <li class="nav-item"><a class="nav-link" href="archivos.php"><i class="far fa-list-alt"></i><span>Gestion de archivos</span></a></li>
                    <hr class="sidebar-divider my-0">
                    <li class="nav-item"><a class="nav-link" href="archivos.php"><i class="far fa-list-alt"></i><span>Archivos de clase</span></a></li>
                    <hr class="sidebar-divider my-0">
                     </ul>
</div>
 </nav>
         <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><span class="d-none d-lg-inline me-2 text-gray-600 small" style="text-align: left;">BIENVENIDOS A MI EDUCA</span>
                   <a class="btn btn-primary" href="inicio.php?cerrar=1">Cerrar sesión</a></div>
                </nav>  
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
            
                    </body>

</html>        <section class="container">
   <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-5 col-xl-5 col-xxl-4 offset-lg-0">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h1 class="text-center mb-4">Crear nuevo material de clase</h1>
                            <form action="inicio.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3"><input  class="form-control" type="text" name="tema" 
                             placeholder="Tema de clase"  required></div>
                            <div class="mb-3"><textarea class="form-control" name="comentario" id="" cols="30" rows="10" placeholder="Comentario del material" required></textarea></div>
                            <input class="form-control" type="file" name="archivo" value=""><br>
                            <input type="hidden" name="archivoa" value= "">
                                                        <input class="btn btn-primary d-block w-100" type ="submit" value="generar" value='Agregar'><br>

                            </from>
                        </div>
                    </div>
                </div>
                <div class="col">
                <h1 class="text-center mb-4">Temas de clase</h1>
                   <article class=<br><h1>generacion</h1></br><p>12312312</p><p></p><td><a class='btn btn-danger' href='inicio.php?id=110'>descargar actividad</a> </td></tr><td><a class='btn btn-danger' href='inicio.php?ea=110'>eliminar actividad</a> </td></tr><td><a class='btn btn-warning' href='inicio.php?ma=110'>editar actividad</a> </td></tr><hr><article class=<br><h1>generacion</h1></br><p>12312312</p><p></p><td><a class='btn btn-danger' href='inicio.php?id=109'>descargar actividad</a> </td></tr><td><a class='btn btn-danger' href='inicio.php?ea=109'>eliminar actividad</a> </td></tr><td><a class='btn btn-warning' href='inicio.php?ma=109'>editar actividad</a> </td></tr><hr><article class=<br><h1>123123</h1></br><p>12312312</p><p>Resume_Button_32.png</p><td><a class='btn btn-danger' href='inicio.php?id=108'>descargar actividad</a> </td></tr><td><a class='btn btn-danger' href='inicio.php?ea=108'>eliminar actividad</a> </td></tr><td><a class='btn btn-warning' href='inicio.php?ma=108'>editar actividad</a> </td></tr><hr><tr><td colspan='4'>total de sus planes 3</td></tr>                </div>
            </div>
        </div>
    </section>
                        </section>
        

 
</body>
</html>