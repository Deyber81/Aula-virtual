<script>
    function CambiarClase(targ,selObj, restore){
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if(restore)selObj.selectedIndex=0;
    }
</script>
<?php
if($B['Tipo']=='alumno') {
$menusalto=mysqli_query($con,("SELECT * FROM misclases, clase WHERE misclases.clave=clase.clave AND misclases.usuario='".$_SESSION['user']."'"));
$ams=mysqli_fetch_assoc($menusalto);
$x=mysqli_num_rows($menusalto);
}else{
$menusalto=mysqli_query($con,(" SELECT * FROM  clase WHERE usuario='".$_SESSION['user']."'"));
$ams=mysqli_fetch_assoc($menusalto);
$x=mysqli_num_rows($menusalto);
}
if ($x>0)
{
?>

<from form method="post">
<select name="cambiarclase" class="form-select" <?php echo "onChange='CambiarClase(\"parent\",this,1)'"?>>
<option value="" >selecionar clase</option>
<?php

do{
    ?>
    <option <?php echo "value='inicio.php?clave=".$ams['clave']."'>".$ams['nombre']."</option>";?>
     <?php
}while($ams=mysqli_fetch_assoc($menusalto));{
}
echo"</from></select>"
?>
<?php
 }else {
  echo"<tr><td colspan='4'>NO esta registrado a algun </td></tr>";
 }
 ?>
