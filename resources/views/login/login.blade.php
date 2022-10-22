@extends('app')

@section('container')
<form action="/login" method="post">
    @csrf
        <div class="container d-flex justify-content-center" style="margin-top: 50px;">
            <div class="col-sm-4">
                @if( session('success') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> silahkan login sebagai admin.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if( session('loginError') )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('loginError') }}</strong>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if( session('logoutSuccess') )
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('logoutSuccess') }}</strong> terimakasih untuk hari ini.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <img class="mb-4 mt-5" src="/img/logo.png" alt="logo-perusahaan" width="250">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" style="border-radius: 5px 5px 0px 0px;" id="floatingInput" placeholder="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3" style="margin-bottom: 2px;">
                    <input type="password" name="password" class="form-control" style="border-radius: 0px 0px 5px 5px;" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="from-check mb-5">
                    <input type="checkbox" id="cekPass" class="form-check-input">
                    <label for="cekPass" class="form-check-label">show password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <div class="text-center mt-3">
                    <small class="text-center">Belum punya akun? Silahkan <a href="/regis" class="text-decoration-none" id="nav">Registrasi</a></small>
                </div>
            </div>
        </div>
    </form>

    <script>
        const pass = document.getElementById('floatingPassword');
        let show = document.getElementById('cekPass');
        show.setAttribute('data', 0);

        document.getElementById('cekPass').addEventListener('click', function(){
            

            data = show.getAttribute('data');
            
            
            if( data == '0' ){
                pass.setAttribute('type', 'text');
                data = Number(data) + 1;
            }else if( data == '1' ){
                pass.setAttribute('type', 'password');
                data = Number(data) - 1;
            }

            show.setAttribute('data', data);


        });
    </script>
@endsection
