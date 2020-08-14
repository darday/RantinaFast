<div class="container ">
			<div class="row text-center">
				<div class=" col-xs-6 col-sm-6 col-md-4 col-lg-4 ">
					<img  src="img/rantina.png " style="margin-top: 7px;" width="185px" height="77px">				
				</div>				

				<div class=" col-xs-6 col-sm-6 col-md-5 col-lg-5  text-center">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h2>ADMINISTRADOR</h2>
					</div>

					<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<h5 style="color: white;" ><?php echo $row['nombres']   ?></h5>				
					</div>

				</div>
				
				<div class=" col-xs-12 col-sm-12 col-md-3 col-lg-3   text-center">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h6><?php date_default_timezone_set('America/Bogota');
						echo "Riobamba, " . date("j") . " del " . date("n") . " de " . date("Y");?></h6>
					</div>

					<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<h6 >Salir</h6><a href="logout.php" title="Salir" class="btn_salir"><i class="fas fa-sign-out-alt" style="font-size:36px;"></i></a>
					</div>
				</div>
			</div>
</div>