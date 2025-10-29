<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function DocumentStore(Request $request){
        $request->validate([
           'doc_title' => 'required',
           'doc_type' => 'required',
           'emp_name' => 'required',
           'year' => 'required',
           'upload_file' => 'required',
           'authorize' => 'required',
        ]);

        $path = '';
        $date = date('Ymd_His');

        if($request->hasFile('upload_file')){
            $file = $request->file('upload_file');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ', '', $request->emp_name) . '_' . $date . '.' . $extension;
            $file->move(public_path('documents'), $filename);
            $path = 'documents/' . $filename;
        }

        Document::create([
           'doc_title' => $request->doc_title,
           'doc_type' => $request->doc_type,
           'emp_name' => $request->emp_name,
           'year' => $request->year,
           'upload_file' => $path,
           'authorize' => $request->authorize,
        ]);

        return redirect()->back();
    }
}