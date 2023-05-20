@extends('backend/layouts.template')

@section('content')
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="robots" content="noindex,nofollow" />
    <title>Data Admin</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('backend/assets/images/favicon.png') }}"
    />
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('backend/assets/extra-libs/multicheck/multicheck.css') }}"
    />
    <link
      href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet" />
   
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Admin</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          
              <div class="card">
                <div class="card-body">
                  {{-- <h5 class="card-title">Basic Datatable</h5> --}}

                  <a href="{{ route('data_admin.create') }}" class="card-title">
                    <button type="button" class="btn btn-primary">
                      <i class="mdi mdi-plus-box-outline"></i>
                      Tambah Data
                    </button>
                  </a>
                  <a href="/cetakpdf/data_admin" class="card-title" target="_blank">
                    <button type="button" class="btn btn-secondary">
                      <i class="mdi mdi-printer"></i>
                      Cetak PDF
                    </button>
                  </a>
                  <br><br>

                  {{-- Alert --}}
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success" role="alert">
                      {{ $message }}
                  </div>
                  @endif

                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Foto</th>
                          <th>Email</th>
                          <th>Jenis Kelamin</th>
                          <th>Jabatan</th>
                          <th>Telpon</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- Melakukan perulangan untuk nomor --}}
                        @php $no = 1; @endphp
                        @foreach ($data as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->name }}</td>
                          <td><img src="/data/data_admin/{{ $item->foto }}" width="80"></td>
                          <td>{{ $item->email }}</td>
                          <td>
                            @if ($item->jenis_kelamin != '')
                              {{ $item->jenis_kelamin }}
                            @else
                              <div class="text-danger">Profil belum lengkap</div> 
                              <a href="/data_admin/{{ $item->id_admin }}/edit" class="more-btn">  <strong> Lengkapi » </strong></a>
                            @endif
                          </td>
                          <td>
                            @if ($item->jabatan != '')
                              {{ $item->jabatan }}
                            @else
                              <div class="text-danger">Profil belum lengkap</div> 
                              <a href="/data_admin/{{ $item->id_admin }}/edit" class="more-btn">  <strong> Lengkapi » </strong></a>
                            @endif
                          </td>
                          <td>
                            @if ($item->telpon != '')
                              {{ $item->telpon }}
                            @else
                              <div class="text-danger">Profil belum lengkap</div> 
                              <a href="/data_admin/{{ $item->id_admin }}/edit" class="more-btn">  <strong> Lengkapi » </strong></a>
                            @endif
                          </td>
                          {{-- <td>{{ $item->password }}</td> --}}
                          <td>
                            <a href="{{ route('data_admin.edit',$item->id_admin) }}" >
                              <button type="button" class="btn btn-cyan btn-sm text-white">
                              <span class="fas fa-pencil-alt"></span>
                            </button></a>

                            <a href="{{ route('data_admin.ubahpw',$item->id) }}" >
                              <button type="button" class="btn btn-warning btn-sm text-white">
                              <span class="fas fa-key"></i></span>
                            </button></a>
                          
                          <form action="{{ route('data_admin.destroy',$item->id)}}" method="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm text-white" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus user admin {{ $item->judul }} ini?')">
                                <span class="far fa-trash-alt"></span> 
                                </button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Foto</th>
                          <th>Email</th>
                          <th>Jenis Kelamin</th>
                          <th>Jabatan</th>
                          <th>Telpon</th>
                          {{-- <th>Password</th> --}}
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
      
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('backend/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
    {{-- Mengatur lamanya alert muncul --}}
    <script type="text/javascript">
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
    </script>

    <!-- ============================================================== -->
    <!-- All Jquery dari Template (Agar Logout Aktif)-->
    <!-- ============================================================== -->
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('backend/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/pages/chart/chart-page-init.js') }}"></script>
    @stack('conten.js')
  </body>
</html>
@endsection

