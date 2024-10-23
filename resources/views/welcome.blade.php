@extends('layout.app') @section('main-content')
<div class="no-bottom no-top" id="content">
   <div id="top"></div>
   <section id="section-hero" aria-label="section" data-bgimage="url({{asset('')}}) bottom">
      <div class="container">
         <div class="alert alert-success" role="alert">
            If you log in, you will have full access to all features.
            <a href="{{ route('free_trial') }}" class="alert-link">Click here to log in</a>.
         </div>
         <div class="row align-items-center">
            <div class="col-md-6">
               @if(session('link'))
               <div class="alert alert-success download-link">
                  <p>File uploaded successfully. Share this link to download: <a href="{{ session('link') }}">{{ session('link') }}</a></p>
               </div>
               @endif @if(session('success'))
               <div class="alert alert-success success-message">
                  <p>{{ session('success') }}</p>
               </div>
               @endif
               <form class="form-container" action="{{ route('start_send') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div id="uploadArea" class="upload-area">
                     <!-- Header -->
                     <div class="upload-area__header">
                        <h1 class="upload-area__title">Upload your file</h1>
                        <p class="upload-area__paragraph">
                           File should be an image
                           <strong class="upload-area__tooltip">
                              Like
                              <span class="upload-area__tooltip-data"></span>
                              <!-- Data Will be Comes From Js -->
                           </strong>
                        </p>
                     </div>
                     <!-- End Header -->

                     <!-- Drop Zoon -->
                     <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                        <span class="drop-zoon__icon">
                           <i class="bx bxs-file-image"></i>
                        </span>
                        <p class="drop-zoon__paragraph">Drop your file here or Click to browse</p>
                        <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                        <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false" />
                        <input type="file" id="fileInput" class="drop-zoon__file-input" accept="image/*" name="upload" />
                     </div>
                     <!-- End Drop Zoon -->

                     <!-- File Details -->
                     <div id="fileDetails" class="upload-area__file-details file-details">
                        <h3 class="file-details__title">Uploaded File</h3>

                        <div id="uploadedFile" class="uploaded-file">
                           <div class="uploaded-file__icon-container">
                              <i class="bx bxs-file-blank uploaded-file__icon"></i>
                              <span class="uploaded-file__icon-text"></span>
                              <!-- Data Will be Comes From Js -->
                           </div>

                           <div id="uploadedFileInfo" class="uploaded-file__info">
                              <span class="uploaded-file__name">Project 1</span>
                              <span class="uploaded-file__counter">0%</span>
                           </div>
                        </div>
                     </div>
                     <!-- End File Details -->

                     <!-- Submit Button -->
                     <div class="upload-area__footer">
                        <button type="submit" class="upload-button">Send</button>
                     </div>
                     <!-- End Submit Button -->
                  </div>
               </form>
               <!-- End Upload Area -->
               @if(session('error'))
               <div class="error-message">
                  <p>{{ session('error') }}</p>
               </div>
               @endif
               <div class="spacer-double"></div>
            </div>
            <!-- Removed xs-hide class -->
            <div class="col-md-6">
               <img src="{{asset('asset/images/misc/se.png')}}" class="lazy img-fluid anim-up-down" alt="" />
            </div>
         </div>
      </div>
   </section>
   <!-- Reminder Modal with Professional Design -->
   <div class="modal fade" id="reminderModal" tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
               <h5 class="modal-title fw-bold" id="reminderModalLabel">
                  🌟 Welcome to Our Professional Platform!
               </h5>
               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
               <h2 class="text-primary fw-bold">Upgrade Your Experience!</h2>
               <p class="lead text-muted">
                  Our home page offers a much more professional experience with full access to all the features you need to succeed. Click the button below to explore our professional home page now!
               </p>
               <img src="https://transfer.smartdevelop.am/asset/images/IMG_4004.PNG" class="img-fluid rounded mb-3" alt="Professional Home Page" style="max-width: 300px;" />
            </div>
            <div class="modal-footer justify-content-center">
               <a href="{{ route('user_home') }}" class="btn btn-primary btn-lg px-5 shadow-sm">Go to Home Page</a>
            </div>
         </div>
      </div>
   </div>

   <!-- Include Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

   <!-- Include jQuery (optional, only if using jQuery) -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- Include Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

   <!-- JavaScript to trigger the modal -->
   <script>
      $(document).ready(function () {
         // Show the reminder modal when the welcome page loads
         $("#reminderModal").modal("show");
      });
   </script>
   {{--
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
   --}} {{--
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
         <div class="row de_pricing-tables shadow-soft g-0" style="display: flex; justify-content: space-around;">
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
         </div>
      </div>
   </section>
   --}} {{--
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
   --}}
   <div id="newsspec-19854-app" class="news-app-promo">
      <div class="news-app-promo-text">
         <div class="news-app-promo-text__download">Download App.</div>
      </div>
      <div class="news-app-promo__section">
         <div class="news-app-promo-subsection">
            <img class="news-app-promo__bbc-logo" src="{{asset('asset/6C8CAC04-BDD7-411D-AADE-6E0323448688-removebg-preview.png')}}" width="106" height="106" />
         </div>
         <div class="news-app-promo-subsection">
            <a class="news-app-promo-subsection--link news-app-promo-subsection--playstore track-click" href="{{asset('asset/y1hYiMRmBU8uTChXu8bo.apk')}}" target="_parent">
               <img style="margin-bottom: 0px;!imporatnt" class="news-app-promo__play-store" src="//news.files.bbci.co.uk/include/newsspec/19854/assets/app-project-assets/google_play_store.svg" width="161" height="auto" border="0" />
            </a>
            <!--<a class="news-app-promo-subsection--link news-app-promo-subsection--appstore" href="https://itunes.apple.com/us/app/bbc-news/id364147881?mt=8" target="_parent">-->
            <!--    <img class="news-app-promo__app-store" src="//news.files.bbci.co.uk/include/newsspec/19854/assets/app-project-assets/ios_app_store.svg" width="161" height="auto" border="0">-->
            <!--</a>-->
         </div>
      </div>
      <div class="news-app-promo__section"></div>
   </div>
   <style>
      .news-app-promo {
         box-sizing: border-box;
         background-color: #000;
         padding: 0.5em;
         margin-top: 1em;
      }

      .news-app-promo__section {
         display: inline-block;
         margin: 0 auto;
         position: relative;
         width: 100%;
         text-align: center;
         margin-top: 8px;
      }

      .news-app-promo-text {
         color: #fff;
         font-family: helvetica;
         min-width: 277px;
         border-right: 0.25em solid #fff;
         border-left: 0.25em solid #fff;
         padding: 0 1em;
         width: 35%;
         margin: 1em auto;
         display: block;
      }

      .news-app-promo-text__tagline {
         font-size: 1.09em;
      }

      .news-app-promo-text__download {
         font-size: 2.25em;
         font-weight: 600;
      }

      .news-app-promo-buttons {
         margin: 0 auto;
         max-width: 35%;
         display: block;
      }

      .news-app-promo-buttons__buttons {
         display: block;
      }

      .news-app-promo-buttons__logo {
         display: inline-block;
      }

      .news-app-promo-subsection {
         display: inline-block;
         margin: 0 auto;
         margin-right: 10px;
      }

      .news-app-promo__bbc-logo {
         display: inline-block;
         width: 146px;
         height: auto;
         margin-bottom: 8px;
      }

      .news-app-promo__play-store,
      .news-app-promo__app-store {
         display: block;
         width: 161px;
         height: auto;
         margin-bottom: 8px;
      }

      .news-app-promo-subsection--link {
         text-decoration: none;
         border: 0;
      }
   </style>
</div>
<!-- content close -->
<script>
   // Design By
   // - https://dribbble.com/shots/13992184-File-Uploader-Drag-Drop

   // Select Upload-Area
   const uploadArea = document.querySelector("#uploadArea");

   // Select Drop-Zoon Area
   const dropZoon = document.querySelector("#dropZoon");

   // Loading Text
   const loadingText = document.querySelector("#loadingText");

   // Select File Input
   const fileInput = document.querySelector("#fileInput");

   // Select Preview Image
   const previewImage = document.querySelector("#previewImage");

   // File-Details Area
   const fileDetails = document.querySelector("#fileDetails");

   // Uploaded File
   const uploadedFile = document.querySelector("#uploadedFile");

   // Uploaded File Info
   const uploadedFileInfo = document.querySelector("#uploadedFileInfo");

   // Uploaded File Name
   const uploadedFileName = document.querySelector(".uploaded-file__name");

   // Uploaded File Icon
   const uploadedFileIconText = document.querySelector(".uploaded-file__icon-text");

   // Uploaded File Counter
   const uploadedFileCounter = document.querySelector(".uploaded-file__counter");

   // ToolTip Data
   const toolTipData = document.querySelector(".upload-area__tooltip-data");

   // Images Types
   const imagesTypes = ["jpeg", "png", "svg", "gif"];

   // Append Images Types Array Inside Tooltip Data
   toolTipData.innerHTML = [...imagesTypes].join(", .");

   // When (drop-zoon) has (dragover) Event
   dropZoon.addEventListener("dragover", function (event) {
      // Prevent Default Behavior
      event.preventDefault();

      // Add Class (drop-zoon--over) On (drop-zoon)
      dropZoon.classList.add("drop-zoon--over");
   });

   // When (drop-zoon) has (dragleave) Event
   dropZoon.addEventListener("dragleave", function (event) {
      // Remove Class (drop-zoon--over) from (drop-zoon)
      dropZoon.classList.remove("drop-zoon--over");
   });

   // When (drop-zoon) has (drop) Event
   dropZoon.addEventListener("drop", function (event) {
      // Prevent Default Behavior
      event.preventDefault();

      // Remove Class (drop-zoon--over) from (drop-zoon)
      dropZoon.classList.remove("drop-zoon--over");

      // Select The Dropped File
      const file = event.dataTransfer.files[0];

      // Call Function uploadFile(), And Send To Her The Dropped File :)
      uploadFile(file);
   });

   // When (drop-zoon) has (click) Event
   dropZoon.addEventListener("click", function (event) {
      // Click The (fileInput)
      fileInput.click();
   });

   // When (fileInput) has (change) Event
   fileInput.addEventListener("change", function (event) {
      // Select The Chosen File
      const file = event.target.files[0];

      // Call Function uploadFile(), And Send To Her The Chosen File :)
      uploadFile(file);
   });

   // Upload File Function
   function uploadFile(file) {
      // FileReader()
      const fileReader = new FileReader();
      // File Size
      const fileSize = file.size;

      // If File Is Passed from the (File Validate) Function
      if (fileValidate(fileSize)) {
         // Add Class (drop-zoon--Uploaded) on (drop-zoon)
         dropZoon.classList.add("drop-zoon--Uploaded");

         // Show Loading-text
         loadingText.style.display = "block";
         // Hide Preview Image
         previewImage.style.display = "none";

         // Remove Class (uploaded-file--open) From (uploadedFile)
         uploadedFile.classList.remove("uploaded-file--open");
         // Remove Class (uploaded-file__info--active) from (uploadedFileInfo)
         uploadedFileInfo.classList.remove("uploaded-file__info--active");

         // After File Reader Loaded
         fileReader.addEventListener("load", function () {
            // After Half Second
            setTimeout(function () {
               // Add Class (upload-area--open) On (uploadArea)
               uploadArea.classList.add("upload-area--open");

               // Hide Loading-text (please-wait) Element
               loadingText.style.display = "none";
               // Show Preview Image
               previewImage.style.display = "block";

               // Add Class (file-details--open) On (fileDetails)
               fileDetails.classList.add("file-details--open");
               // Add Class (uploaded-file--open) On (uploadedFile)
               uploadedFile.classList.add("uploaded-file--open");
               // Add Class (uploaded-file__info--active) On (uploadedFileInfo)
               uploadedFileInfo.classList.add("uploaded-file__info--active");
            }, 500); // 0.5s

            // Add The (fileReader) Result Inside (previewImage) Source
            previewImage.setAttribute("src", fileReader.result);

            // Add File Name Inside Uploaded File Name
            uploadedFileName.innerHTML = file.name;

            // Call Function progressMove();
            progressMove();
         });

         // Read (file) As Data Url
         fileReader.readAsDataURL(file);
      } else {
         // Else

         this; // (this) Represent The fileValidate(fileSize) Function
      }
   }

   // Progress Counter Increase Function
   function progressMove() {
      // Counter Start
      let counter = 0;

      // After 600ms
      setTimeout(() => {
         // Every 100ms
         let counterIncrease = setInterval(() => {
            // If (counter) is equal to 100
            if (counter === 100) {
               // Stop (Counter Increase)
               clearInterval(counterIncrease);
            } else {
               // Else
               // plus 10 on counter
               counter = counter + 10;
               // add (counter) value inside (uploadedFileCounter)
               uploadedFileCounter.innerHTML = `${counter}%`;
            }
         }, 100);
      }, 600);
   }

   // Simple File Validate Function
   function fileValidate(fileSize) {
      // Check if File Size Is 1GB or Less
      if (fileSize <= 1073741824) {
         // 1GB :)
         return true;
      } else {
         // Else File Size
         alert("Please Your File Should be 1 Gigabyte or Less");
         return false;
      }
   }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
      $(".track-click").on("click", function (e) {
         e.preventDefault(); // Prevent the default behavior of the link

         var linkName = $(this).data("link-name");
         var href = $(this).attr("href");

         // Send an AJAX request to track the click
         $.ajax({
            url: '{{ route("track.click") }}',
            method: "POST",
            data: {
               link_name: linkName,
               _token: "{{ csrf_token() }}",
            },
            success: function (response) {
               console.log(response.message);
               // Redirect after tracking
               window.location.href = href;
            },
            error: function (xhr) {
               console.error("An error occurred while tracking the click.");
               // Proceed with redirect even if tracking fails
               window.location.href = href;
            },
         });
      });
   });
</script>

@endsection
