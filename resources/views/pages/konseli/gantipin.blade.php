@extends('layout.default')
@section('styles')
    <style>
        .pin-input{
            width: 32px;
            height: 32px;
        }
        .pin-input:focus{
            outline: none
        }
    </style>
@endsection
@section('content')
    <div class="row align-items-center justify-content-center py-24">
        <div class="col-sm-12 col-lg-6">
            <div class="card card-custom border">
                <div class="card-header">
                    <div class="card-title">Ganti PIN</div>
                </div>
                <div class="card-body">
                    <div class="font-size-h2 text-center mb-6">PIN Lama</div>
                    <div class="row justify-content-center">
                        @for($i=0; $i<6; $i++)
                            <input data-first=true maxlength="1" type="password" pattern="[0-9]*" inputmode="numeric" class="pin-input pin border shadow bg-white mx-2 text-center">
                        @endfor
                    </div>
                    <div class="container__confirm mt-12" style="display: none">
                        <div class="separator separator-solid mb-6"></div>
                        <div class="font-size-h2 text-center mb-6">PIN Baru</div>
                        <div class="row justify-content-center">
                            @for($i=0; $i<6; $i++)
                                <input maxlength="1" type="password" pattern="[0-9]*" inputmode="numeric" class="pin-input confirm border shadow bg-white mx-2 text-center">
                            @endfor
                        </div>
                        <div class="text-danger text-center mt-2 error_confirm"></div>
                    </div>
                    <div class="container__confirm mt-12" style="display: none">
                        <div class="separator separator-solid mb-6"></div>
                        <div class="font-size-h2 text-center mb-6">Konfirmasi PIN Baru</div>
                        <div class="row justify-content-center">
                            @for($i=0; $i<6; $i++)
                                <input maxlength="1" type="password" pattern="[0-9]*" inputmode="numeric" class="pin-input confirm border shadow bg-white mx-2 text-center">
                            @endfor
                        </div>
                        <div class="text-danger text-center mt-2 error_confirm">Konfirmasi PIN gagal</div>
                    </div>
                </div>
                <div class="card-footer" style="display: none">
                    <div class="row justify-content-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $($('input')[0]).focus();
    </script>
    @if(Hash::check('siko', $user->password))
    <script>
        $('.pin').keyup(function(){
            if(!(/^\d+$/.test($(this).val()))){
                $(this).val("")
                return false
            }
            if($(this).val().length == $(this).attr('maxlength')){
                $(this).next('.pin').focus();
            }else{
                $(this).prev('.pin').focus();
            }
            let pin = "";
            $.each($('.pin'), function(){
                pin+=($(this).val()+"")
            })
            if(pin.length == 6){
                $('.container__confirm').show();
                setTimeout(() => {
                    $($('.confirm')[0]).focus()
                }, 200);
            }else{
                $('.container__confirm').hide();
                $.each($('.confirm'), function(){
                    $(this).val("")
                })
            }
            $('.error_confirm').hide();
        })

        $('.confirm').keyup(function(){
            if(!(/^\d+$/.test($(this).val()))){
                $(this).val("")
                return false
            }
            if($(this).val().length == $(this).attr('maxlength')){
                $(this).next('.confirm').focus();
            }else{
                $(this).prev('.confirm').focus();
            }
            let confirmPin = "";
            $.each($('.confirm'), function(){
                confirmPin+=($(this).val()+"")
            })
            if(confirmPin.length == 6){
                let pin = "";
                $.each($('.pin'), function(){
                    pin+=($(this).val()+"")
                })
                if(pin == confirmPin){
                    $('.card-footer').show();
                }else{
                    $('.error_confirm').show();
                    $('.card-footer').hide();
                }
            }else{
                $('.error_confirm').hide();
                $('.card-footer').hide();
            }
        })
        $('button').click(function(){
            toastr.options = conf.toastr.options.saving;
            toastr.info("Sedang memproses data")
            let pin = "";
            $.each($('.pin'), function(){
                pin+=($(this).val()+"")
            })
            axios.post('/services/auth/pin', {
                pin
            }).then((res) => {
                console.log(res.data)
                window.location.reload();
            })
        })
    </script>
    @else
    <script>
        var loading = false
        $('.pin').keyup(function(){
            if(!(/^\d+$/.test($(this).val()))){
                $(this).val("")
                return false
            }
            if(loading){
                return false;
            }
            $('.error_too_many_attemps').hide();
            $('.error_confirm').hide()
            if($(this).val().length == $(this).attr('maxlength')){
                $(this).next('.pin').focus();
            }else{
                $(this).prev('.pin').focus();
            }
            let pin = "";
            $.each($('.pin'), function(){
                pin+=($(this).val()+"")
            })
            if(pin.length == 6){
                loading = true;
                toastr.options = conf.toastr.options.saving;
                toastr.info("Sedang memproses data")
                axios.post('/services/auth/pin', {
                    pin
                }).then((res) => {
                    toastr.clear()
                    if(res.data.success){
                        window.location.reload()
                    }else{
                        $.each($('input'), function(){
                            $(this).val("")
                        })
                        $($('input')[0]).focus()
                        $('.error_confirm').show()
                    }
                    loading = false;
                }).catch((err) => {
                    loading = false;
                    console.log({...err})
                    if(err.response.status === 429){
                        $.each($('input'), function(){
                            $(this).val("")
                        })
                        $($('input')[0]).focus()
                        $('.error_too_many_attemps').show();
                    }
                })

            }else{
                $('.container__confirm').hide();
                $.each($('.confirm'), function(){
                    $(this).val("")
                })
            }
        })
    </script>
    @endif
@endsection