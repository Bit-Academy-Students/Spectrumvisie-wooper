<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Roles;
use App\Models\Materiaal;
use App\Models\MaterialType;
use Illuminate\Http\Request;
use App\Models\MaterialAccess;

class MateriaalController extends Controller
{
    public function showAll()
    {
        return [
            'types' => MaterialType::all(),
            'roles' => Roles::where('role_name', '!=', 'admin')->get(),
            'categories' => Category::all(),
            'materiaal' => Materiaal::all()
        ];
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
            'category_id' => 'required|exists:categories,id',
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

        // ---------- FILE VALIDATION ----------
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

        // ---------- URL HANDLING ----------
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

        // ---------- SAVE MATERIAL ----------
        $materiaal = Materiaal::create([
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'],
            'material_type_id' => $validated['material_type_id'],
            'category_id' => $validated['category_id'],
            'URL' => $finalUrl,
            'file_path' => $filePath,
        ]);

        // ---------- SAVE PERMISSIONS ----------
        $this->savePermissions(
            $materiaal->id,
            $request->can_view ?? [],
            $request->can_download ?? []
        );

        return back()
            ->with('success', 'Upload succesvol!')
            ->with('uploaded', $materiaal->load('materialType'));
    }

    private function savePermissions($materialId, $viewRoles, $downloadRoles)
    {
        $roles = array_unique(array_merge($viewRoles, $downloadRoles));

        foreach ($roles as $roleId) {
            MaterialAccess::updateOrCreate(
                [
                    'materiaal_id' => $materialId,
                    'role_id' => $roleId
                ],
                [
                    'can_view' => in_array($roleId, $viewRoles),
                    'can_download' => in_array($roleId, $downloadRoles)
                ]
            );
        }

        $admin = Roles::where('role_name', 'admin')->first();
        if ($admin) {
            MaterialAccess::updateOrCreate(
                ['materiaal_id' => $materialId, 'role_id' => $admin->id],
                ['can_view' => true, 'can_download' => true]
            );
        }
    }
}
