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
						<li><a href="index.htm#"><small>admin</small></a></li>
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
					<li class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
						<a href="{{url('/dashboard')}}"><i class="icon-display4"></i><span class="list-label">
								Dashboard</span></a>
					</li>
					<li>
						<a href="#" class="{{ request()->segment(1) == 'catalog' ? 'active' : '' }}"><i
								class="icon-newspaper"></i><span class="list-label"> <span>Catalog</span></a>
						<ul>
							<li class="{{ request()->segment(2) == 'organization' ? 'active' : '' }}"><a
									href="{{ route('organization.index') }}">Organization</a></li>
							<li class="{{ request()->segment(2) == 'organization_unit' ? 'active' : '' }}"><a
									href="{{route('organization_unit.index')}}">Organization Unit</a></li>
							<li class="{{ request()->segment(2) == 'official' ? 'active' : '' }}"><a
									href="{{route('official.index')}}">Official</a></li>
							<li class="{{ request()->segment(2) == 'role' ? 'active' : '' }}"><a
									href="{{route('role.index')}}">Role</a></li>
							<li class="{{ request()->segment(2) == 'sector' ? 'active' : '' }}"><a
									href="{{route('sector.index')}}">Sector</a></li>
							<li class="{{ request()->segment(2) == 'subsector' ? 'active' : '' }}"><a
									href="{{route('subsector.index')}}">Subsector</a></li>
							<li class="{{ request()->segment(2) == 'source' ? 'active' : '' }}"><a
									href="{{route('source.index')}}">Source/Funding</a></li>
							<li class="{{ request()->segment(2) == 'purpose' ? 'active' : '' }}"><a
									href="{{route('purpose.index')}}">Project Purpose</a></li>

							<li class="{{ request()->segment(2) == 'contracttype' ? 'active' : '' }}"><a
									href="{{route('contracttype.index')}}">Contract Type</a></li>
							<li class="{{ request()->segment(2) == 'offerer' ? 'active' : '' }}"><a
									href="{{route('offerer.index')}}">Offerer</a></li>
							<li class="{{ request()->segment(2) == 'tender_method' ? 'active' : '' }}"><a
									href="{{route('tender_method.index')}}">Tender Method</a></li>
							<li class="{{ request()->segment(2) == 'tender_status' ? 'active' : '' }}"><a
									href="{{route('tender-status.index')}}">Tender Status</a></li>
							<li class="{{ request()->segment(2) == 'contract_method' ? 'active' : '' }}"><a
									href="{{route('contract_method.index')}}">Contract Method</a></li>
							<li class="{{ request()->segment(2) == 'warranty-type' ? 'active' : '' }}"><a
									href="{{route('warranty-type.index')}}">Warranty Type</a></li>
							<li class="{{ request()->segment(2) == 'status' ? 'active' : '' }}"><a
									href="{{route('status.index')}}">Status</a></li>
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

					<li class="list-title">Project Management</li>

					<li class="{{ request()->segment(1) == 'project' ? 'active' : '' }}">
						<a href="{{ route('project.index') }}">
							<i class="icon-magazine"></i><span>Project</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-stamp"></i>
							Tender
						</a>
						<ul>
							<li><a href="{{route('tender.index')}}">List Tender</a></li>
							<li><a href="{{route('tender.create')}}">Buat Tender Baru</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="icon-comment-discussion"></i>
							Evaluasi Penwaran/Penghargaan
						</a>
						<ul>
							<li><a href="{{route('award.index')}}">List Penghargaan</a></li>
							<li><a href="#">Buat Penghargaan Baru</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="icon-comment-discussion"></i>
							Kontrak
						</a>
						<ul>
							<li><a href="{{route('contract.index')}}">List Kontrak</a></li>
							<li><a href="{{route('contract.create')}}">Create Kontrak Baru</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="icon-comment-discussion"></i> Manajemen Kontrak
						</a>
						<ul>
							<li><a href="{{route('contract.index')}}">List Manajemen Kontrak</a></li>
							<li><a href="{{route('contract.create')}}">Buat Modifikasi</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="icon-comment-discussion"></i> Pengerjaan
						</a>
						<ul>
							<li><a href="{{route('contract.index')}}">Lihat Pengerjaan Proyek</a></li>
							<li><a href="{{route('contract.create')}}">Data Pengerjaan Proyek</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="icon-comment-discussion"></i> Progres dan Jaminan
						</a>
						<ul>
							<li><a href="{{route('contract.index')}}">Progress</a></li>
							<li><a href="{{route('contract.create')}}">Record Progres</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-comment-discussion"></i> Formulir Pengisian</a>
					</li>

					<li class="list-title">Laporan</li>

					<li>
						<a href="{{ route('reports.adquisitions') }}"><i class="icon-comment-discussion"></i>
							Akusisi </a>
					</li>
					<li>
						<a href="{{ route('reports.technicians') }}"><i class="icon-comment-discussion"></i> Teknisi
						</a>
					</li>
					<!--<li>
							<a href="{{ route('reports.suppliers') }}"><i class="icon-comment-discussion"></i> Contratos y Proveedores </a>
						</li>-->
					<li>
						<a href="{{ route('reports.managment') }}"><i class="icon-comment-discussion"></i>
							Manajemen/Pengelolaan
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