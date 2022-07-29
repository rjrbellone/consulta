<?php include "plansuper.php"; ?>

<?php
$connect = conectarse();
$sql = "SELECT  emp.ID_EMPRESA, emp.NOMBRE_EMPRESA, emp.ID_GRUPO,loc.NOMBRE_LOCAL, loc.VAL1,LOC.AUX2
	from [BI_PYXIS].[dbo].[BP_EMPRESA] emp
	inner join [BI_PYXIS].[dbo].[BP_LOCAL] loc on emp.ID_EMPRESA = loc.ID_EMPRESA
	and loc.ESTADO = 1
	order by 2";
$result = odbc_exec($connect, $sql);
$json_array = [];
while ($row = odbc_fetch_array($result)) {
  $json_array[] = $row;
}

$x = json_encode($json_array);

/* print_r(json_encode($json_array)); */

// print_r( $json_array); v2
?>

<?php
$connect = conectarse();
$sql2 = "SELECT  * from [dbo].[BP_EMPLEADOS]";
$result = odbc_exec($connect, $sql2);
$json_array2 = [];
while ($row = odbc_fetch_array($result)) {
  $json_array2[] = $row;
}

$allEmployee = json_encode($json_array2);

/* print_r(json_encode($json_array2)); */
?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="col-md-12" style="display:flex; width: 100%; justify-content:space-between; padding:0.7rem">
                        <h3>Formulario Personal</h3>
                        <h3 class="crud-title">Estado del Formulario: Agregar Personal</h3>
                        <button class="btn btn-primary">Descargar txt</button>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-hover table-bordered table-striped crud-table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="bg-primary">Datos del Trabajador</th>
                                    <th colspan="8" class="bg-primary">Datos de Transferencia</th>
                                </tr>
                                <tr>
                                    <th>Empresa</th>
                                    <th>Centro de Costos</th>
                                    <th>Rut</th>
                                    <th>Nombre Completo</th>
                                    <th>Rut</th>
                                    <th>Nombre Completo</th>
                                    <th>Banco</th>
                                    <th>Tipo Cuenta</th>
                                    <th>Nº Cuenta</th>
                                    <th>Correo</th>
                                    <th colspan="2" class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <!-- //# agregar required y validation -->
                            <form action="formulario_insertar.php" id="form" method="POST" class="crud-form">
                                <tr>
                                    <td>
                                        <select class="form-select" style="width:100%" id="select-company" aria-label="Select Empresa" name="company"  required></select>
                                    </td>
                                    <td>
                                        <select class="form-select" style="width:100%" id="select-cost-center" aria-label="Select Centro de Costo" name="costCenter"  required></select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" title="El formato valido es XXXXXXXX-X" pattern="^[0-9]+[-|‐]{1}[0-9kK]{1}" id="rut" name="rut" placeholder="XXXXXXXX-X" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Juanito Perez" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="El Nombre Completo sólo acepta letras y espacios en blanco" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" pattern="^[0-9]+[-|‐]{1}[0-9kK]{1}" id="transferRut" name="transferRut" placeholder="XXXXXXXX-X" title="El formato valido es XXXXXXXX-X" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="transferFullName" name="transferFullName" placeholder="Juanito Perez" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="El Nombre Completo sólo acepta letras y espacios en blanco" required>
                                    </td>
                                    <td>
                                        <select class="form-select" style="width:100%" id="select-bank" aria-label="label select Banco" name="bank"  required>
                                            <option value="BANCOESTADO">BANCOESTADO</option>
                                            <option value="MERCADO PAGO">MERCADO PAGO</option>
                                            <option value="TAPP CAJA LOS ANDES">TAPP CAJA LOS ANDES</option>
                                            <option value="PREPAGO TENPO">PREPAGO TENPO</option>
                                            <option value="PREPAGO LOS HEROES">PREPAGO LOS HEROES</option>
                                            <option value="COOPEUCH">COOPEUCH</option>
                                            <option value="BANCO BBVA">BANCO BBVA</option>
                                            <option value="BANCO CONSORCIO">BANCO CONSORCIO</option>
                                            <option value="BANCO RIPLEY">BANCO RIPLEY</option>
                                            <option value="BANCO FALABELLA">BANCO FALABELLA</option>
                                            <option value="BANCO SECURITY">BANCO SECURITY</option>
                                            <option value="MUFG BANK LTD">MUFG BANK LTD</option>
                                            <option value="BANCO ITAU">BANCO ITAU</option>
                                            <option value="BANCO SANTANDER">BANCO SANTANDER</option>
                                            <option value="HSBC BANK CHILE">HSBC BANK CHILE</option>
                                            <option value="BICE">BICE</option>
                                            <option value="CORP-BANCA">CORP-BANCA</option>
                                            <option value="BANCO DE CREDITO E INVERSIONES">BANCO DE CREDITO E INVERSIONES</option>
                                            <option value="SCOTIABANK-DESARROLLO">SCOTIABANK-DESARROLLO</option>
                                            <option value="BANCO INTERNACIONAL">BANCO INTERNACIONAL</option>
                                            <option value="BANCO DE CHILE-EDWARDS-CREDICHILE">BANCO DE CHILE-EDWARDS-CREDICHILE</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" style="width:100%" id="select-account-type" aria-label="label select Tipo de Cuenta" name="accountType"  required>
                                            <option value="Cuenta Corriente">Cuenta Corriente</option>
                                            <option value="Cuenta Vista">Cuenta Vista</option>
                                            <option value="Cuenta de Ahorro ">Cuenta de Ahorro</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="1324131" name="accountNumber" title="Numero de cuenta solo acepta numeros" required>
                                    </td>
                                    <td>
                                        <input type="email" class="form-control" id="email" name="email" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" placeholder="lmarcelo@grupolosrobles.com" required>
                                    </td>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary" style="width:100%" value="Enviar" required>
                                        <input type="hidden" name="id">
                                        <input type="hidden" name="act">
                                    </td>
                                </tr>
                            </form>
                            <tbody></tbody>
                        </table>
                    </div>
                    <template id="crud-template">
                        <tr>
                            <td class="company"></td>
                            <td class="costCenter"></td>
                            <td class="rut"></td>
                            <td class="fullName"></td>
                            <td class="transferRut"></td>
                            <td class="transferFullName"></td>
                            <td class="bank"></td>
                            <td class="accountType"></td>
                            <td class="accountNumber"></td>
                            <td class="email"></td>
                            <td>
                                <button class="btn btn-success edit">Editar</button>
                            </td>
                            <td>
                                <a class="btn btn-danger delete">Eliminar</a>
                            </td>
                        </tr>
                    </template>
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2022 <a href="https://grupolosrobles.com" target="_blank">GrupoLosRobles</a>.</strong> All rights
    reserved.
</footer>

<script>
    const d = document;
    const $selectCompany = d.getElementById(`select-company`);
    const $selectCostCenter = d.getElementById(`select-cost-center`);

    const allEmployee = '<?php echo $allEmployee; ?>'
    const allEmployeeJSON = JSON.parse(allEmployee);


    // CRUD
    const $table = d.querySelector(".crud-table");
    const $form = d.querySelector(".crud-form");
    const $title = d.querySelector(".crud-title");
    const $template = d.getElementById("crud-template").content;
    const $fragment = d.createDocumentFragment();


    const getAll = async () => {




        allEmployeeJSON.forEach((el) => {
        $template.querySelector(".company").textContent = el.ID_EMPRESA;
        $template.querySelector(".costCenter").textContent = el.CENTRO_COSTO;
        $template.querySelector(".rut").textContent = el.RUT_EMPLEADO;
        $template.querySelector(".fullName").textContent = el.NOMBRE_EMPLEADO;
        $template.querySelector(".transferRut").textContent = el.RUT_CTA;
        $template.querySelector(".transferFullName").textContent =
          el.NOMBRE_CTA;
        $template.querySelector(".bank").textContent = el.BANCO;
        $template.querySelector(".accountType").textContent = el.TIPO_CTA;
        $template.querySelector(".accountNumber").textContent = el.N_CTA;
        $template.querySelector(".email").textContent = el.CORREO_CTA;
        $template.querySelector(".edit").dataset.id = el.ID;
        $template.querySelector(".edit").dataset.company = el.ID_EMPRESA;
        $template.querySelector(".edit").dataset.costCenter = el.CENTRO_COSTO;
        $template.querySelector(".edit").dataset.rut = el.RUT_EMPLEADO;
        $template.querySelector(".edit").dataset.fullName = el.NOMBRE_EMPLEADO;
        $template.querySelector(".edit").dataset.transferRut = el.RUT_CTA;
        $template.querySelector(".edit").dataset.transferFullName =
          el.NOMBRE_CTA;
        $template.querySelector(".edit").dataset.bank = el.BANCO;
        $template.querySelector(".edit").dataset.accountType = el.TIPO_CTA;
        $template.querySelector(".edit").dataset.accountNumber = el.N_CTA;
        $template.querySelector(".edit").dataset.email = el.CORREO_CTA;
        $template.querySelector(".delete").href = `http://localhost/pyxis/formulario_insertar.php?id=${el.ID}&act=delete`;
        let $clone = d.importNode($template, true);

        $fragment.appendChild($clone);
      });

      $table.querySelector("tbody").appendChild($fragment);

};

    // COST CENTER FILTER

    const data = '<?php echo $x; ?>'
    const json = JSON.parse(data)
    console.log(json)
    const EMPRESAS = ["Alimentos Dulce Luna SPA", "Brival SPA", "Brunella SPA", "Comercial & Gastronomica SPA", "Dulcinea SA", "El Deseo SPA", "Kansai Chile SPA", "Mercado Kennedy SPA", "Soc. Comercial Grupo Yes", "Tanta SPA", "Utopiko SPA"]
    const alimentosDulceLunaSPA = json.filter((el) => el.NOMBRE_EMPRESA === "Alimentos Dulce Luna SPA")
    const brivalSPA = json.filter((el) => el.NOMBRE_EMPRESA === "Brival SPA")
    const brunellaSPA = json.filter((el) => el.NOMBRE_EMPRESA === "Brunella SPA")
    const comercialGastronomicaSPA = json.filter((el) => el.NOMBRE_EMPRESA === "Comercial & Gastronomica SPA")
    const dulcineaSA = json.filter((el) => el.NOMBRE_EMPRESA === "Dulcinea SA")
    const elDeseoSPA = json.filter((el) => el.NOMBRE_EMPRESA === "El Deseo SPA")
    const kansaiChileSPA = json.filter((el) => el.NOMBRE_EMPRESA === "Kansai Chile SPA")
    const mercadoKennedySPA = json.filter((el) => el.NOMBRE_EMPRESA === "Mercado Kennedy SPA")
    const socComercialGrupoYes = json.filter((el) => el.NOMBRE_EMPRESA === "Soc. Comercial Grupo Yes")
    const tantaSPA = json.filter((el) => el.NOMBRE_EMPRESA === "Tanta SPA")
    const utopikoSPA = json.filter((el) => el.NOMBRE_EMPRESA === "Utopiko SPA")
    const final = {
        "Alimentos Dulce Luna SPA":alimentosDulceLunaSPA,
        "Brival SPA":brivalSPA,
        "Brunella SPA":brunellaSPA,
        "Comercial & Gastronomica SPA":comercialGastronomicaSPA,
        "Dulcinea SA":dulcineaSA,
        "El Deseo SPA":elDeseoSPA,
        "Kansai Chile SPA":kansaiChileSPA,
        "Mercado Kennedy SPA":mercadoKennedySPA,
        "Soc. Comercial Grupo Yes":socComercialGrupoYes,
        "Tanta SPA":tantaSPA,
        "Utopiko SPA":utopikoSPA,
    }

    function loadCompanies() {
        let $options = `<option value="">Elige Empresa</option>`;
        EMPRESAS.forEach((company) => $options += `<option value="${company}">${company}</option>`)
        $selectCompany.innerHTML = $options;
    };

    function loadCostCenters(companySelected) {
        if (companySelected === "") {
            let $options = ``;
            $selectCostCenter.innerHTML = $options;
        }
        let $options = ``;
        final[companySelected].forEach((el) => $options += `<option value="${el.NOMBRE_LOCAL}">${el.NOMBRE_LOCAL}</option>`)
        $selectCostCenter.innerHTML = $options;
    };

    d.addEventListener("click", async (e) => {
      if (e.target.matches(".edit")) {
        let $options = ``;
        final[e.target.dataset.company].forEach((el) => $options += `<option value="${el.NOMBRE_LOCAL}">${el.NOMBRE_LOCAL}</option>`)
        $selectCostCenter.innerHTML = $options;
        $title.textContent = "Estado del Formulario: Editar Personal";
        $form.act.value = "update";
        $form.id.value = e.target.dataset.id;
        $form.company.value = e.target.dataset.company;
        $form.costCenter.value = e.target.dataset.costCenter;
        $form.rut.value = e.target.dataset.rut;
        $form.fullName.value = e.target.dataset.fullName;
        $form.transferRut.value = e.target.dataset.transferRut;
        $form.transferFullName.value = e.target.dataset.transferFullName;
        $form.bank.value = e.target.dataset.bank;
        $form.accountType.value = e.target.dataset.accountType;
        $form.accountNumber.value = e.target.dataset.accountNumber;
        $form.email.value = e.target.dataset.email;
      }




    })

    d.addEventListener("DOMContentLoaded", loadCompanies);
    d.addEventListener("DOMContentLoaded", getAll);
    $selectCompany.addEventListener("change", e => loadCostCenters(e.target.value));



</script>

<div class="control-sidebar-bg"></div>

<!-- My Script Leandro Marcelo -->
<script src="./formulario4.js"></script>

<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></sc>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- jQuery 3 -->
<!--script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!--script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker >
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker >
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker >
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstra time picker -->
<!--script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<!--script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<!--script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!--script src="dist/js/adminlte.min.js"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 31, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(31, 'days'),
        endDate  : moment()
      },
      function (start, end) {
		  $("#fechaIni").val(start.format('YYYY/MM/DD'));
		  $("#fechaFin").val(end.format('YYYY/MM/DD'));
		  $("#btnSendFormDates").click();
		  $('#daterange-btn span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: true
    })
  })
</script>
<!-- page script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [


		//<?php
//$consulta4="select loc.nombre_local as nombre_local
//			from BP_VENTAS_CAB as vta
//		inner join bp_local as loc on LOC.VAL1='$v_id_grupo' AND loc.id_local = vta.ID_LOCAL
//	where vta.FECHA_CIERRE BETWEEN '$fechaIni' AND  '$fechaFin' AND VTA.ID_GRUPO='$v_id_grupo'
//group by loc.NOMBRE_LOCAL ";
//			if (( $res4=odbc_exec($link, $consulta4)) === false);
//		while ( $registros = odbc_fetch_row($res4)){
//		$barra=$registros["nombre_local"];
//	foreach ($barra as $item)
//				{
//
?>
//

      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
  //      label    : parseInt(<?php echo json_encode($item); ?>)
	  },
	//  <?php
//		}}
//
?>
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
	<?php if (isset($_POST["fechaIni"]) && isset($_POST["fechaFin"])) { ?>
	<script>
		$('#daterange-btn span').html('<?php echo $_POST[
    "fechaIni"
  ]; ?>' + ' - ' + '<?php echo $_POST["fechaFin"]; ?>');
	</script>
	<?php } ?>
	<div style="display: none;">
		<form name="frmDates" method="post" action="home.php">
			<input name="fechaIni" id="fechaIni" value=""/>
			<input name="fechaFin" id="fechaFin" value=""/>
			<input type="submit" id="btnSendFormDates" value="btnSendFormDates"/>
		</form>
	</div>
	<script type="text/javascript">
                     $(function () {
                         $('.preloader, .black-screen').fadeOut('fast');
                     });
    </script>
</body>
</html>
