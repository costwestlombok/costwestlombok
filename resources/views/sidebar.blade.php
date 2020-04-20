<aside class="sidebar">
	<div class="left-aside-container">
		<div class="user-profile-container">
			<div class="user-profile clearfix">
				<div class="admin-user-thumb">
					<img src="{{asset('assets/images/faces/face1.png')}}" alt="admin" class="img-circle">
				</div>
				<div class="admin-user-info">
					<ul class="user-info">
						<li><a href="index.htm#" class="text-semibold text-size-large">Administrator </a></li>
						<li><a href="index.htm#"><small></small></a></li>
					</ul>
					<div class="logout-icon">
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="icon-exit2"></i>
						</a>
					</div>
				</div>

			</div>
		</div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active" id="tab-menu"><a href="index.htm#menu" aria-controls="menu"
					role="tab" data-toggle="tab"><i class="icon-home2"></i></a></li>
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active fadeIn" id="menu">
				<ul class="sidebar-accordion">
					<li class="list-title">Principal</li>
					<li>
						<a href="#"><i class="icon-display4"></i><span class="list-label"> Dashboard</span></a>
					</li>
					<li>
						<a href="#"><i class="icon-display4"></i><span class="list-label"> <span>Catalogue</span></a>
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
						<a href="{{ route('reports.adquisitions') }}"><i class="icon-comment-discussion"></i>
							Adquisiciones </a>
					</li>
					<li>
						<a href="{{ route('reports.technicians') }}"><i class="icon-comment-discussion"></i> Técnicos
						</a>
					</li>
					<!--<li>
							<a href="{{ route('reports.suppliers') }}"><i class="icon-comment-discussion"></i> Contratos y Proveedores </a>
						</li>-->
					<li>
						<a href="{{ route('reports.managment') }}"><i class="icon-comment-discussion"></i> Gerenciales
						</a>
					</li>
					<!--<li>
							<a href="index.htm#"><i class="icon-comment-discussion"></i> Descarga de información </a>
						</li>-->

				</ul>
			</div>

		</div>
	</div>
</aside>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	{{ csrf_field() }}
</form>