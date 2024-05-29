@extends('layout.app')
@section('main-content')
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <section id="section-hero" aria-label="section" data-bgimage="url({{asset('')}}) bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    @if(session('link'))
                    <div class="alert alert-success download-link">
                        <p>File uploaded successfully. Share this link to download: <a href="{{ session('link') }}">{{ session('link') }}</a></p>
                    </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success success-message">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <form class="form-container" action="{{ route('start_send_for_user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="uploadArea" class="upload-area">
                            <!-- Header -->
                            <div class="upload-area__header">
                                <h1 class="upload-area__title">Upload your files</h1>
                                <p class="upload-area__paragraph">
                                    Files should be images or any file type.
                                    <strong class="upload-area__tooltip">
                                        Like
                                        <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                                    </strong>
                                </p>
                            </div>
                            <!-- End Header -->
                    
                            <!-- Drop Zone -->
                            <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                                <span class="drop-zoon__icon">
                                    <i class='bx bxs-file-image'></i>
                                </span>
                                <p class="drop-zoon__paragraph">Drop your files here or Click to browse</p>
                                <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                                <div id="previewImages" class="drop-zoon__preview-images"></div>
                                <input type="file" id="fileInput" class="drop-zoon__file-input" accept="image/*, .zip, .pdf, .doc, .docx" name="upload[]" multiple>
                            </div>
                            <!-- End Drop Zone -->
                    
                            <!-- File Details -->
                            <div id="fileDetails" class="upload-area__file-details file-details">
                                <h3 class="file-details__title">Uploaded Files</h3>
                                <div id="uploadedFiles" class="uploaded-files"></div>
                            </div>
                            <!-- End File Details -->
                    
                            <!-- Additional Input -->
                            <div class="upload-area__additional-input">
                                <label for="userEmail" class="additional-input__label">Your Email:</label>
                                <input type="email" id="userEmail" name="email" class="additional-input__field" placeholder="Enter your email" required>
                            </div>
                            <!-- End Additional Input -->
                    
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
                <div class="col-md-6">
                    <img src="{{ asset('asset/images/misc/se.png') }}" class="img-fluid anim-up-down" alt="" />
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="no-top">
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
    </section> --}}
    {{-- <section id="section-pricing" class="no-top" data-bgimage="url(images/background/1.jpg) top">
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
            <div class="row de_pricing-tables shadow-soft g-0" style="display: flex;justify-content: space-around;">
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
    </section> --}}
    {{-- <section id="section-steps" class="no-top">
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
    </section> --}}
</div>
<!-- content close -->
<script>
const uploadArea = document.querySelector('#uploadArea');

// Select Drop-Zoon Area
const dropZoon = document.querySelector('#dropZoon');

// Loading Text
const loadingText = document.querySelector('#loadingText');

// Select File Input 
const fileInput = document.querySelector('#fileInput');

// Select Preview Images Container
const previewImages = document.querySelector('#previewImages');

// File-Details Area
const fileDetails = document.querySelector('#fileDetails');

// Uploaded Files Container
const uploadedFiles = document.querySelector('#uploadedFiles');

// ToolTip Data
const toolTipData = document.querySelector('.upload-area__tooltip-data');

// Images Types
const imagesTypes = ["jpeg", "png", "svg", "gif"];

// Append Images Types Array Inside Tooltip Data
toolTipData.innerHTML = [...imagesTypes].join(', .');

// When (drop-zoon) has (dragover) Event 
dropZoon.addEventListener('dragover', function (event) {
  event.preventDefault();
  dropZoon.classList.add('drop-zoon--over');
});

// When (drop-zoon) has (dragleave) Event 
dropZoon.addEventListener('dragleave', function (event) {
  dropZoon.classList.remove('drop-zoon--over');
});

// When (drop-zoon) has (drop) Event 
dropZoon.addEventListener('drop', function (event) {
  event.preventDefault();
  dropZoon.classList.remove('drop-zoon--over');
  handleFiles(event.dataTransfer.files);
});

// When (drop-zoon) has (click) Event 
dropZoon.addEventListener('click', function (event) {
  fileInput.click();
});

// When (fileInput) has (change) Event 
fileInput.addEventListener('change', function (event) {
  handleFiles(event.target.files);
});

// Handle Files Function
function handleFiles(files) {
  previewImages.innerHTML = "";
  uploadedFiles.innerHTML = "";

  for (const file of files) {
    const fileReader = new FileReader();
    const fileSize = file.size;

    if (fileValidate(fileSize)) {
      dropZoon.classList.add('drop-zoon--Uploaded');
      loadingText.style.display = "block";

      fileReader.addEventListener('load', function (e) {
        // Create a container for the preview
        const previewContainer = document.createElement("div");
        previewContainer.className = "preview-container";

        // Create the preview image element
        const previewImage = document.createElement("img");
        previewImage.src = e.target.result;
        previewImage.className = "drop-zoon__preview-image";
        previewContainer.appendChild(previewImage);

        // Append the preview container to the previewImages element
        previewImages.appendChild(previewContainer);

        // Create the uploaded file details
        const uploadedFile = document.createElement("div");
        uploadedFile.className = "uploaded-file";

        const iconContainer = document.createElement("div");
        iconContainer.className = "uploaded-file__icon-container";
        const icon = document.createElement("i");
        icon.className = "bx bxs-file-blank uploaded-file__icon";
        const iconText = document.createElement("span");
        iconText.className = "uploaded-file__icon-text";
        iconText.textContent = file.name;
        iconContainer.appendChild(icon);
        iconContainer.appendChild(iconText);

        const fileInfo = document.createElement("div");
        fileInfo.className = "uploaded-file__info";
        const fileName = document.createElement("span");
        fileName.className = "uploaded-file__name";
        fileName.textContent = file.name;
        const fileCounter = document.createElement("span");
        fileCounter.className = "uploaded-file__counter";
        fileCounter.textContent = "0%";
        fileInfo.appendChild(fileName);
        fileInfo.appendChild(fileCounter);

        uploadedFile.appendChild(iconContainer);
        uploadedFile.appendChild(fileInfo);

        uploadedFiles.appendChild(uploadedFile);

        progressMove(fileCounter);
      });

      fileReader.readAsDataURL(file);
    } else {
      alert('Please Your File Should be 1 Gigabyte or Less');
    }
  }

  setTimeout(function () {
    loadingText.style.display = "none";
    previewImages.style.display = 'block';
    fileDetails.classList.add('file-details--open');
  }, 500);
}

// Progress Counter Increase Function
function progressMove(fileCounter) {
  let counter = 0;

  setTimeout(() => {
    let counterIncrease = setInterval(() => {
      if (counter === 100) {
        clearInterval(counterIncrease);
      } else {
        counter = counter + 10;
        fileCounter.innerHTML = `${counter}%`
      }
    }, 100);
  }, 600);
}

// Simple File Validate Function
function fileValidate(fileSize) {
  return fileSize <= 1073741824;
}
</script>
@endsection
