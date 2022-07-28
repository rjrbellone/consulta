<?php
include("conecta.php");
$link=conectarse();
//
// echo "company: $company";
// echo "<br>";
// echo "costCenter: $costCenter";
// echo "<br>";
// echo "rut: $rut";
// echo "<br>";
// echo "fullName: $fullName";
// echo "<br>";
// echo "transferRut: $transferRut";
// echo "<br>";
// echo "transferFullName: $transferFullName";
// echo "<br>";
// echo "bank: $bank";
// echo "<br>";
// echo "accountType: $accountType";
// echo "<br>";
// echo "accountNumber: $accountNumber";
// echo "<br>";
// echo "email: $email";
// echo "<br>";
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
$sql="INSERT INTO [dbo].[BP_EMPLEADOS] (
	ID_EMPRESA,
	CENTRO_COSTO,
	RUT_EMPLEADO,
	NOMBRE_EMPLEADO,
	RUT_CTA,
  NOMBRE_CTA,
	BANCO,
	TIPO_CTA,
	N_CTA,
	CORREO_CTA)
  VALUES ('$company',  '$costCenter',  '$rut',  '$fullName',  '$transferRut',  '$transferFullName',  '$bank',  '$accountType',  '$accountNumber',  '$email')";


$res = odbc_exec($link, $sql);
if (!$res) {
print("Error agregando nueva Cuenta :c");
print(odbc_error($link).": ".odbc_errormsg($link)."\n");
} else {
$number_of_rows = odbc_num_rows($res);
}
    header("Location: formulario_personal.php");
?>
<!-- <script>location.href='formulario_personal.php';</script> -->
