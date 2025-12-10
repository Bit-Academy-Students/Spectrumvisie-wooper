<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Roles;
use App\Models\Materiaal;
use App\Models\MaterialType;
use Illuminate\Http\Request;
use App\Models\MaterialAccess;
use Illuminate\Support\Facades\Storage;

class MateriaalController extends Controller
{
public function showAll()
{
    return [
        'types'      => MaterialType::all(),
        'roles'      => Roles::where('role_name', '!=', 'admin')->get(),
        'categories' => Category::all(),
        'materiaal'  => Materiaal::with(['materialType', 'category', 'access'])->get(),
    ];
}

    protected function youtubeEmbedUrl($url)
    {
        $pattern = '~(?:youtu\.be/|youtube\.com/(?:watch\?v=|shorts/|embed/))([A-Za-z0-9_-]+)~';

        if (preg_match($pattern, $url, $matches)) {
            $id = $matches[1];
            return "https://www.youtube.com/embed/{$id}";
        }

        return null;
    }

    public function upload(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'nullable|string',
            'description'      => 'required|string',
            'material_type_id' => 'required|exists:material_type,id',
            'category_id'      => 'required|exists:categories,id',
            'URL'              => 'nullable|string',
            'file'             => 'nullable|file|max:20480',
        ]);

        $filePath = null;

        $materialType = MaterialType::findOrFail($validated['material_type_id']);
        $type         = strtolower($materialType->type);
        $url          = $validated['URL'] ?? null;

        $allowedExtensions = [
            'pdf'          => ['pdf'],
            'word'         => ['doc', 'docx'],
            'video'        => ['mp4'],
            'youtube-link' => [],
            'artikel'      => [],
        ];

        // ---------- FILE VALIDATION ----------
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext  = strtolower($file->getClientOriginalExtension());

            if (
                !isset($allowedExtensions[$type]) ||
                !in_array($ext, $allowedExtensions[$type], true)
            ) {
                return back()
                    ->withErrors(['file' => 'Ongeldig bestandstype voor geselecteerd materiaal type.'])
                    ->withInput();
            }

            if (filled($url)) {
                return back()
                    ->withErrors(['file' => 'Een link is niet toegestaan voor dit materiaal type.'])
                    ->withInput();
            }

            $filePath = $file->store('materials', 'private');
        } else {
            if (!in_array($type, ['youtube-link', 'artikel'], true)) {
                return back()
                    ->withErrors(['file' => 'Bestand is verplicht voor dit materiaal type.'])
                    ->withInput();
            }
        }

        // ---------- URL HANDLING ----------
        $finalUrl = null;

        if ($type === 'youtube-link') {

            if (empty($url)) {
                return back()
                    ->withErrors(['URL' => 'YouTube link is verplicht.'])
                    ->withInput();
            }

            $finalUrl = $this->youtubeEmbedUrl($url);
            if (!$finalUrl) {
                return back()
                    ->withErrors(['URL' => 'Ongeldige YouTube URL.'])
                    ->withInput();
            }

        } elseif ($type === 'artikel') {

            if (empty($url)) {
                return back()
                    ->withErrors(['URL' => 'Artikel link is verplicht.'])
                    ->withInput();
            }

            $finalUrl = $url;
        }

        // ---------- SAVE MATERIAL ----------
        $materiaal = Materiaal::create([
            'title'            => $validated['title'] ?? null,
            'description'      => $validated['description'],
            'material_type_id' => $validated['material_type_id'],
            'category_id'      => $validated['category_id'],
            'URL'              => $finalUrl,
            'file_path'        => $filePath,
        ]);

        // ---------- SAVE PERMISSIONS ----------
        $this->savePermissions(
            $materiaal->id,
            $request->input('can_view', []),
            $request->input('can_download', [])
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
                    'role_id'      => $roleId,
                ],
                [
                    'can_view'     => in_array($roleId, $viewRoles),
                    'can_download' => in_array($roleId, $downloadRoles),
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

    public function updateAccess(Request $request, $id)
    {
        $materiaal = Materiaal::findOrFail($id);

        $viewRoles     = $request->input('can_view', []);
        $downloadRoles = $request->input('can_download', []);

        MaterialAccess::where('materiaal_id', $materiaal->id)->delete();

        $this->savePermissions($materiaal->id, $viewRoles, $downloadRoles);

        return back()->with('success', 'Toegangsrechten bijgewerkt.');
    }

    public function destroy($id)
{
    $materiaal = Materiaal::findOrFail($id);

    MaterialAccess::where('materiaal_id', $materiaal->id)->delete();

    if ($materiaal->file_path) {
        Storage::disk('private')->delete($materiaal->file_path);
    }

    $materiaal->delete();

    return back()->with('success', 'Materiaal verwijderd.');
}

}
