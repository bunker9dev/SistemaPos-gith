
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">

			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

				<span class="sr-only">Toggle navigation</span>

			</a>

			<!-- perfil de usuario -->

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<?php

						if ($_SESSION["foto"] != ""){

							echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="User Image">';

						}else{
							echo '<img src="vistas/img/plantilla/icon-man1.svg" alt="User Image" class="user-image">';
						}

						?>

							
							<span class="hidden-xs"><?php echo $_SESSION["nombre"]. " " .$_SESSION["apellido"];?></span>
						</a>

						<!-- Dropdown-toggle -->

						<ul class="dropdown-menu">
							<li class="user-body">
								<div class="pull-right">
									<a href="salir" class="btn btn-default btn-flat">Salir</a>
								</div>
							</li>
						</ul>

					</li>
				</ul>
			</div>
		</ul>
	</nav>
	<!-- /.navbar -->






















	<!--  -->