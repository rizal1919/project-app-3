@extends('app')

@section('container')
    <div class="container mt-5 d-flex">
        <div class="col-sm-6" style="margin: 0px auto;">
            <div>
                <a href="/perdin" class="text-decoration-none text-dark"><span data-feather="arrow-left"></span> Kembali</a>
            </div>
            <div class="card mt-5">
                <div class="card-header text-center p-4">
                    <h4>Form Perijinan</h4>
                    <p><small>Legalitas surat ini berlaku selama masa waktu yang tertera</small></p>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Nama Karyawan :</strong> {{ $data->name }}</li>
                        <li><strong>Tujuan Dinas :</strong> {{ $data->city }}</li>
                        <li><strong>Jadwal Perjalanan :</strong> {{ date('d/m/y', strtotime( $data->leaveTime ) ) }} <span data-feather="arrow-right"></span> {{ date('d/m/y', strtotime( $data->arriveTime ) ) }}</li>
                        <li><strong>Status :</strong> <span class="badge text-bg-primary">{{ $data->status }}</span></li>
                        <li><strong>Keterangan :</strong> {{ $data->keterangan }}</li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
@endsection