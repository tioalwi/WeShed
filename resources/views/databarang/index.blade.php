<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Barang</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
  <body class="bg-light">
    <div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
    <main class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1>Data Barang</h1>
            </div>
            <div class="col-lg-3 ml-2">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='' class="btn btn-primary tomboltambah">+ Tambah Data</a>
                </div>
            </div>
        </div>
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <table id="tabledatabarang" class="table table-striped{
                    processing: true,
                    serverside: true,
                    ajax: "{{ url('routedatabarang')}}",
                    columns: [{
                        data: 'sku',
                        name: 'SKU'
                    },{

                    }]
                }">
                    <thead>
                        <tr>
                            <th class="col-md-1">NO</th>
                            <th class="col-md-5">SKU</th>
                            <th class="col-md-4">Nama Barang</th>
                            <th class="col-md-4">Varian</th>
                            <th class="col-md-4">Jumlah</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anton</td>
                            <td>anton@gmail.com</td>
                            <td>
                                <a href='' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Del</a>
                            </td>
                        </tr>
                    </tbody> --}}
                </table>
          </div>
          <!-- AKHIR DATA -->
    </main>
    <!-- Modal -->
<!-- Modal -->
    <div class="modal fade" id="modaldatabarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- START FORM -->
                    <div class="alert alert-danger d-none"></div>
                    <div class="alert alert-success d-none"></div>

                    <div class="mb-3 row">
                        <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='sku' id="sku">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nm_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nm_barang' id="nm_barang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="varian" class="col-sm-2 col-form-label">Varian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='varian' id="varian">
                        </div>
                    </div>
                    {{-- <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jumlah' id="jumlah">
                        </div>
                    </div> --}}
                    <!-- AKHIR FORM -->
                </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary tombol-simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
        </div>
        <!--SIDEBAR-->
    <div class="sidebar" id="idsidebar">
    <div class="title_sidebar">
        <h3>WESHED</h3>
    </div>
    <div class="profile">
        <img src="img/admin.jpg" alt="profile_picture">
        <span class="nama"> Ryan Alwi Agustian</span>
        <span class="jabatan">Weshed Man</span>
    </div>
    <ul class="sidebar_list">
        <li class="active">
            <a href="/">
                <span class="icons"><i class="fas fa-home"></i></span>
                <span class="items">Data Barang</span>
            </a>
        </li>
        <li class="dropdown">
            <a href="#">
                <span class="icons"><i class="fas fa-desktop"></i></span>
                <span class="items">Tambah Zona<i style="margin-left: 20px;" class="fa fa-caret-down rotate"></i></span>
            </a>
        </li>
        <div class="isidropdown">
            <li>
                <a href="{{url ('zonarak')}}">
                    <span class="items">Tambah Zona Rak</span>
                </a>
            </li>
            <li>
                <a href="{{url ('zonagudang')}}">
                    <span class="items">Tambah Zona Gudang</span>
                </a>
            </li>
        </div>
        <li>
            <a href="/zonagudang">
                <span class="icons"><i class="fas fa-user-friends"></i></span>
                <span class="items">Zona Gudang</span>
            </a>
        </li>
        <li>
            <a href="/zonarak">
                <span class="icons"><i class="fas fa-tachometer-alt"></i></span>
                <span class="items">Zona Rak</span>
            </a>
        </li>
        <li>
            <a href="/barangmasuk">
                <span class="icons"><i class="fas fa-database"></i></span>
                <span class="items">Barang Masuk</span>
            </a>
        </li>
        <li>
            <a href="/historypaket">
                <span class="icons"><i class="fas fa-chart-line"></i></span>
                <span class="items">History Paket Keluar</span>
            </a>
        </li>
        <li>
            <a href="/barangkeluar">
                <span class="icons"><i class="fas fa-user-shield"></i></span>
                <span class="items">Barang Keluar</span>
            </a>
        </li>
        <li>
            <a href="/itemreject">
                <span class="icons"><i class="fas fa-cog"></i></span>
                <span class="items">Item Reject</span>
            </a>
        </li>
    </ul>
</div>
    </div>
  </body>
@include('databarang.scriptjs');
</html>