{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    @php($konseli = $user->details)
    <div class="row">
        <div class="col">
            <div id={{"personal_information__"}} >
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex mb-9">
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img src={{{"/avatars/".$user->avatar}}} alt="image">
                                </div>
                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                    <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between flex-wrap mt-1">
                                    <div class="d-flex mr-3">
                                        <a href="#"
                                           class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$konseli->nama_konseli}}</a>

                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between mt-1">
                                    <div class="flex-grow-1">
                                        <div class="row">
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{$konseli->nim}}</a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{$konseli->jenis_kelamin}}</a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{'Agama: '.$konseli->agama}}</a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{'Alamat: '}}</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{$konseli->progdi}}</a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{$konseli->tgl_lahir_konseli}}</a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{'Suku: '.$konseli->suku}}</a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#"
                                                   class="text-dark-50 text-hover-primary font-weight-bold">{{$konseli->alamat_konseli}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if($konseling!=null)

                            <div class="separator separator-solid my-8"></div>

                            <div class="d-flex align-items-center flex-wrap mt-8">
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2 flex-grow-1">
                                    <a name={{"konseli__ruangkonseling"}} href="/ruangkonseling"
                                            class="btn btn-warning btn-shadow-hover font-weight-bolder w-100 py-3">Ruang Konseling
                                    </a>
                                </div>
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2 flex-grow-1">
                                    <button
                                        {{$konseling->conferenced == "ask"?:"disabled"}}
                                        name={{"konseli__caseconference"}} href={{"/setup/caseconference?id="}} class="btn
                                        btn-warning btn-shadow-hover font-weight-bolder w-100 py-3">Case Conference</button>
                                </div>
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2 flex-grow-1">
                                    <button name={{"konseli__referral"}} {{$konseling->refered == "ask"?:"disabled"}} id={{"personal_information__referal_"}} class="btn btn-warning btn-shadow-hover font-weight-bolder w-100 py-3">Referal</button>
                                </div>
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2 flex-grow-1">
                                    <button data-toggle="modal" data-target="#modal__close_case" href="#"
                                            class="btn btn-warning btn-shadow-hover font-weight-bolder w-100 py-3">Close Case
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <script>
            </script>

        </div>
    </div>
    <div class="row mt-12">
        @if($konseling==null)
            <div class="col d-flex flex-column align-items-center justify-content-center0">
                <div class="h1 text-center">
                    KAMU SEDANG TIDAK ADA SESI KONSELING
                </div>
                <div class="h3 text-center my-8">
                    Bagikan kecemasan dan masalahmu dengan konselor yang kamu percaya
                </div>
                <div>
                    <a href="/daftarsesi"
                            class="btn btn-warning btn-shadow-hover font-weight-bolder w-100 py-3">Daftar Sesi
                    </a>
                </div>
            </div>
        @else
            <div class="col d-flex flex-column align-items-center justify-content-center">
                <div class="h1 text-center">
                    KAMU SEDANG TERDAFTAR KONSELING DENGAN
                </div>
                <div class="h3 text-center mt-8">
                    {{$konseling->konselor->nama_konselor}}
                </div>
                <div class="h4 mt-8">{{$konseling->jadwal->hari.", ".$konseling->jadwal->jam_mulai.":00-".$konseling->jadwal->jam_akhir.":00"}}</div>
                    <span class="text-center">
                        Kamu bisa konseling sesuai jadwal yang telah dipilih dan mengirim pesan kapanpun melalui
                        <a class="text-warning text-hover-warning"
                            href="/ruangkonseling">Ruang Konseling</a>
                    </span>
            </div>
        @endif

        <div class="modal fade" id="modal__close_case" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Akhiri Sesi Konseling</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>Anda yakin ingin mengakhiri sesi konseling?</div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-light-warning font-weight-bold">Tolak</button>
                        <button id="button__close_case" type="button" class="btn btn-warning font-weight-bold">Setuju</button>
                    </div>
                </div>
            </div>
        </div>

        @if ($konseling!=null)
        @if($konseling->conferenced == "ask")
        <div class="modal fade" id="modal__case_conference" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pernyataan Persetujuan Case Conference</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>Saya menyetujui dan mengijinkan Konselor saya untuk mendiskusikan kasus saya saat ini dengan Konselor lain. Pernyataan ini saya buat tanpa ada paksaan dari pihak manapun.</div>
                    </div>
                    <div class="modal-footer">
                        <button id="button_caseconference__decline" type="button" class="btn btn-light-warning font-weight-bold">Tolak</button>
                        <button id="button_caseconference__agree" type="button" class="btn btn-warning font-weight-bold">Setuju</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($konseling->refered == "ask")
        <div class="modal fade" id="modal__referral" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pernyataan Persetujuan Referral</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>Saya menyetujui dan mengijinkan Konselor saya untuk merujuk saya ke Konselor lain. Pernyataan ini saya buat tanpa ada paksaan dari pihak manapun.</div>
                    </div>
                    <div class="modal-footer">
                        <button id="button_referral__decline" type="button" class="btn btn-light-warning font-weight-bold">Tolak</button>
                        <button id="button_referral__agree" type="button" class="btn btn-warning font-weight-bold">Setuju</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif

    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        var konseling = @json($konseling);
    </script>
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/dropdown.js') }}" type="text/javascript"></script>
    <script src="{{asset('js/src/app.js')}}"></script>
@endsection
