<!DOCTYPE html>
<html>
<head>
    <title>Your Uploaded Files</title>
</head>
<body>
    <h1>Your Uploaded Files</h1>
    <p>Your files have been uploaded successfully. You can download them using the link below:</p>
    <a href="{{ $downloadLink }}">{{ $downloadLink }}</a>
    <p>This link will expire in 1 hour.</p>
</body>
</html>