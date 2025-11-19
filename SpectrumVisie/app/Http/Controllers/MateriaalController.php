<?php

namespace App\Http\Controllers;

use App\Models\Materiaal;
use App\Models\MaterialType;
use Illuminate\Http\Request;

class MateriaalController extends Controller
{
    public function showUploadForm()
    {
        $types = MaterialType::all();
        return view('upload', compact('types'));
    }

    public function upload(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'description' => 'required|string',
            'material_type_id' => 'required|exists:material_type,id',
            'youtube_url' => 'nullable|string',
            'file' => 'nullable|file|max:20480',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('materials', 'public');
        }

        Materiaal::create([
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'],
            'material_type_id' => $validated['material_type_id'],
            'youtube_url' => $validated['youtube_url'] ?? null,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Upload succesvol!');
    }
}
