<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Platform</title>
</head>

<body>
    <ul class="mb-0">
        <li>current category: {{ $category->name }}
        </li>
    </ul>
    <ul class="mb-0">
        @foreach ($materiaal as $item)
            <li>{{ $item->title }}<br>{{ $item->description }}</li>
        @endforeach
    </ul>
</body>
