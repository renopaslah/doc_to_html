<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;

class ConvertController extends Controller
{
    public function index()
    {
        return view('convert-doc');
    }

    public function convert(Request $request)
    {
        // Validasi bahwa file dokumen telah diunggah
        $request->validate([
            'doc' => 'required|mimes:doc,docx|max:2048',
        ]);

        // Mendapatkan path file doc dari request
        $docPath = $request->file('doc')->path();

        // Load the Word document
        $phpWord = IOFactory::load($docPath);

        // Save the Word document as HTML
        $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
        $htmlPath = storage_path('app/public/converted.html'); // Sesuaikan dengan direktori penyimpanan yang diinginkan
        $htmlWriter->save($htmlPath);

        // Tampilkan path file HTML atau simpan ke file, sesuai kebutuhan Anda
        return view('convert-doc', ['htmlPath' => $htmlPath]);
    }
}
