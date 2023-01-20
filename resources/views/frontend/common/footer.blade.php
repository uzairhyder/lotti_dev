  <footer class="footer cstm-column-width noPrint">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="pages">
            <div class="pageHeading">
              <h5>ALL PRODUCTS</h5>
            </div>
            <div class="pageLinks">
              <ul>
                <li><a href="#">All Small Appliances</a></li>
                <li><a href="#">Air Fryer</a></li>
                <li><a href="#">Choppers</a></li>
                <li><a href="#">Built-In-Ovens</a></li>
                <li><a href="#">Iron</a></li>
                <li><a href="#">Water Heater</a></li>
                <li><a href="#">Sandwich Makers</a></li>
                <li><a href="#">Rice Cookers</a></li>
                <li><a href="#">Sewing Machine</a></li>
                <li><a href="#">Stand Mixer</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="pages">
            <div class="pageHeading">
              <h5>LINKS</h5>
            </div>
            <div class="pageLinks">
              <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('category')}}">Category</a></li>
                <li><a href="{{route('shop')}}">Shop</a></li>
                <li><a href="{{route('cart')}}">Cart</a></li>
                <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="contactBox">
            <div class="contactHeading">
              <h5>CONTACT US</h5>
            </div>
            <div class="followLinks">
              <div class="contactLink d-flex">
                <div class="envelopeIcon">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="locationText">
                  <a href="mailto:{{$config->email ?? ''}}">
                    <p>{{$config->email ?? ''}}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="followLinks">
              <div class="contactLink d-flex">
                <div class="phoneIcon">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="locationText">
                  <a href="tel:{{$config->contact ?? ''}}">
                    <p>{{$config->contact ?? ''}}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="followLinks">
              <div class="contactLink">
                <div class="locationIcon">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="locationText">
                  <a href="{{$config->map_link ?? ''}}" target="_blank">
                    <p>{{$config->address}}</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="follow">
            <div class="followHeading">
              <h5>OUR POLICIES</h5>
            </div>
            <div class="pageLinks">
              <ul>
                <li><a href="#">Commitment to Excellence</a></li>
                <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                <li><a href="{{route('terms-conditions')}}">Terms & Conditions</a></li>
                <li><a href="#">Security Alerts</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyRight">
      <p>{{$config->copy_right ?? ''}}<br>
        {{-- DESIGNED AND DEVELOPED BY <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p> --}}
    </div>
  </footer>





