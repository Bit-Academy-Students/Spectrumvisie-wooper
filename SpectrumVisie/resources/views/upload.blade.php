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
            <label>URL (optioneel)</label>
            <input type="text" name="URL" class="form-control">
        </div>

        <div class="mb-3">
            <label>Upload Bestand (optioneel)</label>
            <input type="file" name="file" class="form-control">
        </div>

        <div class="mb-3">
            <label>Wie mag dit materiaal bekijken? (meerdere mogelijk)</label>
            <select name="can_view[]" class="form-control" multiple>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                @endforeach
            </select>
            <small>Ctrl/Cmd ingedrukt houden om meerdere te selecteren</small>
        </div>

        <div class="mb-3">
            <label>Wie mag dit materiaal downloaden? (meerdere mogelijk)</label>
            <select name="can_download[]" class="form-control" multiple>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                @endforeach
            </select>
        </div>

        <select name="category_id" class="form-control" required>
            <option value="">-- Selecteer --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->code }} - {{ $category->name }}
                </option>
            @endforeach
        </select>




        <button class="btn btn-primary" type="submit">Upload</button>
    </form>

    @if (session('uploaded'))
        @php
            $uploaded = session('uploaded');
            $ext = $uploaded->file_path ? strtolower(pathinfo($uploaded->file_path, PATHINFO_EXTENSION)) : null;
        @endphp

        <h3 class="mt-4">Geüpload Materiaal:</h3>

        <p><strong>{{ $uploaded->title }}</strong></p>
        <p>{{ $uploaded->description }}</p>

        @if ($uploaded->materialType->type === 'youtube-link')
            <h5>YouTube Video:</h5>
            <iframe width="560" height="315" src="{{ $uploaded->URL }}" frameborder="0" allowfullscreen>
            </iframe>
        @endif

        @if ($uploaded->materialType->type === 'artikel')
            <h5>Artikel Link:</h5>
            <a href="{{ $uploaded->URL }}" target="_blank">{{ $uploaded->URL }}</a>
        @endif

        @if ($uploaded->file_path)
            @php
                $url = asset('storage/' . $uploaded->file_path);
            @endphp

            @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                <h5>Afbeelding:</h5>
                <img src="{{ $url }}" class="img-fluid rounded" style="max-width:300px;">
            @elseif ($ext === 'mp4')
                <h5>Video:</h5>
                <video width="400" controls>
                    <source src="{{ $url }}">
                </video>
            @elseif ($ext === 'pdf')
                <h5>PDF:</h5>
                <img src="{{ asset('storage/' . $uploaded->materialType->icon) }}" style="width:40px" alt="icon">

                <embed src="{{ $url }}" type="application/pdf" width="100%" height="600px" />
            @else
                <h5>Download Bestand:</h5>
                <a href="{{ $url }}" download>Download bestand</a>
            @endif
        @endif
    @endif
