<!-- footer begin -->
<footer class="footer-light">
    <div class="container">
       <div class="row g-custom-x" style="display:flex; justify-content:center;">
          <div class="col-lg-4">
             <img src="{{asset('asset/images/logo.png')}}" alt="" />
             <div class="spacer-20"></div>
             <p>
                At Hostco, we make transferring images and files easy, fast, and free. Whether you need to share large files with colleagues, friends, or clients, our service is designed to handle it all with no restrictions on file size.
             </p>
             <div class="spacer-10"></div>
             <div class="widget">
                <h5>We Accepted</h5>
                <img class="img-card-sm" src="{{asset('asset/images/payments-logo/visa.png')}}" alt="" />
                <img class="img-card-sm" src="{{asset('asset/images/payments-logo/master-card.png')}}" alt="" />
                <img class="img-card-sm" src="{{asset('asset/images/payments-logo/jcb.png')}}" alt="" />
                <img class="img-card-sm" src="{{asset('asset/images/payments-logo/paypal.png')}}" alt="" />
             </div>
          </div>
          
          {{-- <div class="col-lg-4">
             <div class="widget">
                <h5>Newsletter</h5>
                <p>Signup for our newsletter to get the latest news in your inbox.</p>
                <form action="blank.php" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
                   <div class="col text-center">
                      <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="enter your email" type="text" /> <a href="#" id="btn-subscribe"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                      <div class="clearfix"></div>
                   </div>
                </form>
                <div class="spacer-10"></div>
                <small>Your email is safe with us. We don't spam.</small>
                <div class="spacer-30"></div>
                <div class="widget">
                   <h5>Follow Us on</h5>
                   <div class="social-icons">
                      <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                      <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                      <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                      <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                      <a href="#"><i class="fa fa-rss fa-lg"></i></a>
                   </div>
                </div>
             </div>
          </div> --}}
       </div>
    </div>
    <style>
      .subfooter {
          background-color: #f8f9fa; /* Example background color */
          padding: 20px 0;
      }
      .de-flex {
          display: flex;
          justify-content: space-between;
          align-items: center;
      }
      .de-flex-col {
          display: flex;
          align-items: center;
      }
      .company-logo {
          height: 50px;
          width: auto;
          margin-right: 15px;
      }
      .menu-simple {
          list-style: none;
          padding: 0;
          margin: 0;
          display: flex;
      }
      .menu-simple li {
          margin-left: 15px;
      }
      .menu-simple a {
          text-decoration: none;
          color: #000; /* Example text color */
      }
  </style>
     <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex">
                        <div class="de-flex-col">
                            <a href="https://smartdevelop.am/">
                                <img src="{{asset('/asset/images/logosmartdevelop.png')}}" alt="Company Logo" class="company-logo" />
                            </a>
                        </div>
                        <div class="de-flex-col">
                            <a href="https://smartdevelop.am/">
                                Copyright 2023 - Hostco by Smart Develop
                            </a>
                        </div>
                        <ul class="menu-simple">
                            <li><a href="{{url('Terms-Conditions')}}">Terms &amp; Conditions</a></li>
                            <li><a href="{{url('Privacy-Policy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </footer>
 <!-- footer close -->
 