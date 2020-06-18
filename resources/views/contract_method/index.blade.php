
@extends('layout')

@section('title')

@stop

@push('styles')
	<link type="text/css" rel="stylesheet" href="{{asset('css/fab.css')}}">
@endpush

@section('content')
	<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">List Metode</h5>				
					</div>

					<div class="panel-body">
						
					</div>
					
					<div class="table-responsive">
						<table class="table table-togglable table-hover datatable datatable-header-basic">
							<thead>
								<tr>
									<th data-hide="phone, tablet">#</th>
									<th data-toggle="true">Nama Metode</th>
									<th>Actions</th>
									<th data-hide="phone, tablet"></th>
									<th data-hide="phone, tablet"></th>
								</tr>
							</thead>
							
							<tbody>
								@foreach($rows as $row)
								<tr>
									<td>{{$row->id}}</td>
									<td>{{$row->method_name}}</td>
									<td class="text-center">
										<a href="{{ route('contract_method.edit', $row->id) }}" class="btn btn-defaut">
											<i class="icon-pencil6"></i>
										</a>
									</td>
									<td>
										<form action="{{ route('contract_method.destroy', $row->id)}}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger" type="submit">
												<i class="icon-trash"></i>
											</button>
										</form>
									</td>
									<td>
										<ul class="icons-list">					
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">							
													<li>
														<a href="{{route('contract_method.edit', $row->id)}}">
															<i class="icon-pencil6"></i> Edit
														</a>
													</li>
													<li>
														<a href="#"><i class="icon-trash"></i> Delete</a>
													</li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<!--floating buttons-->
						<!--<div style="min-height:240px"></div>-->
						<ul class="fab-menu fab-menu-absolute fab-menu-bottom-right" data-fab-toggle="hover">
							<li>
								<a class="fab-menu-btn btn bg-success btn-float btn-rounded btn-icon" href="{{route('contract_method.create')}}">
									<i class="fab-icon-open icon-file-plus2"></i>
									<!--<i class="fab-icon-close icon-cross2"></i>-->
								</a>
							</li>
						</ul>

					</div>
				</div>

				


				
@stop

@push('scripts')	
<script src="{{asset('js/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('js/tables/datatables/extensions/fixed_header.min.js')}}"></script>
<script src="{{asset('js/pages/datatable_extension_fixed_header.js')}}"></script>

<script src="{{asset('js/tables/footable.min.js')}}"></script>
<script src="{{asset('js/pages/tables_responsive.js')}}"></script>

<script src="{{asset('js/pages/fab_buttons.js')}}"></script>
@endpush

