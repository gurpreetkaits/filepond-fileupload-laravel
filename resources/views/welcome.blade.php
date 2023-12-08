<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Pond Upload</title>
</head>
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

<body>
    <form action="">
        <input type="file" name="filepond[]" multiple id="filepond">
    </form>
    {{-- Jquery Library --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- File Pond Js Cdn --}}
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    {{-- File Pond Jquerys Cdn --}}
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    {{-- File Pond Image Preview Cdn --}}
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
    FilePond.registerPlugin(FilePondPluginImagePreview);

    $("#filepond").filepond({
        allowImagePreview: true,
        allowImageFilter: true,
        imagePreviewHeight: 100,
        allowMultiple: true,
        allowFileTypeValidation: true,
        allowRevert: true,
        acceptedFileTypes: ["image/png", "image/jpeg", "image/jpg"],
        maxFiles: 5,
        credits: false,
        server: {
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/temp/upload",
            process: false,
            // revert: true,
            restore: "temp/upload/delete",
            fetch: false,
        },
    });

    </script>
</body>

</html>