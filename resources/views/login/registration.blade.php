@extends('app')

@section('container')
<form action="/regis" method="post">
    @csrf
    <div class="container col-sm-3" style="margin-top: 100px;">
        <h2 class="mb-3 mt-5 text-center">Pendaftaran Akun</h2>
        <div class="form-floating" >
            <input type="text" style="border-radius: 5px 5px 0px 0px;" name="username" id="username" class="form-control" placeholder="username">
            <label for="username">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" style="border-radius: 0px 0px 5px 5px;" id="password" class="form-control" placeholder="password">
            <label for="password">Password</label>
        </div>
        <div class="from-check mb-5">
            <input type="checkbox" id="cekPass" class="form-check-input">
            <label for="" class="form-check-label">show password</label>
        </div>
        <div class="row g-1">
            <a href="/" class="col-sm-2 text-decoration-none btn btn-dark mx-2"><span data-feather="arrow-left"></span></a>
            <button class="col-sm-9 btn btn-primary">Daftar</button>
        </div>
    </div>
</form>

    <script>

        const pass = document.getElementById('password');
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