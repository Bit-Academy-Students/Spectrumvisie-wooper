<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Platform</title>
</head>

<body>
    @php
        // $userRole = auth()->user()->role_id;
    @endphp
    <ul class="mb-0">
        <li>Huidige categorie: {{ $data['category']->name }}
        </li>
    </ul>
    <ul class="mb-0">
        @foreach ($data['materiaal'] as $item)
        <?php
            if ($data['userRole']) {
                $item->user_access = $item->access->where('role_id', $data['userRole'])->first();
            } else {
                $item->user_access = null;
            }
            ?>
        <li>
            <h3>{{ $item->title }}</h3>
            <p>Type: {{ $item->materialType->type }}</p>
            @if ($item->user_access && $item->user_access->can_view)
                <a href="{{ route('materials.view', $item->id) }}">Bekijken</a>
            @endif

            {{-- @if ($hasAccess && $hasAccess->can_download && !in_array($item->material_type_id, [4, 5])) --}}
            @if ($item->user_access && $item->user_access->can_download && !in_array($item->material_type_id, [4, 5]))
                <a href="{{ route('materials.download', $item->id) }}">Downloaden</a>
            @endif
        </li>
        @endforeach
    </ul>
</body>
