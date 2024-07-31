<!-- Main Sidebar Container -->


<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="inicio" class="brand-link">
		<img src="vistas/img/plantilla/icon-inventary-case.svg" alt="ISA2 Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Sistema inventarios A2</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<?php

						if ($_SESSION["foto"] != ""){

							echo '<img src="'.$_SESSION["foto"].'" class="user-image img-circle elevation-2" alt="User Image">';

						}else{
							echo '<img src="vistas/img/plantilla/1-icon-setting.svg" alt="User Image" class="user-image img-circle elevation-2">';
						}

						?>
			</div>
			<div class="info">
				<a href="#" class="d-block"><?php echo $_SESSION["nombre"]. " " .$_SESSION["apellido"];?></a>
			</div>
		</div>

		

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->



				<!-- /////////////////  #########################    ///////////////////////////// -->

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i>
							<img class="image nav-icon" src="vistas/img/plantilla/1-icon_tacometro.svg" alt="User Image">
						</i>

						<!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
						<p>
							Dashboard
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="inicio" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Dashboard v1</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="dashboard-v2" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Dashboard v2</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- /////////////////  #########################    ///////////////////////////// -->

				<li class="nav-item">
					<a href="usuarios" class="nav-link">
						<i>
							<img class="image nav-icon" src="vistas/img/plantilla/1-icon-config-user.svg" alt="User Image">
						</i>
						<p>
							Usuarios
						</p>
					</a>
				</li>


				<!-- /////////// icono  /////////// -->

				<li class="nav-item">
					<a href="clientes" class=" nav-link">
						<i>
							<img class="image nav-icon" src="vistas/img/plantilla/1-icon-user.svg" alt="User Image">
						</i>
						<p>
							Clientes
						</p>
					</a>
				</li>

		


				<!-- /////////////////  #########################    ///////////////////////////// -->




				<li class="nav-item">
					<a href="#" class="nav-link">
						<i>
							<img class="image nav-icon" src="vistas/img/plantilla/1-icon-product.svg" alt="icon prodcuto">
						</i>
						<p>
							Productos
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						<li class="nav-item">
							<a href="categorias" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Agregar Tipo de Telas</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="colores" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Agregar Color de Tela</p>
							</a>
						</li>

						<li class="nav-item">
                            <a href="productos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar Productos</p>
                            </a>
                        </li>

					</ul>
				</li>



				<!-- /////////// icono  /////////// -->

				<li class="nav-item">
					<a href="inventarios" class=" nav-link">
						<i>
							<img class="image nav-icon" src="vistas/img/plantilla/1-icon-invetory.svg" alt="inventario icon ">
						</i>
						<p>
							Inventario
						</p>
					</a>
				</li>

				<!-- /////////////////  #########################    ///////////////////////////// -->

				<!-- /////////// icono  /////////// -->

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i>
							<img class="image nav-icon" src="vistas/img/plantilla/1-icon-sale.svg" alt="icon sale">
						</i>
						<p>
							Ventas
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						<li class="nav-item">
							<a href="ventas" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Administrar ventas</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="ventas-crear" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Crear ventas</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="ventas-reportes" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Reporte de ventas</p>
							</a>
						</li>

					</ul>
				</li>

				<!-- /////////////////  #########################    ///////////////////////////// -->

				<!-- /////////// icono  /////////// -->

				<li class="nav-item">
					<a href="caja" class=" nav-link">
						<i>
							<img class="image nav-icon" src="vistas/img/plantilla/1-icon-cash-register.svg" alt="User Image">
						</i>
						<p>
							Caja
						</p>
					</a>
				</li>
				<br>
				<br>
				<br>

				<!-- /////////////////  #########################    ///////////////////////////// -->





				<!-- /////////// icono  /////////// -->





				<!-- <aside class="main-sidebar">

    -->

</aside>