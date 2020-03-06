	<header class="main-nav clearfix">	
		<div class="top-search-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="search-input-addon">
							<span class="addon-icon"><i class="icon-search4"></i></span>
							<input type="text" class="form-control top-search-input" placeholder="Search">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="navbar-left pull-left">
			<div class="clearfix">
				<ul class="left-branding pull-left">
					<!--<li><span class="left-toggle-switch"><i class="icon-menu7"></i></span></li>-->
					<li>
						<a href="{{ route('welcome') }}"><div class="logo"></div></a>
					</li>
				</ul>				
			</div>
		</div>
		
		<div class="navbar-right pull-right">
			<div class="clearfix">				
				<ul class="pull-right top-right-icons">
					<!--<li><a href="index.htm#" class="btn-top-search"><i class="icon-search4"></i></a></li>-->				
					

					<!--<li><a href="index.htm#" class="right-toggle-switch"><i class="icon-bubbles5"></i></a></li>-->
					<!--<li>
						<a href="{{ route('transparency.map') }}" class="" style="padding-top: 16px; padding-left: 15px; width: auto">
							<span style="margin-top: 15px">Mapa del Proyecto</span>
						</a>
					</li>-->
					<li>
						<a href="{{ route('transparency.citizens') }}" class="" style="padding-top: 16px; padding-left: 15px; width: auto">
							<span style="margin-top: 15px">Módulo Ciudadano</span>
						</a>
					</li>
					<li>
						<a href="#" class="" style="padding-top: 16px; padding-left: 15px; width: auto">
							<span style="margin-top: 15px">SMQ</span>
						</a>
					</li>
					<li>
						<a href="#" class="" style="padding-top: 16px; padding-left: 15px; width: auto">
							<span style="margin-top: 15px">Informes</span>
						</a>
						<!--<ul>
							<li><a href="">Adquisiciones</a></li>
							<li><a href="">Técnicos</a></li>
							<li><a href="">Gerenciales</a></li>
						</ul>-->
					</li>
					<li>
						<a href="{{ route('login') }}" class="" style="padding-top: 16px; padding-left: 15px; width: auto">
							<span style="margin-top: 15px">Inicio de Sesión</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
