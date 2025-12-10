<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class certificateController extends Controller
{
    public function insertCertificate(Request $request)
    {
        $request->validate([
            'certificaat' => "string|required"
        ]);

        $certificate = Certificate::create([
            'certificate_code' => $request->certificaat
        ]);

        if ($certificate) {
            return back()->with('success', 'Certificaat toegevoegd');
        }

        return back()->with('error', 'kon certificaat niet toevoegen');
    }
}
