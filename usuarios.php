<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$conexion = new mysqli("localhost", "root", "L34ndr0.040", "mydb") or die("Problemas de conexion");

$query = mysqli_query($conexion, "insert into users (nombre,apellido,dni) values ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[dni]')") or die("No se pudo crear el usuario" .mysqli_error($conexion));

$id_user_inset = $conexion->insert_id;

if ($_REQUEST['telefono']!='' && $_REQUEST['email']!=''){
  $query =  mysqli_query($conexion, "insert into contacto (telefono,email) values ('$_REQUEST[telefono]','$_REQUEST[email]');") or die("No se pudo crear contacto");
  $id_contact_id = $conexion->insert_id;
  mysqli_query($conexion, "insert into users_contacto (users_id,contacto_id) values ($id_user_inset,$id_contact_id);") or die("No se pudo crear el usuario");
}
mysqli_close($conexion);


