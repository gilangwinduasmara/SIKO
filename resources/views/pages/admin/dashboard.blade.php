{{-- Extends layout --}}
@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-xxl-6">
            <div class="card border card-custom p-8 ">

            </div>
        </div>

        <div class="col-lg-6 col-xxl-4">
        </div>
    </div>
    <div class="row mt-8">

    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/dropdown.js') }}" type="text/javascript"></script>

@endsection
