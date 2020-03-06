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
							<th>Estado</th>
							<!--<th>Completado</th>
							<th>Contactos</th>-->
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($obj) > 0): ?>
						<?php foreach ($obj as $row): ?>
						<tr>
							<td><?= $row['id'] ?></td>
							<td><?= $row['project_code'] ?></td>
							<td>
								<h5 class="no-margin">
									<a href="projects_list.htm#"><?= $row['project_name'] ?></a>												
								</h5>
							</td>													
							<!--<td>
								April 04, 2016
							</td>
							<td>June 2016</td>-->
							<td>
								<span class="label label-success">

									<?= ($row['statuses_id'] == 1 ? 'BORRADOR' : (($row['statuses_id'] == 2) ? 'PUBLICADO' : 'REVISIÓN')) ?>
									
								</span>
							</td>
							
							
							<td class="text-center">
								<ul class="icons-list">
									<li>
										<a href="{{ route('project.show', $row->id) }}" >
											<i class="icon-eye2"></i>
										</a>
									</li><br>
									<li>
										<a href="" >
											<i class="icon-pencil6"></i>
										</a>
									</li><br>
									<li>
										<a href="" >
											<i class="icon-trash"></i>
										</a>
									</li>
									<!--<li class="dropdown">
										<a href="projects_list.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="projects_list.htm#"><i class="icon-checkmark3"></i> Mark as completed</a></li>
											<li><a href="projects_list.htm#"><i class="icon-cross2"></i> Mark as incomplete</a></li>
											<li class="divider"></li>
											<li><a href="projects_list.htm#"><i class="icon-pencil6"></i> Edit</a></li>
											<li><a href="projects_list.htm#"><i class="icon-trash"></i> Delete</a></li>
										</ul>
									</li>-->
								</ul>
							</td>
						</tr>
						<?php endforeach; ?>
						<?php endif; ?>
						
						<!--
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
						-->
													
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