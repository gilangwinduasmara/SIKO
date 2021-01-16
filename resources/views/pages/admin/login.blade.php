@extends('layout.default')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6">
            <form class="card card-custom">
                <div class="card-header">
                    <div class="card-title">Login sebagai admin</div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input name="username" type="username" class="form-control"  placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control"  placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-warning" type="submit" class="form-control"  value="Login"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('.header').hide();
</script>
@endsection
