	<!--sidebar-->
	<aside class="sidebar">
		<div class="left-aside-container">
			<div class="user-profile-container">
				<div class="user-profile clearfix">
					<div class="admin-user-thumb">
						<img src="{{asset('assets/images/faces/face1.png')}}" alt="admin" class="img-circle">
					</div>
					<div class="admin-user-info">
						<ul class="user-info">
							<li><a href="index.htm#" class="text-semibold text-size-large">Administrador </a></li>
							<li><a href="index.htm#"><small></small></a></li>
						</ul>
						<div class="logout-icon">
							<!--<a href="">
								<i class="icon-exit2"></i>
							</a>-->
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							    <i class="icon-exit2"></i>
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							    {{ csrf_field() }}
							</form>
						</div>
					</div>
					
				</div>				
			</div>			
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active" id="tab-menu"><a href="index.htm#menu" aria-controls="menu" role="tab" data-toggle="tab"><i class="icon-home2"></i></a></li>
				
				<!--<li role="presentation" class="" id="tab-profile"><a href="index.htm#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="icon-users2"></i></a></li>-->
				
			</ul>
		  
			<div class="tab-content">
			
			
				<div role="tabpanel" class="tab-pane active fadeIn" id="menu">
					<ul class="sidebar-accordion">
					
						<li class="list-title">Principal</li>
						<li>
							<a href="index.htm#"><i class="icon-display4"></i><span class="list-label"> Inicio</span></a>
							<!--<ul>
								<li><a href="index.htm">Inicio</a></li>
								<li><a href="index1.htm">Minimal dashboard</a></li>
								<li><a href="index2.htm">Analytical dashboard</a></li>						
							</ul>-->
						</li>
						<!--<li><a href="index.htm#"><i class="icon-car2"></i> Catalogo <span class="label bg-purple pull-right m-r-20 m-t-5">Upcoming</span></a></li>
						<li><a href="index.htm#"><i class="icon-cart2"></i> Ecommerce <span class="label bg-purple pull-right m-r-20 m-t-5">Upcoming</span></a>
							<ul>
								<li><a href="index.htm#">Dashboard</a></li>
								<li><a href="index.htm#">Products list</a></li>								
								<li><a href="index.htm#">Orders</a></li>
								<li><a href="index.htm#">Order view</a></li>
							</ul>
						</li>-->

						
						<li>
							<a href="#"><span>Catalogo</span></a>
							<ul>
								<li><a href="{{ route('organization.index') }}">Organizaciones</a></li>
								<li><a href="{{route('organization_unit.index')}}">Unidades</a></li>
								<li><a href="{{route('official.index')}}">Funcionarios</a></li>
								<li><a href="{{route('role.index')}}">Rol</a></li>
								<li><a href="{{route('sector.index')}}">Sector</a></li>
								<li><a href="{{route('subsector.index')}}">Subsector</a></li>
								<li><a href="{{route('source.index')}}">Fuentes de financiamiento</a></li>
								<li><a href="{{route('purpose.index')}}">Propositos</a></li>
								<!--<li><a href="">Departamento</a></li>
								<li><a href="">Municipio</a></li>-->

								<li><a href="{{route('contracttype.index')}}">Tipos de contratos</a></li>
								<li><a href="">Oferentes</a></li>
								<li><a href="{{route('tender_method.index')}}">Metodo de adquisición</a></li>
								<li><a href="{{route('contract_method.index')}}">Metodo de contratación</a></li>
								<li><a href="">Tipo de modificaciones de contrato</a></li>
								<li><a href="">Contactos</a></li>
								<li><a href="">Tipos de Garantía</a></li>
								<li><a href="">Moneda</a></li>
								<li><a href="{{route('status.index')}}">Estados</a></li>
							</ul>
						</li>
						<!--<li>
							
						</li>-->
						<!--<li>
							<a href="#"><i class="icon-comment-discussion"></i><span>Invitación y calificación</span></a>
							<ul>
								<li><a href="">Funcionarios</a></li>
								<li><a href="">Entidad de adquisiciones</a></li>
								<li><a href="">Unidades</a></li>
								<li><a href="{{route('contracttype.index')}}">Tipos de contratos</a></li>
								<li><a href="{{route('tender_method.index')}}">Metodos de Calificación</a></li>
								<li><a href="">Oferentes</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-envelop"></i> <span>Adjudicación</span></a>
							<ul>
								<li><a href="">Entidad de adquizición</a></li>
								<li><a href="">Método de adquisición</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-list2"></i> <span>Contratación</span></a>
							<ul>
								<li><a href="">Entidad de adquisición del contrato</a></li>
								<li><a href="">Oferente</a></li>
							</ul>
						</li>						
						<li>
							<a href="#"><i class="icon-briefcase"></i><span>Gestión de contratos</span></a>
							<ul>
								<li><a href="projects_list.htm">Modificaciones </a></li>		
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-cash3"></i> <span>Ejecución</span></a>
							<ul>
								<li><a href="invoice_list.htm">Contactos</a></li>
								<li><a href="invoice_template.htm">Garantías</a></li>							
							</ul>
						</li>																
						<li>
							<a href="#"><i class="icon-megaphone"></i> Generales </a>
							<ul>
								<li><a href="invoice_list.htm">Moneda</a></li>
								<li><a href="invoice_template.htm">Estados</a></li>							
							</ul>
						</li>-->

						<li class="list-title">Gestión de Proyectos</li>

						<li>
							<a href="#">
								<i class="icon-comment-discussion"></i><span>Proyectos</span>
							</a>
							<ul>
								<li><a href="{{ route('project.index') }}">Listas Proyectos</a></li>
								<li><a href="{{ route('project.create') }}">Crear Proyecto</a></li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="icon-comment-discussion"></i> 
								Invitación y Calificación 
							</a>
							<ul>
								<li><a href="{{route('tender.index')}}">Listar invitaciónes</a></li>
								<li><a href="{{route('tender.create')}}">Crear invitación</a></li>
							</ul>
						</li>
						<li>
							<a href="">
								<i class="icon-comment-discussion"></i> 
								Evaluación de Ofertas/Adjudicación 
							</a>
							<ul>
								<li><a href="{{route('award.index')}}">Listar Adjudicaciones</a></li>
								<li><a href="#">Crear Adjudicación</a></li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="icon-comment-discussion"></i> 
								Contratación
							</a>
							<ul>
								<li><a href="{{route('contract.index')}}">Listar Contrataciones</a></li>
								<li><a href="{{route('contract.create')}}">Listar Contrataciones</a></li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="icon-comment-discussion"></i> Gestión de Contratos 
							</a>
							<ul>
								<li><a href="{{route('contract.index')}}">Gestiones de Contratos</a></li>
								<li><a href="{{route('contract.create')}}">Crear Modificación</a></li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="icon-comment-discussion"></i> Ejecución 
							</a>
							<ul>
								<li><a href="{{route('contract.index')}}">Ver Ejecución de Proyectos</a></li>
								<li><a href="{{route('contract.create')}}">Registrar Ejecución</a></li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="icon-comment-discussion"></i> Avances y Garantías 
							</a>
							<ul>
								<li><a href="{{route('contract.index')}}">Ver Avances</a></li>
								<li><a href="{{route('contract.create')}}">Registrar Avance</a></li>
							</ul>
						</li>
						<li>
							<a href=""><i class="icon-comment-discussion"></i> Ficha de finalización </a>
						</li>
						
						<li class="list-title">Informes</li>

						<li>
							<a href="{{ route('reports.adquisitions') }}"><i class="icon-comment-discussion"></i> Adquisiciones </a>
						</li>
						<li>
							<a href="{{ route('reports.technicians') }}"><i class="icon-comment-discussion"></i> Técnicos </a>
						</li>
						<!--<li>
							<a href="{{ route('reports.suppliers') }}"><i class="icon-comment-discussion"></i> Contratos y Proveedores </a>
						</li>-->
						<li>
							<a href="{{ route('reports.managment') }}"><i class="icon-comment-discussion"></i> Gerenciales </a>
						</li>
						<!--<li>
							<a href="index.htm#"><i class="icon-comment-discussion"></i> Descarga de información </a>
						</li>-->
						
					</ul>
				</div>
				
				
				<!-- TAB 2 -->				
				<!--<div role="tabpanel" class="tab-pane profile fade" id="profile">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="text-center">
								<img src="{{asset('assets/images/faces/face7.png')}}" class="img-responsive img-circle user-avatar" alt=""/>
								<h4 class="no-margin-bottom m-t-10">Hi! Ann Porter</h4>
								<div class="text-light text-size-small text-white">Company Secretary</div>							
							</div>
						</div>
					</div>
					<div class="row m-t-10 connect-buttons">
						<div class="col-xs-6 p-r-5">
							<button type="button" class="btn btn-block btn-info btn-rounded"><i class="icon-twitter position-left"></i> Follow</button>
						</div>
						<div class="col-xs-6 p-l-5">
							<div class="btn-group dropleft">
							  <button type="button" class="btn btn-block btn-danger btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-share3 position-left"></i>  Connect
							  </button>
							  <ul class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
								<li><a href="index.htm#"><i class="icon-comment-discussion"></i> Chat with user</a></li>
								<li><a href="index.htm#"><i class="icon-phone-wave"></i> Call user</a></li>
								<li><a href="index.htm#"><i class="icon-comments"></i> Send message</a></li>
							  </ul>
							</div>							
						</div>
					</div>
					<div class="row m-t-20 followers text-muted">
						<div class="col-xs-6 text-center">
							<h3 class="text-semibold no-margin">400+</h3>
							<div>Connections</div>
						</div>
						<div class="col-xs-6 text-center">
							<h3 class="text-semibold no-margin">1200+</h3>
							<div>Followers</div>
						</div>
					</div>
					<div class="row m-t-10 users-online">
						<div class="col-xs-12">
							<div class="leftbar-heading text-semibold m-b-15">FRIENDS ONLINE</div>
							<ul class="media-list">
								<li class="media">
									<a href="index.htm#" class="media-left"><img src="{{asset('assets/images/faces/face5.png')}}" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="index.htm#" class="media-heading">Florence Douglas</a>
										<span class="text-size-mini text-muted display-block">Online</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark bg-success"></span>
									</div>
								</li>

								<li class="media">
									<a href="index.htm#" class="media-left"><img src="{{asset('assets/images/faces/face6.png')}}" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="index.htm#" class="media-heading">Eugine Turner</a>
										<span class="text-size-mini text-muted display-block">Busy</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark bg-danger-light"></span>
									</div>
								</li>

								<li class="media">
									<a href="index.htm#" class="media-left"><img src="{{asset('assets/images/faces/face7.png')}}" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="index.htm#" class="media-heading">Jacqueline Howell</a>
										<span class="text-size-mini text-muted display-block">Online</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark bg-success"></span>
									</div>
								</li>

								<li class="media">
									<a href="index.htm#" class="media-left"><img src="{{asset('assets/images/faces/face8.png')}}" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="index.htm#" class="media-heading">Marilyn Romero</a>
										<span class="text-size-mini text-muted display-block">Away</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark bg-warning-light"></span>
									</div>
								</li>

								<li class="media">
									<a href="index.htm#" class="media-left"><img src="{{asset('assets/images/faces/face9.png')}}" class="img-sm img-circle" alt=""></a>
									<div class="media-body">
										<a href="index.htm#" class="media-heading">Andrew Brewer</a>
										<span class="text-size-mini text-muted display-block">Invisible</span>
									</div>
									<div class="media-right media-middle">
										<span class="status-mark bg-grey-light"></span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>-->
				
				
				
			</div>		
		</div>
	</aside>
	<!--/sidebar-->
