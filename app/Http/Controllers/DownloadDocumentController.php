<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\CompanyDocumentDownload;

class DownloadDocumentController extends Controller
{
    public function store(Request $request)
    {
        /** @var \App\Settings\ContactUsSetting $setting */
        $setting = app(\App\Settings\ContactUsSetting::class);
        $companyDoc = $setting->company_document;

        $request->merge([
            'metadata' => json_encode(['ip' => $request->ip()])
        ]);

        CompanyDocumentDownload::store($request->toArray());

        $downloadUrl = public_url($companyDoc);
            
        // Return the download URL as a JSON response
        return response()->json(['downloadUrl' => $downloadUrl]);
    }
}
