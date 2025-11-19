<div class="container">
    <h1>Upload Materiaal</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Titel</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Beschrijving</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Materiaal Type</label>
            <select name="material_type_id" class="form-control" required>
                <option value="">-- Selecteer --</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ ucfirst($type->type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>YouTube URL (optioneel)</label>
            <input type="text" name="youtube_url" class="form-control">
        </div>

        <div class="mb-3">
            <label>Upload Bestand (optioneel)</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Upload</button>
    </form>

    @if (session('uploaded'))
        @php $uploaded = session('uploaded'); @endphp
        {{ $uploaded->title }}
        {{ $uploaded->description }}

        @if ($uploaded->youtube_url)
            <div class="mt-2">
                <h5>YouTube Video:</h5>
                <iframe width="560" height="315"
                    src="{{ $uploaded->youtube_url }}" frameborder="0"
                    allowfullscreen></iframe>
            </div>
        @endif


        @if ($uploaded->file_path)
            @php
                $url = asset('storage/' . $uploaded->file_path);
                $ext = strtolower(pathinfo($uploaded->file_path, PATHINFO_EXTENSION));
            @endphp

            <div class="mt-3">

                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                    <h5>Afbeelding:</h5>
                    <img src="{{ $url }}" class="img-fluid rounded" style="max-width:300px;">
                @elseif($ext === 'mp4')
                    <h5>Video:</h5>
                    <video width="400" controls>
                        <source src="{{ $url }}">
                        Your browser does not support video playback.
                    </video>
                @elseif($ext === 'pdf')
                    <h5>PDF:</h5>
                    <embed src="{{ $url }}" type="application/pdf" width="100%" height="600px" />
                @else
                    <h5>Download Bestand:</h5>
                    <a href="{{ $url }}" download>Download bestand</a>
                @endif

            </div>
        @endif
</div>
@endif

</div>
