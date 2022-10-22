@extends('app')

@section('container')
<div class="container col-sm-7 mt-5">
    <a href="/perdin" class="text-decoration-none text-dark"><span data-feather="arrow-left"></span> Kembali</a>
</div>
<div class="container d-flex justify-content-center my-5">
    <div class="card col-sm-8">
        <div class="card-header">
            <div class="card-title">
                <h4>Form Perijinan Dinas</h4>
                <p><small>silahkan melengkapi data perijinan di bawah ini</small></p>
            </div>
        </div>
        <form action="/perdin-store" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="masukkan nama lengkap" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                        <p>{{ message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Kota Tujuan</label>
                    <select name="city" id="city" class="form-select form-select-sm @error('city') is-invalid @enderror">
                        <option value="" selected disabled>Pilih kota</option>
                        @foreach( $cities as $city )
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city')
                    <div class="invalid-feedback">
                        <p>{{ message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="leaveTime" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" name="leaveTime" id="leaveTime" class="form-control form-control-sm" required>
                </div>
                <div class="mb-3">
                    <label for="arriveTime" class="form-label">Tanggal Kembali</label>
                    <input type="date" name="arriveTime" id="arriveTime" class="form-control form-control-sm" required>
                </div>

                <!-- field untuk status -->
                <input type="hidden" name="status" value="pending" >
                
                
                <label for="floatingTextarea2" class="mb-2">Keterangan</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="keterangan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2" class="mb-2">beri keterangan mengenai perijinan ini...</label>
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary btn-sm">Buat Perijinan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection