@extends('frontend.layout')
@section('content')
@section('title', 'Category')

<header class="categoryImage" style="background-image: url('{{ url('public/banner/' . $category->banner_image) }}')">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <div class="categoryHeading">
            <h2>Category</h2>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- End Category Header -->

  <!-- Start Category -->

  <section class="productCard">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardLong">
              <div class="productCardHeading">
                <h4>Book Your<br>IPhone 14 Pro Max</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImageLong">
                <img src="{{asset('front_assets/images/productCardImageOne.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 mTop">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
              <a href="{{route('shop')}}">
                <div class="productCardTwo">
                  <div class="productCardHeading">
                    <h4>Power Bank</h4>
                    <h5><span>25%</span> Sale</h5>
                  </div>
                  <div class="productCardImage">
                    <img src="{{asset('front_assets/images/productCardImageTwo.webp')}}" alt="Product Card Image">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 sTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
              <a href="{{route('shop')}}">
                <div class="productCardOne">
                  <div class="productCardHeading">
                    <h4>Andriod</h4>
                    <h5><span>25%</span> Sale</h5>
                  </div>
                  <div class="productCardImage">
                    <img src="{{asset('front_assets/images/productCardImageThree.webp')}}" alt="Product Card Image">
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
              <a href="{{route('shop')}}">
                <div class="productCardOne mt-4">
                  <div class="productCardHeading">
                    <h4>Digital Watch</h4>
                    <h5><span>25%</span> Sale</h5>
                  </div>
                  <div class="productCardImage">
                    <img src="{{asset('front_assets/images/productCardImageFour.webp')}}" alt="Product Card Image">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 sTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
              <a href="{{route('shop')}}">
                <div class="productCardTwo mt-4">
                  <div class="productCardHeading">
                    <h4>Gaming PC</h4>
                    <h5><span>25%</span> Sale</h5>
                  </div>
                  <div class="productCardImage">
                    <img src="{{asset('front_assets/images/productCardImageFive.webp')}}" alt="Product Card Image">
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row pTop">
        <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardOne">
              <div class="productCardHeading">
                <h4>Headphone</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageOne.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 aTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardTwo">
              <div class="productCardHeading">
                <h4>Camera</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageEight.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 bTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardOne">
              <div class="productCardHeading">
                <h4>Smart LED</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageFive.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardTwo">
              <div class="productCardHeading">
                <h4>Smart Watch</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageTwo.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardOne">
              <div class="productCardHeading">
                <h4>Gaming PC</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/productCardImageFive.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardTwo">
              <div class="productCardHeading">
                <h4>Speaker</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageThree.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardOne">
              <div class="productCardHeading">
                <h4>Smart LED</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageFive.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardTwo">
              <div class="productCardHeading">
                <h4>Camera</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageEight.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardOne">
              <div class="productCardHeading">
                <h4>Headphone</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageOne.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardTwo">
              <div class="productCardHeading">
                <h4>Headphone</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageOne.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardOne">
              <div class="productCardHeading">
                <h4>Speaker</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageThree.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
          <a href="{{route('shop')}}">
            <div class="productCardTwo">
              <div class="productCardHeading">
                <h4>Smart LED</h4>
                <h5><span>25%</span> Sale</h5>
              </div>
              <div class="productCardImage">
                <img src="{{asset('front_assets/images/CategoryImageFive.webp')}}" alt="Product Card Image">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection
