<?php
define("INC_PATH", "inc".DIRECTORY_SEPARATOR);
require_once "DataRequest.php";
$dashboard = new DataRequest;
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Multidados TI</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<!-- BEGIN JS SCRIPTS -->
<script type="text/javascript" src="js/dashboard.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<!--<script type="text/javascript" src="js/dataDashboard.js"></script>-->
<script>
$(document).ready(function() {
	var url = window.location.href.replace("#","");
	//console.log(url+'DataRequestCli.php')

	$("#viewClient").click(function(e) {
		e.preventDefault();
		
		$.ajax({
			url: url+'DataRequestCli.php',
			method: 'POST',
			dataType: 'json'
		}).done(function(result){
			
			$('#tableheader').empty();
			$('#tablebody').empty();
			$('#tablename').empty();
			$('#tablename').prepend('Clientes')
			$('#tableheader').prepend('<tr><th>#</th><th>Nome</th><th>CPF</th><th>Endereço</th><th>Telefone</th><th>E-mail</th></tr>');

			for(var i = (result.length - 1); i >= 0; i--){
				$('#tablebody').prepend('<tr><td>'+(i+1)+'</td><td>'+result[i].nome+'</td><td>'+result[i].cpf+'</td><td>'+result[i].endereco+'</td><td>'+result[i].telefone+'</td><td>'+result[i].email+'</td></tr>');
			}
		});
	});


	$("#viewUser").click(function(e) {
		e.preventDefault();
		
		$.ajax({
			url: url+'DataRequestUser.php',
			method: 'POST',
			dataType: 'json'
		}).done(function(result){
			
			$('#tableheader').empty();
			$('#tablebody').empty();
			$('#tablename').empty();
			$('#tablename').prepend('Usuários')
			$('#tableheader').prepend('<tr><th>#</th><th>Nome</th><th>CPF</th><th>Endereço</th><th>Telefone</th><th>Usuário</th></tr>');

			for(var i = (result.length - 1); i >= 0; i--){
				$('#tablebody').prepend('<tr><td>'+(i+1)+'</td><td>'+result[i].nome+'</td><td>'+result[i].cpf+'</td><td>'+result[i].endereco+'</td><td>'+result[i].telefone+'</td><td>'+result[i].usuario+'</td></tr>');
			}
		});
	});



	$("#viewProvider").click(function(e) {
		e.preventDefault();
		
		$.ajax({
			url: url+'DataRequestFor.php',
			method: 'POST',
			dataType: 'json'
		}).done(function(result){
			
			$('#tableheader').empty();
			$('#tablebody').empty();
			$('#tablename').empty();
			$('#tablename').prepend('Fornecedores')
			$('#tableheader').prepend('<tr><th>#</th><th>Nome</th><th>CPF</th><th>Cidade</th><th>E-mail</th></tr>');

			for(var i = (result.length - 1); i >= 0; i--){
				$('#tablebody').prepend('<tr><td>'+(i+1)+'</td><td>'+result[i].nome+'</td><td>'+result[i].cpf+'</td><td>'+result[i].cidade+'</td><td>'+result[i].email+'</td></tr>');
			}
		});
	});



});
</script>
<!-- END JS SCRIPTS -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN INCLUSION HEADER -->
<?php require_once INC_PATH."cabecalho.php"; ?>
<!-- END INCLUSION HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN INCLUSION SIDEBAR -->
	<?php require_once INC_PATH."menu.php";?>
	<!-- END INCLUSION SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Dashboard <small>tudo que você precisa à um click.</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span>
								</span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $dashboard->dadosClientes('c'); ?>
							</div>
							<div class="desc">
								 Clientes
							</div>
						</div>
						<a id="viewClient" class="more" href="#" onclick="dashboard('c')">
						Visualizar <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-group"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php echo $dashboard->dadosUsuarios('c'); ?>
							</div>
							<div class="desc">
								Usuários
							</div>
						</div>
						<a id="viewUser" class="more" href="#" onclick="dashboard('u')">
						Visualizar <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php echo $dashboard->dadosFornecedores('c'); ?>
							</div>
							<div class="desc">
								Fornecedores
							</div>
						</div>
						<a id="viewProvider" class="more" href="#" onclick="dashboard('f')">
						Visualizar <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<!--Tabela-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div id="tableColor" class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-folder-open"></i><span id="tablename">-</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-hover">
								<thead id="tableheader">
								
								</thead>
								<tbody id="tablebody">
								<!-- BEGIN TABLE BODY -->
								
								<!-- END TABLE BODY -->
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN INCLUSION FOOTER -->
<?php require_once INC_PATH."rodape.php"?>
<!-- END INCLUSION FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cockie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
   Index.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>