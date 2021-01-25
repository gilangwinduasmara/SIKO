{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @php($k = 's')
    {{-- Dashboard 1 --}}
    <div class="container">
        <!--begin::Chat-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin:Search-->
                        <div class="input-group input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Search.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                            </div>
                            <input id="input__cari" type="text" class="form-control py-4 h-auto" placeholder="Cari">
                        </div>
                        <div class="mt-7">
                            <table id="table_list">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konselors as $konselor)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-between mb-5">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-circle symbol-50 mr-3">
                                                            <img class="img-fit" alt="Pic" src={{"/avatars/".$konselor->user->avatar}}>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a name="list-konselor" data-value={{$konselor->id}} data id={{"daftarkonselor__".$konselor->id}} href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{$konselor->nama_konselor}}</a>
                                                            <span class="text-muted font-weight-bold font-size-sm">{{ $konselor->profesi_konselor }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-row-fluid ml-lg-8 py-10" id="kt_chat_content">
                <a href="/admin/konselor/tambah" class="btn btn-warning">Tambah Konselor</a>
                <div class="card card-custom border mt-8" id="konselor-wrapper">

                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script>
        var konselors = @json($konselors)
        {{--var konselings = @json($konselings);--}}
        {{--var selectedKonselingDetail = konselings[0];--}}
        {{--var selectedKonseling = konselings[0].id;--}}
    </script>
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/chat/chat.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/dropdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/list.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/personalinformation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/app.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("#table_list").on("click", 'a[name="list-konselor"]', function(){
                const konselor_id = $(this).data('value')
                const konselor = konselors.filter((o, i) => (o.id === konselor_id))[0]
                console.log(konselor)
                const html = `
                    <div class="card border card-custom p-8 ">
                        <div class="d-flex align-items-center rounded-top">
                            <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
                                <img src="/avatars/${konselor.user.avatar}" alt="" style="object-fit: cover"/>
                            </div>
                            <div class="flex-grow-1">
                            <div class="text-dark m-0 mr-3 font-size-h5">${konselor.nama_konselor}</div>
                                <div class="text-muted">${konselor.profesi_konselor}</div>
                            </div>
                            <a href="/admin/konselor/edit/${konselor.id}"><span class="btn btn-clean btn-hover-light-warning btn-sm btn-icon"><i class="fas fa-pen"></i></span></a>
                        </div>
                        <div class="py-9">
                            <div class="d-flex align-items-center mb-2">
                                <span class="font-weight-bold mr-2">Email:</span>
                                <a href="#" class="text-muted text-hover-primary">${konselor.user.email}</a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="font-weight-bold mr-2">Phone:</span>
                                <span class="text-muted">${konselor.no_hp_konselor}</span>
                            </div>
                        </div>
                    </div>
                `
                $('#konselor-wrapper').html(html)
            });
        })
    </script>
@endsection