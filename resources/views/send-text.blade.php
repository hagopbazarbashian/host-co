@extends('layout.app')

@section('main-content')
<style>
    .upload-area {
        border: 2px dashed #ccc;
        /* padding: 20px; */
        /* text-align: center;
        margin: 20px auto;
        width: 60%; */
        font-family: Arial, sans-serif;
    }
    .upload-area__title {
        font-size: 24px;
        margin-bottom: 10px;
    }
    .upload-area__paragraph {
        font-size: 16px;
        color: #333;
        margin-bottom: 15px;
    }
    .upload-area__textarea {
        width: 100%;
        height: 200px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 10px;
    }
</style>

<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <section id="section-hero" aria-label="section" data-bgimage="url({{ asset('images/bg.jpg') }}) bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    @if(session('link'))
                        <div class="alert alert-success download-link">
                            <p>Link generated successfully! Share this link to download: <a href="{{ session('link') }}">{{ session('link') }}</a></p>
                        </div>
                    @endif
                    <form class="form-container" action="{{ route('start_send_for_user') }}" method="POST">
                        @csrf
                        <div class="upload-area">
                            <h1 class="upload-area__title">Enter Your Text</h1>
                            <p class="upload-area__paragraph">Type the content you want to save as a document.</p>
                            <textarea id="userText" name="user_text" class="upload-area__textarea" placeholder="Type your text here..."></textarea>
                            
                            <!-- Document Format Selection -->
                            <div class="upload-area__format-options">
                                <label for="docFormat">Choose Document Format:</label>
                                <div class="format-options">
                                    <input type="radio" id="pdf" name="doc_format" value="pdf" checked>
                                    <label for="pdf">PDF</label>
                                    <input type="radio" id="word" name="doc_format" value="word">
                                    <label for="word">Word</label>
                                </div>
                            </div>

                            <!-- Recipient Email Input -->
                            <div class="upload-area__additional-input">
                                <label for="recipientEmail" class="additional-input__label">Recipient's Email:</label>
                                <input type="email" id="recipientEmail" name="recipient_email" class="additional-input__field" placeholder="Enter recipient's email" required>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="upload-area__footer">
                                <button type="submit" class="upload-button">Generate and Send Link</button>
                            </div>
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
        </div>
    </section>
</div>

<!-- Include Typo.js and Load Dictionary -->
<script src="https://cdn.jsdelivr.net/gh/cfinke/Typo.js/typo.js"></script>
<script>
    let dictionary;

    async function loadDictionary() {
        const affResponse = await fetch('/dictionaries/en_US.aff');
        const dicResponse = await fetch('/dictionaries/en_US.dic');
        const affData = await affResponse.text();
        const dicData = await dicResponse.text();
        dictionary = new Typo("en_US", affData, dicData);
        console.log('Dictionary loaded');
    }

    loadDictionary();

    const userText = document.getElementById('userText');

    function debounce(func, delay) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    const spellCheck = debounce(function () {
        const text = userText.value;
        const words = text.split(/\s+/);
        const correctedWords = words.map(word => {
            if (dictionary && !dictionary.check(word)) {
                const suggestions = dictionary.suggest(word);
                if (suggestions.length > 0) {
                    return suggestions[0];
                }
            }
            return word;
        });
        userText.value = correctedWords.join(" ");
    }, 1000);

    userText.addEventListener('input', spellCheck);
</script>
@endsection
