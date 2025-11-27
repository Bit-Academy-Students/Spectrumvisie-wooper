<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Platform</title>
</head>

<body>
    
    <h1>Overzicht Materiaal</h1>
    <div class="container">


        <div>
            <ul class="mb-0">
                @foreach ($data['categories'] as $category)
                <li><a href="/category/{{ $category->id }}">{{ $category->code }} - {{ $category->name }}</a></li>

                @endforeach
            </ul>
        </div>
    </div>

</body>

</html>
