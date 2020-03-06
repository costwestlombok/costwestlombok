@extends('layout')



@push('styles')
	<link type="text/css" rel="stylesheet" href="{{asset('css/fab.css')}}">
@endpush

@section('content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Current projects</h5>						
				</div>

				<table class="table table-hover invoice-list responsive" id="datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Codigo</th>										
							<th>Proyecto</th>
							<th>Fecha de inicio</th>
							<th>Fecha de Entrega</th>
							<th>Estado</th>
							<th>Completado</th>
							<th>Contactos</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>11</td>
							<td></td>
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#">Jane Elliott</a>												
								</h5>
							</td>													
							<td>
								April 04, 2016
							</td>
							<td>June 2016</td>
							<td>
								<span class="label label-success">Active</span>
							</td>
							<td>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 75%">
										<span class="sr-only">75% Complete</span>
									</div>
								</div>
							</td>
							<td>
								<img alt="" src="assets/images/faces/face5.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face6.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face7.png" class="img-rounded img-responsive img-xs">
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="projects_details.htm" target="_blank"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Delete</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>

						<tr>
							<td>24</td>
							<td></td>								
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#">Florence Douglas</a>												
								</h5>
							</td>										
							<td>
								April 02, 2016
							</td>
							<td>September 2016</td>	
							<td>
								<span class="label label-default">On Hold</span>
							</td>
							<td>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-info bg-grey progress-bar-striped active" style="width: 15%">
										<span class="sr-only">15% Complete</span>
									</div>
								</div>
							</td>
							<td>
								<img alt="" src="assets/images/faces/face8.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face9.png" class="img-rounded img-responsive img-xs">											
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="projects_details.htm" target="_blank"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Remove</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>

						<tr>
							<td>23</td>
							<td></td>										
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#">Eugine Turner</a>												
								</h5>
							</td>																		
							<td>
								March 14, 2016
							</td>																	
							<td>
								March 14, 2016
							</td>
							<td>
								<span class="label label-success">Active</span>
							</td>
							<td>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 50%">
										<span class="sr-only">50% Complete</span>
									</div>
								</div>
							</td>
							<td>
								<img alt="" src="assets/images/faces/face4.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face2.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face1.png" class="img-rounded img-responsive img-xs">
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="projects_details.htm" target="_blank"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Remove</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>

						<tr>
							<td>22</td>
							<td></td>										
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#">Ann Porter</a>										
								</h5>
							</td>																	
							<td>
								March 5, 2016
							</td>
							<td>October 2016</td>
							<td>
								<span class="label label-danger">Canceled</span>
							</td>
							<td>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 35%">
										<span class="sr-only">35% Complete</span>
									</div>
								</div>
							</td>
							<td>
								<img alt="" src="assets/images/faces/face5.png" class="img-rounded img-responsive img-xs">
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="projects_details.htm" target="_blank"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Remove</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>

						<tr>
							<td>21</td>
							<td></td>										
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#">Jacqueline Howell</a>											
								</h5>
							</td>											
							<td>
								March 10, 2016
							</td>
							<td>July 2016</td>
							<td>
								<span class="label label-success">Active</span>
							</td>
							<td>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 75%">
										<span class="sr-only">75% Complete</span>
									</div>
								</div>
							</td>
							<td>
								<img alt="" src="assets/images/faces/face9.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face11.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face12.png" class="img-rounded img-responsive img-xs">
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="projects_details.htm" target="_blank"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Remove</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>

						<tr>
							<td>20</td>
							<td></td>										
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#">Andrew Brewer</a>												
								</h5>
							</td>																		
							<td>
								March 1, 2016
							</td>
							<td>December 2016</td>
							<td>
								<span class="label label-default">On hold</span>
							</td>
							<td>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-info bg-grey progress-bar-striped active" style="width: 75%">
										<span class="sr-only">75% Complete</span>
									</div>
								</div>
							</td>
							<td>
								<img alt="" src="assets/images/faces/face3.png" class="img-rounded img-responsive img-xs">
								<img alt="" src="assets/images/faces/face2.png" class="img-rounded img-responsive img-xs">											
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="projects_details.htm" target="_blank"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Remove</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>

													
					</tbody>
				</table>
			</div>

			<!--floating buttons-->
			<!--<div style="min-height:240px"></div>-->
			<ul class="fab-menu fab-menu-absolute fab-menu-bottom-right" data-fab-toggle="hover">
				<li>
					<a class="fab-menu-btn btn bg-success btn-float btn-rounded btn-icon" href="{{route('project.create')}}">
						<i class="fab-icon-open icon-file-plus2"></i>
						<!--<i class="fab-icon-close icon-cross2"></i>-->
					</a>
				</li>
			</ul>
			
		</div>																						
	</div>	

@stop

@push('scripts')
<script src="{{asset('js/pages/fab_buttons.js')}}"></script>
@endpush