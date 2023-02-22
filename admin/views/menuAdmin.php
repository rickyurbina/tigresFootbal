<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar doc-sidebar">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
							<div>
								<img src="assets/images/faces/1.jpg" alt="user-img" class="avatar avatar-lg brround">
								<a href="index.php?page=userEdit&idEditar=<?php echo $_SESSION["id"]?>" class="profile-img">
									<span class="fa fa-pencil" aria-hidden="true"></span>
								</a>
							</div>
							<div class="user-info">
								<h2><?php echo $_SESSION["nombre"]; ?></h2>
								<span><?php echo $_SESSION["permisos"]; ?></span>
							</div>
						</div>
					</div>
					<ul class="side-menu">

						<li class="slide <?php if ($pagina == 'inicio') echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'inicio') echo 'active'; ?>" href="index.php?page=inicio"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Inicio</span></a>
						</li>

						<li class="slide <?php if ($pagina == 'ventaList' || $pagina == 'venta' || $pagina == 'abonos' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'abonos' || $pagina == 'venta' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Ventas</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'abonos') echo 'active'; ?>" href="index.php?page=abonos">Abonos</a></li>
								<li><a class="slide-item <?php if ($pagina == 'venta') echo 'active'; ?>" href="index.php?page=venta">Venta</a></li>
								<li><a class="slide-item <?php if ($pagina == 'ventaList') echo 'active'; ?>" href="index.php?page=ventaList">Lista de ventas</a></li>
							</ul>
						</li>





						</li><br><br><h3>Catalogos</h3>

						<li class="slide <?php if ($pagina == 'userAdd' || $pagina == 'userList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'userAdd' || $pagina == 'userList' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Usuarios</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'userAdd') echo 'active'; ?>" href="index.php?page=userAdd">Registrar</a></li>
								<li><a class="slide-item <?php if ($pagina == 'userList') echo 'active'; ?>" href="index.php?page=userList">Lista de Usuarios</a></li>

							</ul>
						</li>
						<li class="slide <?php if ($pagina == 'socioAdd' || $pagina == 'socioList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'socioAdd' || $pagina == 'socioList' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon icon icon-people"></i><span class="side-menu__label">Jugadores</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'socioAdd') echo 'active'; ?>" href="index.php?page=socioAdd">Registrar</a></li>
								<li><a class="slide-item <?php if ($pagina == 'socioList') echo 'active'; ?>" href="index.php?page=socioList">Lista de Jugadores</a></li>

							</ul>
						</li>
						<li class="slide <?php if ($pagina == 'precioAdd' || $pagina == 'precioList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'precioAdd' || $pagina == 'precioList' || $pagina == 'precioEdit' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-dollar"></i><span class="side-menu__label">Costos</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'precioAdd') echo 'active'; ?>" href="index.php?page=precioAdd">Registrar</a></li>
								<li><a class="slide-item <?php if ($pagina == 'precioList') echo 'active'; ?>" href="index.php?page=precioList">Lista de Precios</a></li>

							</ul>
						</li>
						<li class="slide <?php if ($pagina == 'grupoAdd' || $pagina == 'grupoList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'grupoAdd' || $pagina == 'grupoList' || $pagina == 'grupoEdit' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-dollar"></i><span class="side-menu__label">Categorías</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'grupoAdd') echo 'active'; ?>" href="index.php?page=grupoAdd">Registrar</a></li>
								<li><a class="slide-item <?php if ($pagina == 'grupoList') echo 'active'; ?>" href="index.php?page=grupoList">Lista de Categorías</a></li>

							</ul>
						</li>
						<li class="slide <?php if ($pagina == 'productAdd' || $pagina == 'productList' ) echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'productAdd' || $pagina == 'productList' ) echo 'active'; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cubes"></i><span class="side-menu__label">Productos</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php if ($pagina == 'productAdd') echo 'active'; ?>" href="index.php?page=productAdd">Registrar</a></li>
								<li><a class="slide-item <?php if ($pagina == 'productList') echo 'active'; ?>" href="index.php?page=productList">Lista de Productos</a></li>

							</ul>
						</li>
						

                        <hr>

						
					</ul>

				</aside>