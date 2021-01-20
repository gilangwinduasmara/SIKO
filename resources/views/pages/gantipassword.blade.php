{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
   <div class="row justify-content-center py-8">
       <div class="col-xl-6">
           <div class="card card-custom border">
               <div class="card-header">
                   <div class="card-title">
                       <div class="text-size-h4">
                            Ganti Password
                       </div>
                   </div>
               </div>
               <form class="card-body" id="form__gantipasword">
                   <div class="form-group">
                       <label>Password lama</label>
                       <input name="oldpassword" type="password" required class="form-control">
                       <span class="text-danger"></span>
                   </div>
                   <div class="form-group">
                       <label>Password baru</label>
                       <input name="newpassword" type="password" required class="form-control">
                       <span class="text-danger"></span>
                   </div>
                   <div class="form-group">
                       <label>Ulangi password</label>
                       <input name="repeatpassword" type="password" required class="form-control">
                       <span class="text-danger"></span>
                   </div>
                   <input type="submit" class="btn btn-warning" value="Simpan">
                </form>
           </div>
       </div>
   </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/dropdown.js') }}" type="text/javascript"></script>
    <script src="{{asset('js/src/app.js')}}"></script>
    <script>
        $(()=>{
            $('#form__gantipasword > ').submit((e)=>{
                e.preventDefault();
            })
            $('input[name="oldpassword"]').keyup(function(){
                console.log($(this).val())
                if($(this).val().length < 8){
                    $(this).next().text("tes")
                }else{
                    $(this).next().text("")
                }
            })

            $('input[name="newpassword"]').keyup(function(){
                console.log($(this).val())
                if($(this).val().length < 8){
                    $(this).next().text("tes")
                }else{
                    $(this).next().text("")
                }
            })

        })
    </script>
@endsection
