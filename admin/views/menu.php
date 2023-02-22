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

						<li class="slide <?php if ($pagina == 'socioAdd') echo 'is-expanded'; ?>">
							<a class="side-menu__item <?php if ($pagina == 'socioAdd') echo 'active'; ?>" href="index.php?page=socioAdd"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Registrar Jugador</span></a>
						</li>
				
						
					</ul>

				</aside>