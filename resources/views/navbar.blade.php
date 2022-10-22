<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4">Welcome Admin</h5>
    <span class="text-muted">Aplikasi Perijinan Dinas Karyawan.</span>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
        <li class="nav-item">
          <a class="nav-link active" id="nav" href="/about">About</a>
        </li>
        <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
            <!-- <a class="nav-link active" id="nav" href="#">Logout</a> -->
            <button class="nav-link text-bg-dark border border-0" id="nav">Logout</button>
          </form>
      </li>
    </ul>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>