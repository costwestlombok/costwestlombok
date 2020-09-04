@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    jQuery(document).ready(function () {
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
            }).then(function (result) {
                if (result.value) {
                    window.location.href = "/api/project/" + id + "/delete";
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
                Project </h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{$projects->total()}}
                    Total</span>
                <form class="ml-5" action="{{ route('project.index') }}" method="GET">
                    <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                        <input type="text" name="query" value="{{ request()->get('query') }}" class="form-control"
                            id="kt_subheader_search_form" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Search Form-->
        </div>
        <!--end::Details-->
        @if(Auth::check())
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="{{ route('project.create') }}" class="btn btn-primary font-weight-bolder"><span
                    class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add Project</a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
        @endif
    </div>
</div>
<!--end::Subheader-->

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-md-12">
                @include('metronic.shared.project')
            </div>
            @endforeach
        </div>
        <!--end::Row-->

        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">
                @if($projects->lastPage() > 1)

                <a href="{{ $projects->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>

                <a href="{{ $projects->url(1) }}"
                    class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($projects->currentPage() == 1) ? ' disabled' : '' }}">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
                @for ($i = 1; $projects->lastPage() >= $i; $i++)
                <a href="{{ $projects->url($i) }}"
                    class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($projects->currentPage() == $i) ? ' active' : '' }}">{{$i}}</a>
                @endfor
                <a href="{{ $projects->url($projects->currentPage()+1) }}"
                    class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($projects->currentPage() == $projects->lastPage()) ? ' disabled' : '' }}">
                    <i class="ki ki-bold-arrow-next icon-xs"></i>
                </a>
                <a href="{{ $projects->url($projects->lastPage()) }}"
                    class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                </a>
                @endif
            </div>
            <form action="" method="get"></form>
            <div class="d-flex align-items-center">
                {{-- <select
                    class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary"
                    style="width: 75px;">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> --}}
                <span class="text-muted">Displaying {{$projects->count()}} of {{$projects->total()}} records</span>
            </div>
        </div>
        <!--end::Pagination-->
    </div>
    <!--end::Container-->
</div>
@endsection