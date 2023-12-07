<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Doc to HTML</title>
</head>
<body>
    <h1>Convert Doc to HTML</h1>

    @if(isset($htmlContent))
        <div>
            <h2>HTML Result:</h2>
            {!! $htmlContent !!}
        </div>
    @endif

    <form action="{{ route('convert-doc.convert') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="doc">Choose a .doc or .docx file:</label>
        <input type="file" name="doc" id="doc" accept=".doc, .docx">
        <button type="submit">Convert</button>
    </form>
</body>
</html>
