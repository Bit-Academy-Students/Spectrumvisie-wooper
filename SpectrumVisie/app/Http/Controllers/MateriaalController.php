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
        return $types;

    }

    protected function youtubeEmbedUrl($url)
    {
        if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
            $id = $matches[1];
        } elseif (preg_match('/v=([^\&]+)/', $url, $matches)) {
            $id = $matches[1];
        } else {
            return null;
        }

        return "https://www.youtube.com/embed/$id";
    }


    public function upload(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'description' => 'required|string',
            'material_type_id' => 'required|exists:material_type,id',
            'URL' => 'nullable|string',
            'file' => 'nullable|file|max:20480',
        ]);

        $filePath = null;

        $materialType = MaterialType::find($validated['material_type_id']);
        $type = $materialType->type;

        $allowedExtensions = [
            'pdf' => ['pdf'],
            'word' => ['doc', 'docx'],
            'video' => ['mp4'],
            'youtube-link' => [],
            'artikel' => [],
        ];

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $ext = strtolower($file->getClientOriginalExtension());

            if (!in_array($ext, $allowedExtensions[$type])) {
                return back()->withErrors(['file' => 'Ongeldig bestandstype voor geselecteerd materiaal type.'])
                    ->withInput();
            }

            if (filled($validated['URL'])) {
                return back()->withErrors(['file' => 'Een link is niet toegestaan voor dit materiaal type.'])
                    ->withInput();
            }

            $filePath = $file->store('materials', 'public');
        } else {

            if (!in_array($type, ['youtube-link', 'artikel'])) {
                return back()->withErrors(['file' => 'Bestand is verplicht voor dit materiaal type.'])
                    ->withInput();
            }
        }


        $finalUrl = null;

        if ($type === 'youtube-link') {

            if (empty($validated['URL'])) {
                return back()->withErrors(['URL' => 'YouTube link is verplicht.'])->withInput();
            }

            $finalUrl = $this->youtubeEmbedUrl($validated['URL']);
            if (!$finalUrl) {
                return back()->withErrors(['URL' => 'Ongeldige YouTube URL.'])->withInput();
            }
        } elseif ($type === 'artikel') {

            if (empty($validated['URL'])) {
                return back()->withErrors(['URL' => 'Artikel link is verplicht.'])->withInput();
            }

            $finalUrl = $validated['URL'];
        }

        $materiaal = Materiaal::create([
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'],
            'material_type_id' => $validated['material_type_id'],
            'URL' => $finalUrl,
            'file_path' => $filePath,
        ]);

        return back()
            ->with('success', 'Upload succesvol!')
            ->with('uploaded', $materiaal->load('materialType'));
    }
}
