@extends('app')

@section('container')
    @include('navbar')
    <div class="container">

        <p id="auth" style="color: white;">{{ auth('administrator')->user()->username }}</p>

        <a href="/perdin-create" class="mt-2 mb-3 text-decoration-none btn btn-primary">Buat Perijinan</a>
        @if( session('success') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong> Perijinan telah dibuat.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if( session('delSuccess') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('delSuccess') }}</strong> Perijinan telah dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if( session('update') )
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('update') }}</strong> Perijinan telah diubah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="" method="get">
            <div class="mb-3 d-flex justify-content-end">
                <input style="width: 40%;" type="text" value="{{ Request('search') }}" name="search" id="search" placeholder="nama karyawan" class="form-control">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
        <div class="card">
            <div class="card-header p-3">
                <h4 class="text-center">Daftar Perijinan Dinas</h4>
                <p class="text-center"><small>perubahan data harus melalui persetujuan direktur</small></p>
            </div>
            <div class="card-body">
                @if( $datas->count() == 0 )
                <div class="text-center">
                    <p>No data found</p>
                </div>
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Tujuan Kota</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $datas as $data )
                        <tr>
                            <td>{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->city }}</td>
                            <td>{{ date('d/m/Y', strtotime($data->leaveTime) ) }} <span data-feather="arrow-right"></span> {{ date('d/m/Y', strtotime($data->arriveTime) ) }}</td>
                            @if( $data->status == 'pending' )
                            <td><p class="badge text-bg-warning">{{ $data->status }}</p></td>
                            @elseif( $data->status == 'approved' )
                            <td><p class="badge text-bg-success">{{ $data->status }}</p></td>
                            @else
                            <td><p class="badge text-bg-danger">{{ $data->status }}</p></td>
                            @endif
                            <td>
                                <a href="/perdin-show/{{ $data->id }}" class="btn btn-info btn-sm text-light"><span data-feather="eye"></span></a>
                                <a href="/perdin-update/{{ $data->id }}" class="btn btn-warning btn-sm text-light"><span data-feather="edit"></span></a>
                                <button class="btn btn-danger btn-sm" id="del" onclick="modal('{{ $data->id }}', '{{ $data->name }}')" data-url="/perdin-delete/"><span data-feather="trash-2"></span></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                {{ $datas->links() }}
            </div>
        </div>
    </div>


    <!-- here the pop up modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/" method="get" id="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span data-feather="trash-2"></span>Hapus Perijinan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="close" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" id="submit" data-bs-dismiss="modal">Hapus</button>
                    <button type="button" class="btn btn-secondary" id="cancel">Batalkan</button>
                </div>
            </div>
        </form>
    </div>
    </div>

    <script>

        $(document).ready(function(){

            let val = document.getElementById('auth').innerText;
            alert('Selamat Datang! ' + val);

        });

        function modal(id, name){

            let url = document.getElementById('del').getAttribute('data-url');
            url = url + id;

            let modalBody = document.getElementsByClassName('modal-body');
            modalBody[0].innerHTML = 'Anda yakin ingin menghapus perijinan atas nama <strong>' + name + '</strong>';

            $('#form').attr('action', url);

           
            $('#exampleModal').modal('show');

            
            
        }

        document.getElementById('submit').addEventListener('click', function(){

            $('#close').click();
        });
        document.getElementById('cancel').addEventListener('click', function(){

            $('#close').click();
        });




    </script>
@endsection
