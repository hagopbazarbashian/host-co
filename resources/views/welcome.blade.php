@extends('layout.app')
@section('main-content')
<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <section id="section-hero" aria-label="section" data-bgimage="url({{asset('')}}) bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Premium hosting for everyone, <span class="color-gradient">small</span> or <span class="color-gradient">large</span></h1>
                    <p class="lead">High performance secured hosting for your website. Don't lose anymore clients for the slowest speed of your hosting service.</p>
                    <form action="#" class="row" data-wow-delay="1.25s" id="form_sb" method="post" name="form_sb">
                        <div class="col">
                            <div class="spacer-10"></div>
                            <input class="form-control" id="domain_name" name="domain_name" placeholder="enter domain name" type="text" />
                            <a id="btn-submit" href="javascript:;" onclick="document.getElementById('form_sb').submit();">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                            <div class="clearfix"></div>
                            <div class="spacer-10"></div>
                            <p class="d-small">*Reserve your domain today before someone take it.</p>
                            <div class="domain-ext pos-left">
                                <div class="ext">
                                    <h4 class="id-color">.com</h4>
                                    $4.99/year
                                </div>
                                <div class="ext">
                                    <h4 class="id-color">.net</h4>
                                    $3.99/year
                                </div>
                                <div class="ext">
                                    <h4 class="id-color">.co</h4>
                                    $2.99/year
                                </div>
                                <div class="ext">
                                    <h4 class="id-color">.info</h4>
                                    $3.90/year
                                </div>
                                <div class="ext">
                                    <h4 class="id-color">.biz</h4>
                                    $5.99/year
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="spacer-double"></div>
                </div>
                <div class="col-md-6 xs-hide">
                    <img src="{{asset('asset/images/misc/server-2.png')}}" class="lazy img-fluid anim-up-down" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="no-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp">
                    <img class="img-fluid anim-up-down" src="{{asset('asset/images/misc/server.png')}}" alt="" />
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="p-sm-30 pb-sm-0 mb-sm-0">
                        <h2>New functionality brings maximum <span class="color-gradient">power</span> to your website.</h2>
                        <p>Reliable web hosting solutions: empowering your online presence with unparalleled performance, exceptional support, and hassle-free scalability.</p>
                        <div class="row">
                            <div class="col-md-5">
                                <ul class="ul-style-2">
                                    <li><h4>Instant Activation</h4></li>
                                    <li><h4>99.9% Uptime</h4></li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <ul class="ul-style-2">
                                    <li><h4>Reliable Hardware</h4></li>
                                    <li><h4>24 / 7 Support</h4></li>
                                </ul>
                            </div>
                        </div>
                        <div class="spacer-half"></div>
                        <a class="btn-main" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="no-top">
        <div class="container">
            <div class="row g-custom-x force-text-center">
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp">
                        <h3 class="timer" data-to="15425" data-speed="3000">0</h3>
                        Website Powered
                        <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp">
                        <h3 class="timer" data-to="8745" data-speed="3000">0</h3>
                        Clients Supported
                        <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp">
                        <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                        Awards Winning
                        <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp">
                        <h3 class="timer" data-to="15" data-speed="3000">0</h3>
                        Years Experience
                        <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-pricing" class="no-top" data-bgimage="url(images/background/1.jpg) top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="text-center">
                        <h5 class="s2">Hosting Plan</h5>
                        <h2>Choose Perfect <span class="id-color">Web Hosting</span> Package For You</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="switch-set">
                        <div>Monthly Plan</div>
                        <div><input id="sw-1" class="switch" type="checkbox" /></div>
                        <div>Yearly Plan</div>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>
            <div class="row de_pricing-tables shadow-soft g-0">
                <div class="col-xl-3 col-lg-6">
                    <div class="de_pricing-table type-2">
                        <div class="d-head">
                            <h3>Starter</h3>
                            <p>Ideal solution for beginners.</p>
                        </div>
                        <div class="d-price">
                            <h4 class="opt-1">$3.59<span>/mo</span></h4>
                            <h4 class="opt-2">$2.59<span>/mo</span></h4>
                            <p>Normally <s>$9.99</s></p>
                        </div>
                        <div class="d-action">
                            <a href="#" class="btn-main opt-1 w-100">Get Monthly Plan</a>
                            <a href="#" class="btn-main opt-2 w-100">Get Yearly Plan</a>
                            <p>Auto re-news at regular rate</p>
                        </div>
                        <div class="d-group">
                            <h4>Top Features</h4>
                            <ul class="d-list">
                                <li>1 Website</li>
                                <li>10 GB SSD Storage</li>
                                <li>Custom Themes</li>
                                <li>24/7 Customer Support</li>
                            </ul>
                        </div>
                        <div class="d-group">
                            <h4>Also Includes</h4>
                            <ul class="d-list">
                                <li>Free Domain - 1 year</li>
                                <li>Free CDN Included</li>
                                <li>Free SSL for the 1st year</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="de_pricing-table type-2">
                        <div class="d-head">
                            <h3>Plus</h3>
                            <p>For those need to running multiple sites.</p>
                        </div>

                        <div class="d-price">
                            <h4 class="opt-1">$5.59<span>/mo</span></h4>
                            <h4 class="opt-2">$3.59<span>/mo</span></h4>
                            <p>Normally <s>$15.99</s></p>
                        </div>
                        <div class="d-action">
                            <a href="#" class="btn-main opt-1 w-100">Get Monthly Plan</a>
                            <a href="#" class="btn-main opt-2 w-100">Get Yearly Plan</a>
                            <p>Auto re-news at regular rate</p>
                        </div>
                        <div class="d-group">
                            <h4>Top Features</h4>
                            <ul class="d-list">
                                <li>Unlimited Websites</li>
                                <li>20 GB SSD Storage</li>
                                <li>Custom Themes</li>
                                <li>24/7 Customer Support</li>
                            </ul>
                        </div>
                        <div class="d-group">
                            <h4>Also Includes</h4>
                            <ul class="d-list">
                                <li>Free Domain - 1 year</li>
                                <li>Free CDN Included</li>
                                <li>Free SSL Certificate</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="de_pricing-table type-2">
                        <div class="d-recommend">Recommended</div>
                        <div class="d-head">
                            <h3>Deluxe</h3>
                            <p>Unlimited sites with automated backup.</p>
                        </div>
                        <div class="d-price">
                            <h4 class="opt-1">$8.59<span>/mo</span></h4>
                            <h4 class="opt-2">$5.59<span>/mo</span></h4>
                            <p>Normally <s>$24.99</s></p>
                        </div>
                        <div class="d-action">
                            <a href="#" class="btn-main opt-1 w-100">Get Monthly Plan</a>
                            <a href="#" class="btn-main opt-2 w-100">Get Yearly Plan</a>
                            <p>Auto re-news at regular rate</p>
                        </div>
                        <div class="d-group">
                            <h4>Top Features</h4>
                            <ul class="d-list">
                                <li>Unlimited Websites</li>
                                <li>40 GB SSD Storage</li>
                                <li>Custom Themes</li>
                                <li>24/7 Customer Support</li>
                            </ul>
                        </div>
                        <div class="d-group">
                            <h4>Also Includes</h4>
                            <ul class="d-list">
                                <li>Free Domain - 1 year</li>
                                <li>Free CDN Included</li>
                                <li>Free SSL Certificate</li>
                                <li>Free Domain Privacy</li>
                                <li>Free Automated Backup</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="de_pricing-table type-2">
                        <div class="d-head">
                            <h3>Ultimate</h3>
                            <p>Best performance with optimized CPU resources.</p>
                        </div>
                        <div class="d-price">
                            <h4 class="opt-1">$15.59<span>/mo</span></h4>
                            <h4 class="opt-2">$10.59<span>/mo</span></h4>
                            <p>Normally <s>$36.99</s></p>
                        </div>
                        <div class="d-action">
                            <a href="#" class="btn-main opt-1 w-100">Get Monthly Plan</a>
                            <a href="#" class="btn-main opt-2 w-100">Get Yearly Plan</a>
                            <p>Auto re-news at regular rate</p>
                        </div>
                        <div class="d-group">
                            <h4>Top Features</h4>
                            <ul class="d-list">
                                <li>Unlimited Websites</li>
                                <li>100 GB SSD Storage</li>
                                <li>Custom Themes</li>
                                <li>24/7 Customer Support</li>
                                <li>Optimized CPU Resources</li>
                            </ul>
                        </div>
                        <div class="d-group">
                            <h4>Also Includes</h4>
                            <ul class="d-list">
                                <li>Free Domain - 1 year</li>
                                <li>Free CDN Included</li>
                                <li>Free SSL Certificate</li>
                                <li>Free Domain Privacy</li>
                                <li>Free Automated Backup</li>
                                <li>Free Dedicated IP</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-steps" class="no-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h5 class="s2">Easy Steps</h5>
                    <h2>How It Works</h2>
                    <p class="lead">Easy hosting made simple: streamlined steps for seamless website setup and management.</p>
                    <div class="spacer-20"></div>
                </div>
                <div class="col-md-12 wow fadeInUp">
                    <div class="container-timeline">
                        <ul>
                            <li>
                                <h4>Select Plan</h4>
                                <p>Selecting the right hosting plan for the success of your website. Tailored to meet your specific needs.</p>
                            </li>
                            <li>
                                <h4>Choose Domain</h4>
                                <p>Choose a domain name that reflects your website's purpose, content, or the nature of your business.</p>
                            </li>
                            <li>
                                <h4>Login/Register</h4>
                                <p>Take the first step towards creating your website and reaching a wider audience by registering today.</p>
                            </li>
                            <li>
                                <h4>Make Payment</h4>
                                <p>We offer a variety of secure payment methods to make your payment process convenient and hassle-free.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-locations" class="no-top no-bottom" data-bgimage="url({{asset('asset/images/background/1.jpg')}}) top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="col text-center">
                        <h5 class="s2">Discover</h5>
                        <h2>Server Locations</h2>
                        <p class="lead">Global reach, local performance: accelerate your website's speed and user experience with strategic server locations worldwide.</p>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 wow fadeInUp">
                    <div class="p-sm-30 pb-sm-0 mb-sm-0">
                        <div class="de-map-hotspot">
                            <div class="de-spot wow fadeIn" style="top: 39%; left: 20%;">
                                <span>United&nbsp;States</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 76%; left: 87%;">
                                <span>Australia</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 68%; left: 80%;">
                                <span>Indonesia</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 23%; left: 18%;">
                                <span>Canada</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 68%; left: 33%;">
                                <span>Brazil</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 45%; left: 75%;">
                                <span>China</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 36%; left: 48%;">
                                <span>France</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 23%; left: 51%;">
                                <span>Sweden</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot wow fadeIn" style="top: 78%; left: 53%;">
                                <span>South&nbsp;Africa</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <img src="{{asset('asset/images/misc/map.png')}}" class="img-fluid" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-double"></div>
        </div>
    </section>
    <section id="section-testimonial" class="no-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h5 class="s2">Testimonials</h5>
                    <h2>Trusted by over 5,000 happy customers <span class="id-color">worldwide</span></h2>
                    <p class="lead">Trusted by customers, empowering their online success with reliable solutions and exceptional support.</p>
                    <div class="spacer-20"></div>
                </div>
                <div class="owl-carousel owl-theme wow fadeInUp" id="testimonial-carousel">
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/1.jpg" /> <span>John, Pixar Studio</span></div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/2.jpg" /> <span>Sarah, Microsoft</span></div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/3.jpg" /> <span>Michael, Apple</span></div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/4.jpg" /> <span>Thomas, Samsung</span></div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/1.jpg" /> <span>John, Pixar Studio</span></div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/2.jpg" /> <span>Sarah, Microsoft</span></div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/3.jpg" /> <span>Michael, Apple</span></div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="de_testi type-2">
                            <blockquote>
                                <h4>Excellent Hosting</h4>
                                <p>Great support, like i have never seen before. Thanks to the support team, they are very helpfull. This company provide customers great solution, that makes them best.</p>
                                <div class="de_testi_by"><img alt="" class="rounded-circle" src="images/people/4.jpg" /> <span>Thomas, Samsung</span></div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-banner" class="no-bottom no-top" data-bgcolor="#DBEDF7">
        <div class="container">
            <div class="row align-items-center g-custom-x">
                <div class="col-lg-4 d-none d-lg-block d-xl-block text-center">
                    <img class="relative img-fluid mt-60" src="images/misc/1.png" alt="" />
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="p-sm-30 pb-sm-0 mb-sm-0">
                        <h2><span class="color-gradient">30 days</span> money back guarantee</h2>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="p-sm-30">
                        <div class="spacer-20 sm-hide"></div>
                        <p class="lead">If you not satisfy, we will refund your payment. No hassle, no risk. You can cancel plan at any time.</p>
                        <div class="spacer-half"></div>
                        <a class="btn-main" href="#">Get Started</a>
                        <p class="d-small mt20">*Cancellation must be within a maximum of 30 days</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-faq">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h5 class="s2">Do You Have</h5>
                    <h2>Any Questions?</h2>
                    <div class="spacer-20"></div>
                </div>
            </div>
            <div class="row g-custom-x">
                <div class="col-md-6 wow fadeInUp">
                    <div class="accordion secondary">
                        <div class="accordion-section">
                            <div class="accordion-section-title" data-tab="#accordion-1">
                                How do I get started with web hosting?
                            </div>
                            <div class="accordion-section-content" id="accordion-1">
                                <p>Look for reputable web hosting providers that offer easy-to-use interfaces and beginner-friendly features. Consider factors such as affordability, customer support, uptime guarantees, and user reviews.</p>
                            </div>
                            <div class="accordion-section-title" data-tab="#accordion-2">
                                What is difference for each plan?
                            </div>
                            <div class="accordion-section-content" id="accordion-2">
                                <p>
                                    There are different types of hosting available, such as shared hosting, VPS hosting, dedicated server hosting, or cloud hosting. Each type offers different levels of resources, control, and scalability.
                                    Choose the type that best matches your website's needs and budget.
                                </p>
                            </div>
                            <div class="accordion-section-title" data-tab="#accordion-3">
                                What kind of web hosting do I need?
                            </div>
                            <div class="accordion-section-content" id="accordion-3">
                                <p>
                                    Evaluate the requirements of your website, including expected traffic, storage space, bandwidth, databases, and any specific software or scripting languages you use. Understanding your needs will guide
                                    you in selecting a suitable hosting plan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 wow fadeInUp">
                    <div class="accordion secondary">
                        <div class="accordion-section">
                            <div class="accordion-section-title" data-tab="#accordion-b-4">
                                Why do I need domain name?
                            </div>
                            <div class="accordion-section-content" id="accordion-b-4">
                                <p>
                                    A domain name serves as your unique online identity. It allows you to create a recognizable and memorable brand for your website or business. Having a domain name makes it easier for users to find and
                                    remember your website.
                                </p>
                            </div>
                            <div class="accordion-section-title" data-tab="#accordion-b-5">
                                How my website protected from hackers?
                            </div>
                            <div class="accordion-section-content" id="accordion-b-5">
                                <p>
                                    Regularly update your website's software, including the content management system (CMS), plugins, themes, and any other applications used. Updates often include security patches that address
                                    vulnerabilities that could be exploited by hackers.
                                </p>
                            </div>
                            <div class="accordion-section-title" data-tab="#accordion-b-6">
                                How do I backup my website?
                            </div>
                            <div class="accordion-section-content" id="accordion-b-6">
                                <p>
                                    Our hosting have backup and disaster recovery mechanisms in place to safeguard data in the event of data loss, hardware failures, or disasters. Regular backups and redundant storage systems help ensure
                                    data integrity and availability.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="no-top" aria-label="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="owl-logo" class="logo-carousel owl-carousel owl-theme">
                        <img src="{{asset('asset/images/logo/1.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('asset/images/logo/2.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('asset/images/logo/3.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('asset/images/logo/4.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('asset/images/logo/5.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('asset/images/logo/6.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('asset/images/logo/7.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('asset/images/logo/8.png')}}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- content close -->
@endsection
