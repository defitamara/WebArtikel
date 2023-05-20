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

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Selamat datang di</h6>
            <h2>KUMPULAN ARTIKEL</h2>
            <p>Disini tersedia ribuan artikel terlengkap dengan berbagai kategori. Temukan bacaan menarik yang kamu inginkan disini!</p>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                <button role="button">Search Now</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="{{ asset('frontend/assets/images/perpustakaan.jpg') }}" alt="">
            <span class="price">$22</span>
            <span class="offer">-40%</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="{{ asset('frontend/assets/images/featured-01.png') }}" alt="" style="max-width: 44px;">
              </div>
              <h4>Koleksi Lengkap</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="{{ asset('frontend/assets/images/featured-02.png') }}" alt="" style="max-width: 44px;">
              </div>
              <h4>Daftar Member</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="{{ asset('frontend/assets/images/featured-03.png') }}" alt="" style="max-width: 44px;">
              </div>
              <h4>Buku Ter-update</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="{{ asset('frontend/assets/images/featured-04.png') }}" alt="" style="max-width: 44px;">
              </div>
              <h4>Pinjam Buku</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Popular</h6>
            <h2>Popular Books</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="#">View All</a>
          </div>
        </div>
        @foreach ($artikel as $item)
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="#"><img src="/data/data_artikel/{{ $item->gambar }}" alt=""></a>
              <span class="price">{{ $item->tanggal }}</span>
            </div>
            <div class="down-content">
              <span class="category">{{ $item->username }}</span>
              <h4>{{ $item->judul_artikel }}</h4>
              <a href="/{{ $item->id_artikel }}/detailartikel"><i class="fa-solid fa-angles-right"></i></a>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP READ</h6>
            <h2>Most Read</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="#">View All</a>
          </div>
        </div>
        @foreach ($artikeltop as $item)
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

  {{-- <div class="section categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Categories</h6>
            <h2>Top Categories</h2>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="{{ asset('frontend/assets/images/categories-01.jpg') }}" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="{{ asset('frontend/assets/images/categories-05.jpg') }}" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="{{ asset('frontend/assets/images/categories-03.jpg') }}" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="{{ asset('frontend/assets/images/categories-04.jpg') }}" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="{{ asset('frontend/assets/images/categories-05.jpg') }}" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Our Shop</h6>
                  <h2>Go Pre-Order Buy & Get Best <em>Prices</em> For You!</h2>
                </div>
                <p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
                <div class="main-button">
                  <a href="shop.html">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>NEWSLETTER</h6>
                  <h2>Get Up To $100 Off Just Buy <em>Subscribe</em> Newsletter!</h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
                    <button type="submit">Subscribe Now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

@include('frontend/layouts.footer')

@endsection