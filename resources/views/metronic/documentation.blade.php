@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        @if (app()->getLocale() == 'id')
        <h1 class="mb-8">Data dan Dokumentasi API</h1>
        <h3>Output Data</h3>
        <p>Output data yang dihasilkan berdasarkan format <a href="https://standard.open-contracting.org/infrastructure"
                target="_blank">OC4IDS</a>.</p>
        <h3>API OC4IDS</h3>
        <p>API OC4IDS dapat diakses melalui tautan berikut <a href="{{ url('oc4ids') }}"
                target="_blank">{{ url('oc4ids') }}</a>.</p>
        <h3>GitHub</h3>
        <p>Detail Dokumentasi API dapat diakses melalui repositori <a
                href="https://github.com/costwestlombok/costwestlombok" target="_blank">GitHub</a> kami.</p>
        @else
        <h1 class="mb-8">Data and API Documentation</h1>
        <h3>Data Outputs</h3>
        <p>Data output is based on <a href="https://standard.open-contracting.org/infrastructure"
                target="_blank">OC4IDS</a> format.</p>
        <h3>OC4IDS API</h3>
        <p>OC4IDS API can be generated on this link <a href="{{ url('oc4ids') }}"
                target="_blank">{{ url('oc4ids') }}</a>.</p>
        <h3>GitHub</h3>
        <p>Detailed of API Documentation is on our <a href="https://github.com/costwestlombok/costwestlombok"
                target="_blank">GitHub</a> repositories.</p>
        @endif
    </div>
    <!--end::Container-->
</div>
@endsection