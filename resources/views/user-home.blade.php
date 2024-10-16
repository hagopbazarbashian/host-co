@extends('layout.app') @section('main-content')
<style>
   .drop-zoon {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      cursor: pointer;
      transition: border-color 0.3s;
   }

   .drop-zoon--over {
      border-color: #00f;
   }

   .drop-zoon--Uploaded {
      border-color: #0f0;
   }

   .drop-zoon__icon {
      font-size: 48px;
      color: #ccc;
   }

   .drop-zoon__paragraph {
      font-size: 16px;
      color: #333;
   }

   .drop-zoon__loading-text {
      display: none;
      font-size: 16px;
      color: #f00;
   }

   .preview-container {
      display: inline-block;
      margin: 10px;
      text-align: center;
   }

   .drop-zoon__preview-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
   }

   .file-name-text {
      font-size: 14px;
      color: #333;
      margin-top: 5px;
   }

   .uploaded-file {
      display: flex;
      align-items: center;
      margin-top: 10px;
   }

   .uploaded-file__icon-container {
      display: flex;
      align-items: center;
   }

   .uploaded-file__icon {
      font-size: 24px;
      margin-right: 10px;
   }

   .uploaded-file__icon-text {
      font-size: 16px;
   }

   .uploaded-file__info {
      display: flex;
      flex-direction: column;
   }

   .uploaded-file__name {
      font-size: 16px;
   }

   .uploaded-file__counter {
      font-size: 12px;
      color: #999;
   }

   /* Loading spinner styles */
   .loading-spinner {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.7);
      z-index: 1000;
      justify-content: center;
      align-items: center;
   }

   .spinner {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 1s linear infinite;
   }

   @keyframes spin {
      0% {
         transform: rotate(0deg);
      }
      100% {
         transform: rotate(360deg);
      }
   }
   .upload-area {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      cursor: pointer;
      transition: border-color 0.3s;
      position: relative;
      background-color: #f9f9f9;
      margin-top: 20px;
   }

   .upload-area:hover {
      background-color: #e9e9e9;
   }

   .upload-button {
      padding: 10px 20px; /* Comfortable padding for the button text */
      background-color: #3498db; /* Your choice of background color */
      border: none; /* No borders */
      color: white; /* Text color */
      cursor: pointer; /* Cursor indicates it's clickable */
      margin-top: 10px; /* Space above the button */
      width: 100%; /* Makes the button full width */
      margin: 0px !important;
      border-radius: 25px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: space-around;
      box-sizing: border-box;
   }

   .additional-input__field {
      padding: 10px;
      margin-top: 10px;
      width: 100%;
      box-sizing: border-box;
      display: block;
   }

   /* Styling for the list of uploaded files */
   .uploaded-files {
      /*list-style-type: none;  // Removes bullets from the list*/
      padding: 0;
   }
   .uploaded-files li {
      margin-top: 5px; // Adds space between list items
      font-size: 16px; // Larger text for visibility
   }

   .uploaded-file {
      padding: 5px;
      background-color: #f0f0f0;
      margin-top: 5px;
   }

   .file-input-cover {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      opacity: 0;
   }

   .file-input-label {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      line-height: 50px;
      text-align: center;
      background-color: #f3f3f3;
      z-index: 0;
      border: 1px solid #ccc;
      cursor: pointer;
   }
   
   .download-link {
   font-size: 16px;
   line-height: 1.5;
}

.download-link a {
   word-wrap: break-word;
   display: block;
   margin-top: 5px;
}

.button-container {
   display: flex;
   gap: 10px;
   margin-top: 10px;
}

.button-container .btn {
   flex: 1;
}

@media (max-width: 600px) {
   .button-container {
      flex-direction: column;
      align-items: stretch;
   }

   .download-link a {
      word-wrap: break-word;
   }
}

</style>

<!-- Loading Spinner Overlay -->
<div class="loading-spinner" id="loadingSpinner">
   <div class="spinner"></div>
</div>

<div class="no-bottom no-top" id="content">
   <div id="top"></div>
   <section id="section-hero" aria-label="section" data-bgimage="url({{asset('images/bg.jpg')}}) bottom">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6">
               @if(session('link'))
              <div class="alert alert-success download-link">
   <p>
      File uploaded successfully. Share this link to download:
      <a href="{{ session('link') }}">{{ session('link') }}</a>
   </p>

   <!-- Button container for responsive layout -->
   <div class="button-container">
      <!-- Copy button -->
      <button onclick="copyToClipboard('{{ session('link') }}')" class="btn btn-primary">Copy Link</button>

      <!-- Share button (for browsers with Web Share API support) -->
      <button onclick="shareLink('{{ session('link') }}')" class="btn btn-success">Share Link</button>
   </div>
</div>

               <!-- JavaScript for Copy and Share functionality -->
               <script>
                  function copyToClipboard(link) {
                     const tempInput = document.createElement("input");
                     tempInput.value = link;
                     document.body.appendChild(tempInput);
                     tempInput.select();
                     document.execCommand("copy");
                     document.body.removeChild(tempInput);
                     alert("Link copied to clipboard!");
                  }

                  function shareLink(link) {
                     if (navigator.share) {
                        navigator
                           .share({
                              title: "File Download Link",
                              text: "Check out this file:",
                              url: link,
                           })
                           .then(() => {
                              console.log("Thanks for sharing!");
                           })
                           .catch((err) => {
                              console.error("Error sharing:", err);
                           });
                     } else {
                        alert("Web Share API not supported in this browser.");
                     }
                  }
               </script>
               @endif 
               

               <form class="form-container" action="{{ route('start_send_for_user') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="upload-area">
                     <h1>Upload your files</h1>
                     <p>Click or drop files below</p>
                     <!-- File input area -->
                     <div style="height: 50px; position: relative;">
                        <input type="file" id="fileInput" class="file-input-cover" name="upload[]" multiple accept="image/*, application/pdf" />
                        <div class="file-input-label">Click here to select files</div>
                     </div>
                     <ul id="fileList" class="uploaded-files"></ul>
                     <!-- This is where file names will be listed -->
                     <ul id="uploadedFiles" class="uploaded-files"></ul>
                     <label for="userEmail" class="additional-input__label">Your Email:</label>
                     <input type="email" id="userEmail" name="email" class="additional-input__field" placeholder="Enter your email" />
                     <button type="submit" class="upload-button">Send</button>
                  </div>
               </form>

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
   <div id="newsspec-19854-app" class="news-app-promo">
      <div class="news-app-promo-text">
         <div class="news-app-promo-text__download">Download App.</div>
      </div>
      <div class="news-app-promo__section">
         <div class="news-app-promo-subsection">
            <img class="mimimimi" src="{{asset('asset/6C8CAC04-BDD7-411D-AADE-6E0323448688-removebg-preview.png')}}" />
         </div>
         <div class="news-app-promo-subsection">
            <a class="news-app-promo-subsection--link news-app-promo-subsection--playstore" href="{{asset('asset/y1hYiMRmBU8uTChXu8bo.apk')}}" target="_parent">
               <img style="margin-bottom: 0px;!imporatnt" class="news-app-promo__play-store" src="//news.files.bbci.co.uk/include/newsspec/19854/assets/app-project-assets/google_play_store.svg" width="161" height="auto" border="0" />
            </a>
            <!--<a class="news-app-promo-subsection--link news-app-promo-subsection--appstore" href="https://itunes.apple.com/us/app/bbc-news/id364147881?mt=8" target="_parent">-->
            <!--    <img class="news-app-promo__app-store" src="//news.files.bbci.co.uk/include/newsspec/19854/assets/app-project-assets/ios_app_store.svg" width="161" height="auto" border="0">-->
            <!--</a>-->
         </div>
      </div>
      <div class="news-app-promo__section"></div>
   </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function () {
      const dropZoon = document.querySelector("#dropZoon");
      const fileInput = document.querySelector("#fileInput");
      const previewImages = document.querySelector("#previewImages");
      const uploadedFiles = document.querySelector("#uploadedFiles");
      const loadingText = document.querySelector("#loadingText");

      dropZoon.addEventListener("dragover", function (event) {
         event.preventDefault();
         dropZoon.classList.add("drop-zoon--over");
      });

      dropZoon.addEventListener("dragleave", function (event) {
         dropZoon.classList.remove("drop-zoon--over");
      });

      dropZoon.addEventListener("drop", function (event) {
         event.preventDefault();
         dropZoon.classList.remove("drop-zoon--over");
         handleFiles(event.dataTransfer.files);
      });

      dropZoon.addEventListener("click", function (event) {
         fileInput.click();
      });

      fileInput.addEventListener("change", function (event) {
         handleFiles(event.target.files);
      });

      function handleFiles(files) {
         previewImages.innerHTML = "";
         uploadedFiles.innerHTML = "";
         showLoadingSpinner(); // Show loading spinner

         for (const file of files) {
            const fileReader = new FileReader();
            const fileSize = file.size;

            if (fileValidate(fileSize)) {
               dropZoon.classList.add("drop-zoon--Uploaded");

               fileReader.addEventListener("load", function (e) {
                  const previewContainer = document.createElement("div");
                  previewContainer.className = "preview-container";

                  if (file.type.startsWith("image/")) {
                     const previewImage = document.createElement("img");
                     previewImage.src = e.target.result;
                     previewImage.className = "drop-zoon__preview-image";
                     previewContainer.appendChild(previewImage);
                  }

                  const fileNameText = document.createElement("p");
                  fileNameText.textContent = file.name;
                  fileNameText.className = "file-name-text";
                  previewContainer.appendChild(fileNameText);
                  previewImages.appendChild(previewContainer);

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
               alert("Please ensure your file is 1GB or less");
            }
         }

         setTimeout(function () {
            hideLoadingSpinner(); // Hide loading spinner once processing is done
         }, 500);
      }

      function progressMove(fileCounter) {
         let counter = 0;

         setTimeout(() => {
            let counterIncrease = setInterval(() => {
               if (counter === 100) {
                  clearInterval(counterIncrease);
               } else {
                  counter += 10;
                  fileCounter.innerHTML = `${counter}%`;
               }
            }, 100);
         }, 600);
      }

      function fileValidate(fileSize) {
         return fileSize <= 1073741824; // 1GB in bytes
      }
   });

   function showLoadingSpinner() {
      document.getElementById("loadingSpinner").style.display = "flex";
   }

   function hideLoadingSpinner() {
      document.getElementById("loadingSpinner").style.display = "none";
   }
</script>
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

   .mimimimi {
      display: inline-block;
      width: 136px !important;
      height: auto !important;
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

   .loading-spinner {
      display: none; /* Hidden by default */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
      z-index: 1000;
      justify-content: center;
      align-items: center;
   }

   .spinner {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 1s linear infinite;
   }

   @keyframes spin {
      0% {
         transform: rotate(0deg);
      }
      100% {
         transform: rotate(360deg);
      }
   }
</style>
<!-- Loading Spinner Overlay -->
<div class="loading-spinner" id="loadingSpinner">
   <div class="spinner"></div>
</div>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      const fileInput = document.getElementById("fileInput");
      const fileList = document.getElementById("fileList");

      fileInput.addEventListener("change", function (event) {
         const files = event.target.files;
         fileList.innerHTML = ""; // Clear existing file names

         Array.from(files).forEach((file) => {
            const li = document.createElement("li");
            li.textContent = file.name;
            fileList.appendChild(li);
         });
      });
   });

   document.addEventListener("DOMContentLoaded", function () {
      const sendButton = document.querySelector(".upload-button");
      const loadingSpinner = document.getElementById("loadingSpinner");

      sendButton.addEventListener("click", function () {
         loadingSpinner.style.display = "flex"; // Show the spinner
      });
   });
</script>
@endsection
