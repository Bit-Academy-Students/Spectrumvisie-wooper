<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Roles;
use App\Models\Materiaal;
use App\Models\MaterialType;
use Illuminate\Http\Request;
use App\Models\MaterialAccess;

class OverzichtController extends Controller
{
    public function showCategory($id)
    {
        $categoryContent = Category::findOrFail($id);

        return [
            'category' => Category::findOrFail($id),
            'materiaal' => Materiaal::where('category_id', $id)->get(),
        ];
    }
}
