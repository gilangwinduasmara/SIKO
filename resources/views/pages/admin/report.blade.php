{{-- Extends layout --}}
@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col-xxl-12">
            @if(request()->detail)
            @include('pages.admin._report-detail')
            @else
            @include('pages.admin._report-presensi')
            @endif
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/dropdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/dt.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){


            $('#datepicker_dari').datepicker({
                rtl: KTUtil.isRTL(),
                clearBtn: true
            });
            $('#datepicker_sampai').datepicker({
                rtl: KTUtil.isRTL(),
                clearBtn: true
            });

            $('button[name="toggle-rk"]').click(function(e){
                e.preventDefault();
                $('#modal__rk').modal('show');
            })
            $('[name="toggle-detail"]').click(function(e){
                e.preventDefault();
                $('#modal__detail').modal('show');
            })

        })
    </script>
@endsection
