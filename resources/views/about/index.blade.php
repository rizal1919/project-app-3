@extends('app')

@section('container')
    @include('navbar')

    <div class="container">
        <h3 class="my-3 text-center">Tentang Aplikasi</h3>
        <h6 class="mb-2">PERDIN - PERIJINAN DINAS</h6>
        <p class="mb-3">Studi kasus sederhana yang dibuat adalah bertujuan untuk melakukan pendataan terhadap karyawan yang akan melakukan kunjungan dinas ke luar kota. Dalam kasus ini dikhususnya hanya untuk kota-kota di Jawa Timur. Fetch data kota-kota tidak dilakukan secara manual melainkan menggunakan API dari https://emsifa.github.io/api-wilayah-indonesia/api.</p>

        <h6 class="mb-2">FITUR</h6>
        <p class="mb-3">Terdapat beberapa fitur sederhana untuk dapat berinteraksi dengan sistem ini.</p>
        <ul class="mb-5">
            <li><strong>Login : </strong>fitur awal yang digunakan untuk mengotentikasi admin yang akan masuk ke sistem.</li>
            <li><strong>Registrasi : </strong>fitur untuk siapapun yang belum memiliki kredensial untuk masuk ke sistem, dapat mendaftarkan username dan password nya.</li>
            <li><strong>Create : </strong>fitur ini akan mengarahkan ke sebuah halaman pembuatan perijinan dan selanjutnya akan disimpan ke database</li>
            <li><strong>Read : </strong>fitur ini tersedia dibagian tabel bertanda mata dengan button yang tersedia. Fitur ini dapat menampilkan informasi detail dari perijinan yang telah dibuat</li>
            <li><strong>Update : </strong>fitur ini berfungsi untuk melakukan perubahan jika ada yang perlu diubah dari data yang telah dibuat</li>
            <li><strong>Delete : </strong>fitur ini berguna untuk menghapus perijinan yang telah dibuat dari database</li>
            <li><strong>Navbar : </strong>fitur ini berfungsi sebagai navigator halaman berisikan tombol logout dan about</li>
        </ul>
        
        <a href="/perdin" class="text-decoration-none btn btn-dark">Kembali</a>



    </div>
@endsection