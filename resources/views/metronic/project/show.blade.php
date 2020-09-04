@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    "use strict";
    // Shared Colors Definition
    const primary = '#6993FF';
    const success = '#1BC5BD';
    const info = '#8950FC';
    const warning = '#FFA800';
    const danger = '#F64E60';
    var label = JSON.parse('{!! $date !!}');
    var KTApexChartsDemo = function () {
        var _demo1 = function () {
		const apexChart = "#chart_1";
            var options = {
                series: [{
                    name: 'Programmed',
                    data: {{ $pp }}
                }, {
                    name: 'Real',
                    data: {{ $rp }}
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories:  label
                },
                
                colors: [primary, success]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        };
        var _demo2 = function () {
		const apexChart = "#chart_2";
            var options = {
                series: [{
                    name: 'Scheduled Financing',
                    data: {{ $sf }}
                }, {
                    name: 'Real Financing',
                    data: {{ $rf }}
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: label
                },
                colors: [warning, danger]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        };
        return {
		// public functions
            init: function () {
                _demo1();
                _demo2();
            }
        };

    }();
    jQuery(document).ready(function () {
        KTApexChartsDemo.init();

        $(document).on('click', '.button', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var link = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won\'t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: "GET",
                            url: "/api/organization_unit/"+ id +"/delete",
                            success: function (data) {
                                toastr.success("Data deleted successfully!");
                                var table = $('#kt_datatable').DataTable(); 
                                table.ajax.reload( null, false );
                            }         
                        });
                    }
                });
            });
    });
</script>
@endsection
@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Detail Project </h5>
            <!--end::Title-->
        </div>
        <!--end::Details-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="javascript:history.back()" class="btn btn-default font-weight-bold">Back </a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <a href="#"
                                    class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ str_limit($project->project_title, $limit = 100, $end = '...') }}</a>
                                <span class="text-muted font-weight-bold">Project Code :
                                    {{ $project->project_code }}</span>
                                <span class="text-muted font-weight-bold">{{ $project->subsector->sector->sector_name }}
                                    -
                                    {{ $project->subsector->subsector_name }}</span>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar mb-auto">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-item">
                                                <a href="{{ url('project-tender/'.$project->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                                    fill="#000000"></path>
                                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3"
                                                                    rx="1"></rect>
                                                                <path
                                                                    d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="navi-text ml-2"> Tender</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ url('project-file/'.$project->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M3.51471863,18.6568542 L13.4142136,8.75735931 C13.8047379,8.36683502 14.4379028,8.36683502 14.8284271,8.75735931 L16.2426407,10.1715729 C16.633165,10.5620972 16.633165,11.1952621 16.2426407,11.5857864 L6.34314575,21.4852814 C5.95262146,21.8758057 5.31945648,21.8758057 4.92893219,21.4852814 L3.51471863,20.0710678 C3.12419433,19.6805435 3.12419433,19.0473785 3.51471863,18.6568542 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                                <path
                                                                    d="M9.87867966,6.63603897 L13.4142136,3.10050506 C13.8047379,2.70998077 14.4379028,2.70998077 14.8284271,3.10050506 L21.8994949,10.1715729 C22.2900192,10.5620972 22.2900192,11.1952621 21.8994949,11.5857864 L18.363961,15.1213203 C17.9734367,15.5118446 17.3402718,15.5118446 16.9497475,15.1213203 L9.87867966,8.05025253 C9.48815536,7.65972824 9.48815536,7.02656326 9.87867966,6.63603897 Z"
                                                                    fill="#000000"></path>
                                                                <path
                                                                    d="M17.3033009,4.86827202 L18.0104076,4.16116524 C18.2056698,3.96590309 18.5222523,3.96590309 18.7175144,4.16116524 L20.8388348,6.28248558 C21.0340969,6.47774772 21.0340969,6.79433021 20.8388348,6.98959236 L20.131728,7.69669914 C19.9364658,7.89196129 19.6198833,7.89196129 19.4246212,7.69669914 L17.3033009,5.5753788 C17.1080387,5.38011665 17.1080387,5.06353416 17.3033009,4.86827202 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="navi-text ml-2"> Documents</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ url('project-budget/'.$project->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                                <path
                                                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                    fill="#000000"></path>
                                                                <rect fill="#000000" opacity="0.3" x="7" y="10"
                                                                    width="5" height="2" rx="1"></rect>
                                                                <rect fill="#000000" opacity="0.3" x="7" y="14"
                                                                    width="9" height="2" rx="1"></rect>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="navi-text ml-2"> Budget</span>
                                                </a>
                                            </li>
                                            @if(Auth::check())
                                            <hr>
                                            <li class="navi-item">
                                                <a href="{{ url('project/'.$project->id.'/edit') }}"
                                                    class="navi-link"><span><i class="flaticon2-pen"></i>
                                                    </span><span class="navi-text ml-2"> Edit</span></a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" data-id="{{ $project->id }}"
                                                    class="button navi-link"><span><i class="flaticon2-trash"></i>
                                                    </span><span class="navi-text ml-2"> Delete</span></a>
                                            </li>
                                            @endif
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Content-->
                        <div class="d-flex flex-wrap mt-14">
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="d-block font-weight-bold mb-4">Start Date</span>
                                <span
                                    class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($project->start_date)->format('D, d M Y') }}</span>
                            </div>
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="d-block font-weight-bold mb-4">Due Date</span>
                                <span
                                    class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($project->end_date)->format('D, d M Y') }}</span>
                            </div>
                            <!--begin::Progress-->
                            <div class="flex-row-fluid mb-7">
                                <span class="d-block font-weight-bold mb-4">Progress - Real Physical
                                    @if($project->latest_progress)
                                    <span class="text-muted font-weight-bold">
                                        (Last update :
                                        {{ date('D, d M Y', strtotime($project->latest_progress->date_of_advance)) }} )
                                    </span>
                                    @endif
                                    @if(Auth::check())
                                    <div class="float-right">
                                        <a href="{{ url('project-progress/'.$project->id) }}">Add New Progress</a>
                                    </div>
                                    @endif
                                    <div class="d-flex align-items-center pt-2">
                                        <div class="progress progress-xs mt-2 mb-2 w-100">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ number_format($project->latest_progress ? $project->latest_progress->real_percent : 0) }}%;"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span
                                            class="ml-3 font-weight-bolder">{{ number_format($project->latest_progress ? $project->latest_progress->real_percent : 0) }}%</span>
                                    </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Text-->
                        <p class="mb-7 mt-3">{!! $project->project_description !!}</p>
                        <!--end::Text-->
                        <!--begin::Blog-->
                        <div class="d-flex flex-wrap">
                            <!--begin: Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">Budget</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                    <span class="font-weight-bold text-dark-50">Rp
                                    </span>{{ number_format($project->budget) }}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">SEFIN Code</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                    <span class="font-weight-bold text-dark-50"></span>{{ $project->code_sefin }}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">Duration</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                    <span class="font-weight-bold text-dark-50">{{ $project->duration }}</span>
                                    days</span>
                            </div>
                            <!--end::Item-->
                            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                <span class="font-weight-bolder mb-4">
                                    <a href="{{ url('project-tender/'.$project->id) }}" class="text-dark">Tender</a>
                                </span>
                                <div class="d-flex align-items-center flex-lg-fill">
                                    <span class="mr-4">
                                        <i class="icon-2x text-dark-50 flaticon-notepad"></i>
                                    </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <a href="{{ url('project-tender/'.$project->id) }}"><span
                                                class="text-dark-75 font-weight-bolder font-size-sm">{{ number_format($project->tenders->count()) }}
                                                Tender</span></a>
                                        @if(Auth::check())
                                        <a href="{{ url('tender-create/'.$project->id) }}"
                                            class="text-primary font-weight-bolder">Add New Tender</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                <span class="font-weight-bolder mb-4">
                                    <a href="{{ url('project-file/'.$project->id) }}" class="text-dark">Files</a>
                                </span>
                                <div class="d-flex align-items-center flex-lg-fill">
                                    <span class="mr-4">
                                        <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <a href="#"><span
                                                class="text-dark-75 font-weight-bolder font-size-sm">{{ number_format($project->file->count()) }}
                                                Files</span></a>
                                        @if(Auth::check())
                                        <a href="{{ url('project-file/'.$project->id) }}"
                                            class="text-primary font-weight-bolder">Add New File</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                <span class="font-weight-bolder mb-4">
                                    <a href="{{ url('project-budget/'.$project->id) }}" class="text-dark">Budget</a>
                                </span>
                                <div class="d-flex align-items-center flex-lg-fill">
                                    <span class="mr-4">
                                        <i class="icon-2x text-dark-50 flaticon-piggy-bank"></i>
                                    </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <a href="#"><span
                                                class="text-dark-75 font-weight-bolder font-size-sm">{{ number_format($project->project_budget->count()) }}
                                                Budget</span></a>
                                        @if(Auth::check())
                                        <a href="{{ url('project-budget/'.$project->id) }}"
                                            class="text-primary font-weight-bolder">Add New Budget</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!--end::Item-->
                        </div>
                        <hr>
                        <div class="row mt-5 mb-5">
                            <div class="col-md-6">
                                <h3 class="card-label mt-5 mb-5">Progress Percent (%)</h3>
                                <div id="chart_1"></div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-label mt-5 mb-5">Progress Financial</h3>
                                <div id="chart_2"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="card-label mt-5 mb-5">Location</h3>
                                {!! $map['js'] !!}
                                {!! $map['html'] !!}
                            </div>
                        </div>
                        <!--end::Blog-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection