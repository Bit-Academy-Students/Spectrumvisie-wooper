<!DOCTYPE html>
<html>

<head>
    <title>View Material</title>
</head>

<body>
    <h1>{{ $item->title }}</h1>
    <p><strong>Description:</strong> {{ $item->description }}</p>
    <p><strong>Category:</strong> {{ $item->category->name }}</p>
    <p><strong>Type:</strong> {{ $item->materialType->type }}</p>

    @if ($item->file_path)
        <p><strong>File:</strong> {{ $item->file_path }}</p>
    @endif

    @if ($item->URL)
        <p><strong>URL:</strong> <a href="{{ $item->URL }}" target="_blank">{{ $item->URL }}</a></p>
    @endif

    @if ($item->materialType->type === 'pdf')
        <embed src="{{ route('materials.stream', $item->id) }}" type="application/pdf" width="60%" height="600px">
    @elseif ($item->materialType->type === 'youtube-link')
        <iframe width="560" height="315" src="{{ $item->URL }}" frameborder="0" allowfullscreen></iframe>
    @elseif ($item->materialType->type === 'video')
        <video width="400" controls>
            <source src="{{ route('materials.stream', $item->id) }}">
        </video>
    @elseif ($item->materialType->type === 'artikel')
        <a href="{{ $item->URL }}" target="_blank">Open Artikel</a>
    @else
        @php
            $userRole = auth()->user()->role_id;
            $hasAccess = $item->access->where('role_id', $userRole)->first();
        @endphp

        @if ($hasAccess && $hasAccess->can_download)
            <a href="{{ route('materials.download', $item->id) }}">Download</a>
        @endif
    @endif
</body>

</html>
