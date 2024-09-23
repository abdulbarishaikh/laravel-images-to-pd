<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {

        $ipAddress = $request->ipAddress;
        $path = 'uploads/' . $ipAddress;
        $publicPath = public_path($path);
        echo $path;
        $filesInFolder = \File::files($publicPath );
        foreach ($filesInFolder as $folder) {
            $imagePath[] = $publicPath."/".pathinfo($folder)['basename'];
        }
        // dd($imagePath);
        $pdf = PDF::loadView('pdf.document', compact('imagePath'));

        return $pdf->stream('document.pdf');
    }

    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validating file type and size
        ]);

        // Store the uploaded file
        if ($request->file('file')) {
            $ipAddress = $request->ipAddress;
            $filePath = $request->file('file')->store('uploads/' . $ipAddress);  // Adjust storage path and disk if needed
            $seconds = 500;

            return response()->json(['file_path' => $filePath], 200);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
