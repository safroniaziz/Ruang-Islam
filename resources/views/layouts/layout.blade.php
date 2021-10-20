<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ruang Islam </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/puse-icons-feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">

  <!-- Font Awesome -->
  <link href="{{ asset('assets/vendors/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="container d-flex flex-row nav-top">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top">
            <a class=" brand-logo" style="font-size: 27px; text-align:center; margin-top:10px;;">
                <b>Ruang </b>Islam
            </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="btn btn-primary" href="{{ route('login') }}" id="UserDropdown" href="#"><i class="fa fa-sign-in"></i>&nbsp;Login
              </a>
            </li>
          </ul>
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel container">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin d-none d-lg-block">
              <div class="intro-banner">
                <div class="banner-image">
                  <img src="{{ asset('assets/images/masjid.png') }}" style="height: 150px;" alt="banner image">
                </div>
                <div class="content-area">
                  <h3 class="mb-0">Selamat Datang</h3>
                  <p class="mb-0">Temukan istilah-istilah dalam Islam yang belum kamu ketahui</p>
                  <p class="mb-0" style="text-align: right">
                    "Allah akan mengangkat derajat orang-orang yang beriman dan orang-orang yang berilmu di antara kamu sekalian." (Q.S Al-Mujadilah: 11)
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body pb-0">
                  <p class="text-muted">Semua Istilah</p>
                  <div class="d-flex align-items-center">
                    <h4 class="font-weight-semibold">{{ $semua }}</h4>
                    <h6 class="text-success font-weight-semibold ml-2">({{ $psemua }}%)</h6>
                  </div>
                  <small class="text-muted">Total dan Persentase</small>
                </div>
                <canvas class="mt-2" height="40" id="statistics-graph-1"></canvas>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body pb-0">
                  <p class="text-muted">Istilah Ekonomi Islam</p>
                  <div class="d-flex align-items-center">
                    <h4 class="font-weight-semibold">{{ $pendidikan }}</h4>
                    <h6 class="text-danger font-weight-semibold ml-2">({{ $ppendidikan }}%)</h6>
                  </div>
                  <small class="text-muted">Total dan Persentase</small>
                </div>
                <canvas class="mt-2" height="40" id="statistics-graph-3"></canvas>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body pb-0">
                  <p class="text-muted">Istilah Pendidikan Islam</p>
                  <div class="d-flex align-items-center">
                    <h4 class="font-weight-semibold">{{ $ekonomi }}</h4>
                    <h6 class="text-success font-weight-semibold ml-2">({{ $pekonomi }}%)</h6>
                  </div>
                  <small class="text-muted">Total dan Persentase</small>
                </div>
                <canvas class="mt-2" height="40" id="statistics-graph-2"></canvas>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body pb-0">
                  <p class="text-muted">Istilah Gelar Islam</p>
                  <div class="d-flex align-items-center">
                    <h4 class="font-weight-semibold">{{ $gelar }}</h4>
                    <h6 class="text-success font-weight-semibold ml-2">(){{ $pgelar }}%)</h6>
                  </div>
                  <small class="text-muted">Total dan Persentase</small>
                </div>
                <canvas class="mt-2" height="40" id="statistics-graph-4"></canvas>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 d-flex flex-column">
                      <div class="d-flex align-items-center">
                        <h4 class="card-title mb-0">Cari Istilah Islam Di sini</h4>
                      </div>
                    </div>
                    <div class="col-md-12 mt-4">
                      <div class="form-group">
                        <label for="" class="form-label">Filter Istilah Per Kategori :</label>
                        <select name="filterkategori" class="form-control" id="filterkategori">
                          <option selected="selected">-- Filter Kategori --</option>
                          @foreach ($kategoris as $kategori)
                              <option value="{{ $kategori->nm_kategori }}">{{ $kategori->nm_kategori }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-12 table-responsive">
                      <table id="table" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Istilah</th>
                            <th>Kategori</th>
                            <th>Arti</th>
                            <th>Deskripsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $no=1;
                          @endphp
                         @foreach ($istilahs as $istilah)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $istilah->nm_istilah }}</td>
                            <td>{{ $istilah->nm_kategori }}</td>
                            <td>{{ $istilah->arti }}</td>
                            <td>
                              <a onclick="lihatDeskripsi({{ $istilah->id }})" class="btn btn-primary" style="padding: 10px; color:white"><i class="fa fa-info-circle"></i>Lihat Deskripsi</a>
                            </td>
                          </tr>
                         @endforeach
                        </tbody>
                      </table>
                      <div class="modal fade" id="modaldeskripsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="juduldeskripsi"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p id="isimodal" style="text-align: justify">

                              </p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 <a href=""
                target="_blank">Ruang Islam (Shinta Lestari Oktarini)</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a>Programmer : Safroni Aziz Suprianto </a>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/shared/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
  <script src="{{ asset('assets/js/shared/settings.js') }}"></script>
  <script src="{{ asset('assets/js/shared/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/shared/widgets.js') }}"></script>
  <script src="{{ asset('assets/js/demo_2/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/demo_2/script.js') }}"></script>
  <!-- End custom js for this page-->

  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/shared/data-table.js') }}"></script>
  <!-- End custom js for this page-->
  <script>
    var table = $('#table').DataTable( {
} );
$('#filterkategori').change(function() {
            table.columns(2)
            .search(this.value)
            .draw();
        });

  function lihatDeskripsi(id){
    $.ajax({
                url: "{{ url('cari_istilah') }}"+'/'+ id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modaldeskripsi').modal('show');
                    $('#juduldeskripsi').text("Deskripsi "+data.nm_istilah);
                    var $isimodal = $( "#isimodal" ),
                      str = data.keterangan,
                      html = jQuery.parseHTML( str ),
                      nodeNames = [];
                      
                    $isimodal.append( html );
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
  }
  </script>
</body>

</html>