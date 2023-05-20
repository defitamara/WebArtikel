@extends('../backend/layouts.template')

@section('content')
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
              <h4 class="page-title">Detail Artikel</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
          {{-- <div class="row"> --}}
            {{-- <div class="col-md-6"> --}}

          <div class="row">

                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        @foreach ($artikel as $item)
                        <div class="card-title">
                          <a href="/dashboard">Dashboard / </a>
                          <a href="/data_artikel">Artikel / </a>
                          {{ $item->judul_artikel }}
                        </div>
                        <img src="/data/data_artikel/{{ $item->gambar }}" alt="" width="400"><br><br>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body border-top">
                        {{-- <h5 class="card-title">Tentang Buku</h5> --}}
                        <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Informasi Tentang Artikel</h4>
                          <table>
                            <tr>
                              <td>Judul</td>
                              <td>:</td>
                              <td>{{ $item->judul_artikel }}</td>
                            </tr>
                            <tr>
                              <td>Penulis</td>
                              <td>:</td>
                              <td>{{ $item->username }}</td>
                            </tr>
                            <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td>{{ $item->tanggal }}</td>
                            </tr>
                          </table>
                        </div>
                        <div class="alert alert-warning" role="alert">
                          <h4 class="alert-heading">Isi Artikel</h4>
                          {!! $item->isi_artikel !!}
                        </div>
                        {{--
                        <div class="alert alert-danger" role="alert">
                          <h4 class="alert-heading">Well done!</h4>
                          <p>
                            Aww yeah, you successfully read this important alert
                            message. This example text is going to run a bit longer so
                            that you can see how spacing within an alert works with
                            this kind of content.
                          </p>
                          <hr />
                          <p class="mb-0">
                            Whenever you need to, be sure to use margin utilities to
                            keep things nice and tidy.
                          </p>
                        </div> --}}
                      </div>
                    </div>
                  </div>
              </div>

              <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row comment-row mt-0">

                      <div class="comment-text w-100">

                        {{-- <span class="mb-3 d-block"
                          >{!! $item->deskripsi_singkat !!}
                        </span> --}}
                        <div class="comment-footer float-end">
                          <a href="{{ route('data_artikel.index') }}"><button
                            type="button"
                            class="btn btn-success btn-sm text-white">
                            Kembali
                          </button></a>
                          <a href="{{ route('data_artikel.edit',$item->id_artikel) }}"><button
                            type="button"
                            class="btn btn-cyan btn-sm text-white">
                            Edit
                          </button></a>
                          {{-- <button
                            type="button"
                            class="btn btn-danger btn-sm text-white">
                            Delete
                          </button> --}} 
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
      {{-- </div>         --}}
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    @endsection

