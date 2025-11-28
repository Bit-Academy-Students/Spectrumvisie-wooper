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
                @foreach ($data['types'] as $type)
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
                @foreach ($data['roles'] as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                @endforeach
            </select>
            <small>Ctrl/Cmd ingedrukt houden om meerdere te selecteren</small>
        </div>

        <div class="mb-3">
            <label>Wie mag dit materiaal downloaden? (meerdere mogelijk)</label>
            <select name="can_download[]" class="form-control" multiple>
                @foreach ($data['roles'] as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                @endforeach
            </select>
        </div>

        <select name="category_id" class="form-control" required>
            <option value="">-- Selecteer --</option>
            @foreach ($data['categories'] as $category)
                <option value="{{ $category->id }}">
                    {{ $category->code }} - {{ $category->name }}
                </option>
            @endforeach
        </select>
        <br>

        <button class="btn btn-primary" type="submit">Upload</button>
    </form>

