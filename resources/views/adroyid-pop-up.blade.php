<style>
    /* Modal styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        animation: fadeIn 0.5s ease; /* Add fade-in animation */
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        text-align: center;
        border-radius: 8px;
        position: relative;
        opacity: 0;
        transform: scale(0.9); /* Initial scale for animation */
        animation: scaleIn 0.5s ease forwards; /* Add scale-in animation */
    }

    .close {
        color: #aaa;
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .download-button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: inline-block;
        margin-top: 10px;
    }

    .android-logo {
        width: 90px;
        height: 70px;
        margin-bottom: 10px;
    }

    .app-screenshot {
        width: 38%;
        max-width: 300px;
        margin: 10px auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    h2 {
        font-size: 24px;
        color: #333;
    }

    p {
        font-size: 16px;
        color: #666;
    }

    /* Keyframes for fade-in effect */
    @keyframes fadeIn {
        from {
            background-color: rgba(0, 0, 0, 0);
        }
        to {
            background-color: rgba(0, 0, 0, 0.5);
        }
    }

    /* Keyframes for scale-in effect */
    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

<!-- Modal for App Download -->
<div id="appDownloadModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <img src="{{ asset('asset/images/new-android-logo-removebg-preview.png') }}" alt="Android Logo" class="android-logo" />
        <h2>Download Our Android App</h2>
        <p>Get the best experience with our Android app.</p>
        <img src="{{ asset('asset/6C8CAC04-BDD7-411D-AADE-6E0323448688-removebg-preview.png') }}" alt="App Screenshot" class="app-screenshot" />
        <a href="{{ asset('asset/y1hYiMRmBU8uTChXu8bo.apk') }}" class="download-button">Download Now</a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Check if the user has visited the page before using a cookie
        const hasVisited = document.cookie.split('; ').find(row => row.startsWith('visited_page='));

        if (!hasVisited) {
            const modal = document.getElementById("appDownloadModal");
            const closeModal = document.getElementById("closeModal");

            // Show the modal with animation
            modal.style.display = "block";

            // Close the modal when the close button is clicked
            closeModal.addEventListener("click", function () {
                modal.style.display = "none";
            });

            // Close the modal when clicking outside the modal content
            window.addEventListener("click", function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });

            // Set a cookie to indicate the user has visited the page
            document.cookie = "visited_page=true; path=/; max-age=86400"; // 1 day expiration
        }
    });
</script>
