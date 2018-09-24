
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Page title -->
        <title>CONTROL DE CITAS</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
        <link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='assets/fullcalendar/moment.min.js'></script>
        <script src='assets/fullcalendar/fullcalendar.min.js'></script>
    </head>
    <body>
		<div class="container bg_access">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="card">
						<div class="card-header" data-background-color="">
							<h4 class="title">Acceder</h4>
						</div>
						<div class="card-content table-responsive">
							<form accept-charset="UTF-8" role="form" method="post" action="index.php?view=processlogin">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Usuario" name="mail" type="text">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
									</div>
									<input class="btn btn-primary btn-block" type="submit" value="Iniciar Sesion">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
    <!--   Core JS Files   -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>
</html>
