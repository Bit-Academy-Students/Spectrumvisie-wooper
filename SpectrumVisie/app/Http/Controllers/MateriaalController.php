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

<<<<<<< HEAD
    protected function youtubeEmbedUrl($url)
    {
        if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
            $id = $matches[1];
        }
        elseif (preg_match('/v=([^\&]+)/', $url, $matches)) {
            $id = $matches[1];
        } else {
            return null;
        }

        return "https://www.youtube.com/embed/$id";
    }


=======
>>>>>>> 9790a62 (start uploading material)
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

<<<<<<< HEAD
        $materialType = MaterialType::find($validated['material_type_id']);
        $type = $materialType->type;

        $allowedExtensions = [
            'pdf' => ['pdf'],
            'word' => ['doc', 'docx'],
            'video' => ['mp4', 'mov', 'avi', 'webm'],
            'youtube-link' => [],
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext = strtolower($file->getClientOriginalExtension());

            if (!in_array($ext, $allowedExtensions[$type])) {
                return redirect()->back()
                    ->withErrors(['file' => 'Ongeldig bestandstype voor geselecteerd materiaal type.'])
                    ->withInput();
            }

            if (filled($validated['youtube_url'])) {
                return redirect()->back()
                    ->withErrors(['file' => 'Een link is niet toegestaan voor dit materiaal type.'])
                    ->withInput();
            }
            $filePath = $file->store('materials', 'public');
        } else {
            $filePath = null;

            if ($type !== 'youtube-link') {
                return redirect()->back()
                    ->withErrors(['file' => 'Bestand is verplicht voor dit materiaal type.'])
                    ->withInput();
            }
        }

        $youtubeEmbed = null;
        if ($type === 'youtube-link' && !empty($validated['youtube_url'])) {
            $youtubeEmbed = $this->youtubeEmbedUrl($validated['youtube_url']);
            if (!$youtubeEmbed) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'youtube_url' => 'Ongeldige YouTube URL.',
                ]);
            }
        }


        $materiaal = Materiaal::create([
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'],
            'material_type_id' => $validated['material_type_id'],
            'youtube_url' => $youtubeEmbed ?? null,
            'file_path' => $filePath,
        ]);

        return redirect()->back()
            ->with('success', 'Upload succesvol!')
            ->with('uploaded', $materiaal);
=======
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
>>>>>>> 9790a62 (start uploading material)
    }
}
