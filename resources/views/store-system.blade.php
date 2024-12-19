<div class="container">
   <h1 style="text-align: center;">Store Your Files or Photos</h1>

   <!-- Add File Button -->
   <div style="text-align: center; margin: 20px;">
       <button id="addFileButton" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; cursor: pointer; border-radius: 5px;">
           + Add File
       </button>
   </div>
   
   <!-- Modal -->
         <div id="uploadModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);">
         <h3 style="text-align: center;">Upload Files Or Photes</h3>
         <form id="uploadForm" enctype="multipart/form-data" style="text-align: center;">
            @csrf
            <input type="file" name="files[]" id="files" multiple required
                     style="margin-bottom: 10px; padding: 5px; border-radius: 5px; border: 1px solid #ccc; width: 100%;" />
            <input type="password" name="password" id="password" placeholder="Set a password for your files" required
                     style="margin-bottom: 10px; padding: 5px; border-radius: 5px; border: 1px solid #ccc; width: 100%;" />
            <!-- Password Validation Error Message -->
            <div id="passwordError" style="color: red; font-size: 12px; margin-bottom: 10px; display: none;">
                  Password must include at least one symbol, one number, one uppercase letter, and be at least 8 characters long.
            </div>
            <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: #fff; border: none; cursor: pointer; border-radius: 5px;">
                  Upload Files
            </button>
         </form>
         <button id="closeModal" style="margin-top: 10px; padding: 5px 10px; background-color: #ff4d4d; color: #fff; border: none; cursor: pointer; border-radius: 5px;">
            Cancel
         </button>
      </div>

      <script>
         document.addEventListener('DOMContentLoaded', function () {
            const uploadForm = document.getElementById('uploadForm');
            const passwordInput = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');

            // Regular Expression for Password Validation
            const passwordRegex = /^(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*\d)(?=.*[A-Z]).{8,}$/;

            // Validate Password Before Form Submission
            uploadForm.addEventListener('submit', function (e) {
                  const password = passwordInput.value;

                  if (!passwordRegex.test(password)) {
                     e.preventDefault(); // Prevent form submission
                     passwordError.style.display = 'block'; // Show error message
                  } else {
                     passwordError.style.display = 'none'; // Hide error message
                  }
            });

            // Close Modal
            const closeModal = document.getElementById('closeModal');
            closeModal.addEventListener('click', function () {
                  const uploadModal = document.getElementById('uploadModal');
                  uploadModal.style.display = 'none';
            });
         });
      </script>

   <!-- Password Input Modal -->
   <div id="passwordModal" style="display: none; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); margin-top: 20px;">
      <!-- Close Button (X) -->
      <button id="closePasswordModal" style="float: right; background: none; border: none; font-size: 20px; font-weight: bold; cursor: pointer; color: #888;">
          &times;
      </button>
      <h3 style="text-align: center;">Enter Password to View Files</h3>
      <form id="passwordForm" style="text-align: center;">
          <input type="password" id="viewPassword" placeholder="Enter password" required
                 style="margin-bottom: 10px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 80%;" />
          <button type="submit" style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; cursor: pointer; border-radius: 5px;">
              View Files
          </button>
      </form>
  </div>
  
   <!-- Display Uploaded Files -->
   <h3 style="text-align: center; margin-top: 20px;">Your Uploaded Files</h3>
   <div id="fileListt" class="upload-area-storage" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
       <!-- Files will be dynamically updated here -->
   </div>

   {{-- //////////////////////////////Note --}}
    <!-- Display Security Text and Logo -->
    <div style="text-align: center; margin-top: 20px;">
      <img src="{{asset('asset/Capture.2JPG-removebg-preview.png')}}" alt="Logo" style="width: 100px; height: auto; margin-bottom: 10px;" />
      <p style="font-size: 14px; color: #888;">
          All files are securely hashed using MD5 and protected with <strong><a href="smartdevelop.am">SmartDevelopSystem</a></strong>.
      </p>
  </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
       // Open Modal
       $('#addFileButton').on('click', function () {
           $('#uploadModal').fadeIn();
       });

       // Close Modal
       $('#closeModal').on('click', function () {
           $('#uploadModal').fadeOut();
       });

       // Handle File Upload
       $('#uploadForm').on('submit', function (e) {
           e.preventDefault();

           // Prepare form data
           let formData = new FormData(this);

           $.ajax({
               url: "{{ route('file.upload') }}",
               type: "POST",
               data: formData,
               processData: false,
               contentType: false,
               success: function (response) {
                   $('#uploadModal').fadeOut();
                   $('#uploadForm')[0].reset();
                   updateFileList(response.files); // Update the file list dynamically
               },
               error: function (xhr) {
                   alert("Error uploading files. Please try again.");
               }
           });
       });

       // Handle Password Form Submission
       $('#passwordForm').on('submit', function (e) {
           e.preventDefault();
           const password = $('#viewPassword').val();

           $.ajax({
               url: "{{ route('file.verifyPassword') }}",
               type: "POST",
               data: {
                   _token: "{{ csrf_token() }}",
                   password: password
               },
               success: function (response) {
                   $('#passwordModal').fadeOut();
                   updateFileList(response.files); // Update the file list dynamically
               },
               error: function () {
                   alert('Incorrect password. Please try again.');
               }
           });
       });

       // Function to Update File List
       function updateFileList(files) {
           let fileList = $('#fileListt');
           fileList.empty();

           files.forEach(file => {
               let fileItem = `
                   <div style="text-align: center;">
                       ${file.is_image
                           ? `<img src="{{ asset('storage/') }}/${file.path}" style="width: 100px; height: 100px; object-fit: cover;" />`
                           : `<i class="fa fa-folder" style="font-size: 50px; color: #333;"></i>`}
                       <p>${file.name}</p>
                       <a href="{{ route('file.download', '') }}/${file.id}" class="btn btn-success btn-sm">Download</a>
                       <button class="deleteFileButton btn btn-danger btn-sm" data-file-id="${file.id}" style="margin-top: 5px;">Delete</button>
                   </div>
               `;
               fileList.append(fileItem);
           });
       }

       // Handle File Deletion
       $(document).on('click', '.deleteFileButton', function (e) {
    e.preventDefault();
    const fileId = $(this).data('file-id'); // Get the file ID
    const fileElement = $(this).closest('div'); // Get the specific file element container

    // Confirm deletion before proceeding
    if (!confirm("Are you sure you want to delete this file?")) {
        return;
    }

    $.ajax({
        url: "{{ route('file.delete') }}", // Backend route for deletion
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: fileId
        },
        success: function (response) {
            if (response.message) {
                alert(response.message); // Show success message
            }
            // Hide the specific file element
            fileElement.fadeOut(300, function () {
                $(this).remove(); // Remove it from the DOM after fadeOut
            });

            // Optionally handle empty state if all files are deleted
            if (response.files && response.files.length === 0) {
                $('#fileListt').html('<p style="text-align: center; color: #888;">No files found.</p>');
            }
        },
        error: function () {
            alert('Error deleting file. Please try again.');
        }
    });
});


       // Show Password Modal on Page Load (if necessary)
       $('#passwordModal').fadeIn();

         // Close Password Modal on 'X' Button Click
         $('#closePasswordModal').on('click', function () {
            $('#passwordModal').fadeOut();
         });

         // Example: Open the modal for demonstration (You can remove this in production)
         $('#passwordModal').fadeIn();
   });
</script>
