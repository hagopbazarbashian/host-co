@extends('layout.app')

@section('main-content')
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
    }

    .drop-zoon__preview-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
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
</style>
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <section id="section-hero" aria-label="section" data-bgimage="url({{asset('images/bg.jpg')}}) bottom">
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
                                <p class="drop-zoon__paragraph"> Click to browse</p>
                                <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                                <div id="previewImages" class="drop-zoon__preview-images"></div>
                                <input type="file" id="fileInput" class="drop-zoon__file-input" name="upload[]" multiple>
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
                                <input type="email" id="userEmail" name="email" class="additional-input__field" placeholder="Enter your email">
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
</div>
<!-- content close -->

<script>
document.addEventListener("DOMContentLoaded", function() {
    const dropZoon = document.querySelector('#dropZoon');
    const fileInput = document.querySelector('#fileInput');
    const previewImages = document.querySelector('#previewImages');
    const uploadedFiles = document.querySelector('#uploadedFiles');
    const loadingText = document.querySelector('#loadingText');

    dropZoon.addEventListener('dragover', function(event) {
        event.preventDefault();
        dropZoon.classList.add('drop-zoon--over');
    });

    dropZoon.addEventListener('dragleave', function(event) {
        dropZoon.classList.remove('drop-zoon--over');
    });

    dropZoon.addEventListener('drop', function(event) {
        event.preventDefault();
        dropZoon.classList.remove('drop-zoon--over');
        handleFiles(event.dataTransfer.files);
    });

    dropZoon.addEventListener('click', function(event) {
        fileInput.click();
    });

    fileInput.addEventListener('change', function(event) {
        handleFiles(event.target.files);
    });

    function handleFiles(files) {
        previewImages.innerHTML = "";
        uploadedFiles.innerHTML = "";

        for (const file of files) {
            const fileReader = new FileReader();
            const fileSize = file.size;

            if (fileValidate(fileSize)) {
                dropZoon.classList.add('drop-zoon--Uploaded');
                loadingText.style.display = "block";

                fileReader.addEventListener('load', function(e) {
                    const previewContainer = document.createElement("div");
                    previewContainer.className = "preview-container";

                    if (file.type.startsWith("image/")) {
                        const previewImage = document.createElement("img");
                        previewImage.src = e.target.result;
                        previewImage.className = "drop-zoon__preview-image";
                        previewContainer.appendChild(previewImage);
                    } else {
                        const previewText = document.createElement("span");
                        previewText.textContent = file.name;
                        previewText.className = "drop-zoon__preview-text";
                        previewContainer.appendChild(previewText);
                    }
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
                alert('Please ensure your file is 1GB or less');
            }
        }

        setTimeout(function() {
            loadingText.style.display = "none";
            previewImages.style.display = 'block';
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


</script>
@endsection
