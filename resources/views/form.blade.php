<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Images Into pdf</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        /* Dropzone Customization */
        .dropzone {
            border: 2px dashed #0d6efd;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .dz-message {
            font-size: 1.2rem;
            color: #6c757d;
        }

        /* Card for better form layout */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .preview-image {
            max-width: 100px;
            margin: 5px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container">
                    <h2 class="mb-4 text-center">Upload Images</h2>

                    <!-- Title and Description Fields -->
                    <form action="{{route('generate-pdf')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Dropzone for Drag-and-Drop Image Upload -->
                        <div class="mb-4">
                            <label class="form-label">Upload Images</label>
                            <div class="dropzone" id="imageDropzone">
                                <div class="dz-message">Drag & drop images here or click to upload</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Dependencies -->
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <script>
        let ipAddress = 0;
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                ipAddress=data.ip;
                $('form').append('<input type="hidden" value="'+ipAddress+'" name="ipAddress"/>');
            })
            .catch(error => {
                console.log('Error:', error);
            });
        // Initialize Dropzone
        Dropzone.options.imageDropzone = {
            url: '/upload', // Change this to the appropriate endpoint
            maxFiles: 5, // Limit to 5 files
            maxFilesize: 2, // Limit file size to 2MB
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictRemoveFile: "Remove",
            dictDefaultMessage: 'Drag & drop images here or click to upload',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content') // Include CSRF token for Laravel
            },
            init: function() {
                this.on("success", function(file, response) {
                    console.log("File uploaded successfully");
                });
                this.on("removedfile", function(file) {
                    console.log("File removed");
                });
                this.on('addedfile', function(file) {

                });
                this.on('sending', function(file, xhr, formData) {
                    formData.append('ipAddress', ipAddress);
                });
            }
        };
    </script>

</body>

</html>
