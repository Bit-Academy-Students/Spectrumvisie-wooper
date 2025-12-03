<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Roles;
use App\Models\Materiaal;
use App\Models\MaterialType;
use Illuminate\Http\Request;
use App\Models\MaterialAccess;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class OverzichtController extends Controller
{
    public function showCategory($id)
    {
        return [
            'category' => Category::findOrFail($id),
            'materiaal' => Materiaal::where('category_id', $id)->with(['materialType', 'access'])->get(),
        ];
    }

    public function userHasAccess($id, $rights)
    {
        $userRole = Auth::user()->role_id;
        $item = Materiaal::findOrFail($id);
        $hasAccess = $item->access->where('role_id', $userRole)->first();

        return ($hasAccess && $hasAccess->$rights) ? $item : null;
    }


    public function view($id) {
        $item = $this->userHasAccess($id, 'can_view');

        if (!$item) {
            return redirect('platform');
        }

        return $item;

    }

    public function download($id)
    {
        $item = $this->userHasAccess($id, 'can_download');

        if (!$item) {
            return redirect('platform');
        }

        return Storage::disk('private')->download($item->file_path);
    }
}
