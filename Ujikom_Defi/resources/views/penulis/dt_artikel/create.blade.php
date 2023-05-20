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
              <h4 class="page-title">Form Tambah Data Artikel</h4>
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
              <div class="card">
                <form class="form-validate form-horizontal" method="POST" enctype="multipart/form-data"
                action="{{ route('data_artikel.store') }}">
                
                {{-- Code untuk menyimpan --}}
                {!! csrf_field() !!}

                {{-- Inputtan tak terlihat --}}
                <input type="hidden" name="id_artikel" value="">

                  <div class="card-body">
                    <div class="card-title">
                      <a href="/dashboard">Dashboard / </a>
                      <a href="/data_artikel">Artikel / </a>
                      Tambah Data
                    </div>
                    <div class="form-group row">
                      <label
                        for="judul_artikel"
                        class="col-sm-3"
                        >Judul Artikel</label>
                      <div class="col-sm-13">
                        <input
                          type="text"
                          class="form-control"
                          id="judul_artikel" name="judul_artikel"
                          placeholder="Masukkan judul artikel" required/>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-3">
                        Gambar</label>
                      <div class="col-md-13">
                        <div class="custom-file">
                          <input
                            type="file"
                            id="gambar" name="gambar"
                            class="custom-file-input {{ $errors->has('gambar') ? 'is-invalid' : ''}}"
                            required
                          />
                          @if ( $errors->has('gambar'))
                            <span class="text-danger small">
                              <p>{{ $errors->first('gambar') }}</p>
                            </span>
                          @endif

                          <div class="invalid-feedback">
                            Example invalid custom file feedback
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="isi_artikel" 
                        class="col-sm-4"
                        >Isi Artikel</label
                      >
                      <div class="col-sm-13">
                        <textarea class="ckeditor" id="isi_artikel" name="isi_artikel"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="penulis"
                        class="col-sm-3"
                        >Penulis</label>
                        <div class="col-md-13">
                          <select name="id_penulis"
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" required>
                            <option>Select</option>
                            {{-- Melakukan perulangan untuk nomor --}}
                            @foreach ($penulis as $item)
                              <option value="{{ $item->id_penulis }}">{{ $item->username }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="tanggal"
                        class="col-sm-3"
                        >Tanggal</label
                      >
                      <div class="col-sm-13">
                        <input
                          type="date"
                          class="form-control"
                          id="tanggal" name="tanggal"
                          placeholder="Masukkan tanggal"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  
                  <div class="border-top">
                    <div class="card-body float-end">
                      <a href="/data_artikel"><button type="button" class="btn btn-secondary">BATAL</button></a>
                      <button type="submit" class="btn btn-primary">
                        SIMPAN
                      </button>
                    </div>
                  </div>
                </form>
              </div>
      {{-- </div>         --}}
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ ('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ ('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ ('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ ('backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ ('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ ('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ ('backend/dist/js/custom.min.js') }}"></script>
    <!-- This Page JS -->
    <script src="{{ ('backend/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ ('backend/dist/js/pages/mask/mask.init.js') }}"></script>
    <script src="{{ ('backend/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/quill/dist/quill.min.js') }}"></script>
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr("data-control") || "hue",
          position: $(this).attr("data-position") || "bottom left",

          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
              console.log(value);
            }
          },
          theme: "bootstrap",
        });
      });
      /*datwpicker*/
      jQuery(".mydatepicker").datepicker();
      jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
      var quill = new Quill("#editor", {
        theme: "snow",
      });
    </script>

    <!-- Link Js CkEditor -->
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>

    @endsection

