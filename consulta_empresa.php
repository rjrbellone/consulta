<?php
include("conecta.php");
$connect=conectarse();
$sql = "SELECT  emp.ID_EMPRESA, emp.NOMBRE_EMPRESA, emp.ID_GRUPO,loc.NOMBRE_LOCAL, loc.VAL1,LOC.AUX2
	from [BI_PYXIS].[dbo].[BP_EMPRESA] emp
	inner join [BI_PYXIS].[dbo].[BP_LOCAL] loc on emp.ID_EMPRESA = loc.ID_EMPRESA
	and loc.ESTADO = 1
	order by 2";
    $result = odbc_exec($connect, $sql);
    $json_array = array();
    while($row = odbc_fetch_array($result)){
        $json_array[] = $row;
    }
    print_r(json_encode($json_array));
    // print_r( $json_array);
?>
