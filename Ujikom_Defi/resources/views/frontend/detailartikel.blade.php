@extends('frontend/layouts.template')

@section('content')

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

@include('frontend/layouts.navbar')


  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Detail Artikel</h3>
          <span class="breadcrumb"><a href="/">Home</a>  >  Detail Artikel </span>
        </div>
      </div>
    </div>
  </div>

  @foreach ($artikel as $item)

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="/data/data_artikel/{{ $item->gambar }}" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4>{{ $item->judul_artikel }}</h4>
          <span class="price">{{ $item->tanggal }}</span>
          {{-- <p>{!! \Illuminate\Support\Str::limit($item->deskripsi_singkat, 250) !!}</p>
          <form id="qty" action="#">
            <input type="qty" class="form-control" id="1" aria-describedby="quantity" placeholder="1">
            <button type="submit"><i class="fa fa-shopping-bag"></i> PINJAM BUKU </button>
          </form> --}}
          <ul>
            <li><span>Penulis</span> {{ $item->username }}</li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Isi Artikel</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Comments (0)</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  {!! $item->isi_artikel !!}
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <p><i>Tidak ada review</i></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endforeach

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>MORE ARTICLE</h6>
            <h2>Most Read</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="#">View All</a>
          </div>
        </div>
        @foreach ($artikellainnya as $item)
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="#"><img src="/data/data_artikel/{{ $item->gambar }}" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">{{ $item->username }}</span>
                <h4>{{ $item->judul_artikel }}</h4>
                <a href="/{{ $item->id_artikel }}/detailartikel">Explore</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

@include('frontend/layouts.footer')

@endsection