<div class="container">
    <h1>Upload Materiaal</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Titel</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Beschrijving *</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Materiaal Type *</label>
            <select name="material_type_id" class="form-control" required>
                <option value="">-- Selecteer --</option>
                @foreach($types as $type)
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
</div>
