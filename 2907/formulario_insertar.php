<?php
include "conecta.php";
$link = conectarse();

// $company = $_POST["company"];
// $costCenter = $_POST["costCenter"];
// $rut = $_POST["rut"];
// $fullName = $_POST["fullName"];
// $transferRut = $_POST["transferRut"];
// $transferFullName = $_POST["transferFullName"];
// $bank = $_POST["bank"];
// $accountType = $_POST["accountType"];
// $accountNumber = $_POST["accountNumber"];
// $email = $_POST["email"];
$id = $_REQUEST["id"];
$act = $_REQUEST["act"];

// echo $company;
// echo "<br>";
// echo $id;
// echo "<br>";
// echo $act;


if ($_REQUEST['act']=='update') {

              $company = $_POST["company"];
              $costCenter = $_POST["costCenter"];
              $rut = $_POST["rut"];
              $fullName = $_POST["fullName"];
              $transferRut = $_POST["transferRut"];
              $transferFullName = $_POST["transferFullName"];
              $bank = $_POST["bank"];
              $accountType = $_POST["accountType"];
              $accountNumber = $_POST["accountNumber"];
              $email = $_POST["email"];
              $id = $_REQUEST["id"];
              $act = $_REQUEST["act"];


                 $sql = " UPDATE [dbo].[BP_EMPLEADOS]
						              SET ID_EMPRESA='$company',CENTRO_COSTO='$costCenter',RUT_EMPLEADO='$rut',NOMBRE_EMPLEADO='$fullName',RUT_CTA='$transferRut',NOMBRE_CTA='$transferFullName',BANCO='$bank',TIPO_CTA='$accountType',N_CTA='$accountNumber',CORREO_CTA='$email'
                          WHERE ID= '$id'";
				  $res = odbc_exec($link, $sql);
				  if (!$res) {
					print("Error Modificando usuario:\n");
					print(odbc_error($link).": ".odbc_errormsg($link)."\n");
				  } else {
          $number_of_rows = odbc_num_rows($res);
          header("Location:formulario_personal.php");
				  }
}
if ($_REQUEST['act']=='delete') {

      $sql = "DELETE FROM [dbo].[BP_EMPLEADOS] WHERE id = $id";
  $res = odbc_exec($link, $sql);
  if (!$res) {
  print("Error eliminando usuario:\n");
  print(odbc_error($link).": ".odbc_errormsg($link)."\n");
  } else {
  $number_of_rows = odbc_num_rows($res);
  header("Location:formulario_personal.php");
  }
}
if (!$id) {
  $company = $_POST["company"];
  $costCenter = $_POST["costCenter"];
  $rut = $_POST["rut"];
  $fullName = $_POST["fullName"];
  $transferRut = $_POST["transferRut"];
  $transferFullName = $_POST["transferFullName"];
  $bank = $_POST["bank"];
  $accountType = $_POST["accountType"];
  $accountNumber = $_POST["accountNumber"];
  $email = $_POST["email"];
  $id = $_REQUEST["id"];
  $act = $_REQUEST["act"];


  $sql = "INSERT INTO [dbo].[BP_EMPLEADOS] (ID_EMPRESA,CENTRO_COSTO,RUT_EMPLEADO,NOMBRE_EMPLEADO,RUT_CTA,NOMBRE_CTA,BANCO,TIPO_CTA,N_CTA,CORREO_CTA)
  VALUES ('$company',  '$costCenter',  '$rut',  '$fullName',  '$transferRut',  '$transferFullName',  '$bank',  '$accountType',  '$accountNumber',  '$email')";
  $res = odbc_exec($link, $sql);
  if (!$res) {
    print("Error agregando socio");
    print(odbc_error($link).": ".odbc_errormsg($link)."\n");
  } else {
    $number_of_rows = odbc_num_rows($res);
    header("Location:formulario_personal.php");
  }
}





 ?>
 <!-- <script>location.href='formulario_personal.php';</script> -->
