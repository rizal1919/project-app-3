@extends('app')

@section('container')
<div class="container d-flex justify-content-center my-5">
    <div class="card col-sm-8">
        <div class="card-header">
            <div class="card-title">
                <h4>Form Perijinan Dinas</h4>
                <p><small>silahkan melengkapi data perijinan di bawah ini</small></p>
            </div>
        </div>
        <form action="/perdin-update/{{ $data->id }}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" value="{{ old('name', $data->name) }}" name="name" placeholder="masukkan nama lengkap" id="name" class="form-control form-control-sm">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Kota Tujuan</label>
                    <select name="city" id="city" class="form-select form-select-sm">
                        <!-- <option value="" selected disabled>Pilih kota</option> -->
                        @foreach( $cities as $city )
                            @if( $data->city == $city->name )
                            <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                            @else
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="leaveTime" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" name="leaveTime" value="{{ old('leaveTime', $data->leaveTime) }}" id="leaveTime" class="form-control form-control-sm">
                </div>
                <div class="mb-3">
                    <label for="arriveTime" class="form-label">Tanggal Kembali</label>
                    <input type="date" name="arriveTime" value="{{ old('arriveTime', $data->arriveTime) }}" id="arriveTime" class="form-control form-control-sm">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Tanggal Kembali</label>
                    <select name="status" id="status" class="form-select form-select-sm @error('status') is-invalid @enderror">
                        <option value="" selected disabled>Status</option>
                        <option value="pending">pending</option>
                        <option value="approved">approved</option>
                        <option value="rejected">rejected</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <label for="floatingTextarea2" class="mb-2">Keterangan</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="keterangan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required>{{ $data->keterangan }}</textarea>
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