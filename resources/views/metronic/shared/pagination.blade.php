<!--begin::Pagination-->
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrap mr-3">
        @if($data->lastPage() > 1)
        <a href="{{ $data->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"
            {{ ($data->currentPage() == 1) ? ' disabled' : '' }}>
            <i class="ki ki-bold-double-arrow-back icon-xs"></i>
        </a>
        <a href="{{ $data->url($data->currentPage() - 1) }}"
            class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
            <i class="ki ki-bold-arrow-back icon-xs"></i>
        </a>
        @if($data->total() >= 4)
        @if($data->total() / 2 >= $data->currentPage() && $data->currentPage() > 2)
        <a href="{{ $data->url($data->currentPage() - 1) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == $data->currentPage() - 1) ? ' active' : '' }}">{{ $data->currentPage() - 1 }}</a>
        <a href="{{ $data->url($data->currentPage()) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == $data->currentPage()) ? ' active' : '' }}">{{ $data->currentPage() }}</a>
        @else
        <a href="{{ $data->url(1) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == 1) ? ' active' : '' }}">1</a>
        <a href="{{ $data->url(2) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == 2) ? ' active' : '' }}">2</a>
        @endif
        <a href="javascript:;" class="btn btn-icon btn-sm border-0 mr-2 my-1">...</a>
        @if($data->currentPage() > $data->total() / 2 && $data->lastPage() - 1 >
        $data->currentPage())
        <a href="{{ $data->url($data->currentPage()) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == $data->currentPage()) ? ' active' : '' }}">{{ $data->currentPage() }}</a>
        <a href="{{ $data->url($data->currentPage() + 1) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == $data->currentPage() + 1) ? ' active' : '' }}">{{ $data->currentPage() + 1 }}</a>
        @else
        <a href="{{ $data->url($data->lastPage() - 1) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == $data->lastPage() - 1) ? ' active' : '' }}">{{ $data->lastPage() - 1 }}</a>
        <a href="{{ $data->url($data->lastPage()) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == $data->lastPage()) ? ' active' : '' }}">{{ $data->lastPage() }}</a>
        @endif
        @else
        @for ($i=1; $data->lastPage() >= $i; $i++)
        <a href="{{ $data->url($i) }}"
            class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($data->currentPage() == $i) ? ' active' : '' }}">{{$i}}</a>
        @endfor
        @endif
        <a href="{{ $data->url($data->currentPage()+1) }}"
            class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
            <i class="ki ki-bold-arrow-next icon-xs"></i>
        </a>
        <a href="{{ $data->url($data->lastPage()) }}"
            class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
            <i class="ki ki-bold-double-arrow-next icon-xs"></i>
        </a>
        @endif
    </div>
    @if($data->total())
    <div class="d-flex align-items-center">
        <span class="text-muted">{{ __('labels.displaying') }} {{$data->count()}} {{ __('labels.of') }}
            {{$data->total()}} {{ __('labels.records') }}</span>
    </div>
    @endif
</div>
<!--end::Pagination-->