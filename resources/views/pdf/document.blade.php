<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .image-page {
            page-break-after: always;
            /* Ensures every image will be on a new page */
            text-align: center;
            /* Center image on the page */
        }
    </style>
</head>

<body>
    @foreach ($imagePath as $key=> $item)
        <div class="{{$loop->last?"":''}}">
            <img src="{{ $item }}" style="width: 100%;">
            <br/>
        </div>
    @endforeach
</body>

</html>
