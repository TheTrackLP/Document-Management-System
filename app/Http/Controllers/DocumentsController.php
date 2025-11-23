<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Validator;

class DocumentsController extends Controller
{
    public function DocumentManage(){
        $docs = Documents::all();
        return view('document.documents', compact('docs'));
    }

    public function DocumentAdd(){
        return view('document.document_add');
    }

    public function DocumentStore(Request $request){
        $valid = Validator::make($request->all(), [
            'doc_title' => 'required',
            'doc_type' => 'required',
            'emp_name' => 'required',
            'year' => 'required',
            'upload_file' => 'required',
            'authorize' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('document.dash')
                             ->with([
                                'message' => 'Error, Try Again',
                                'alert-type' => 'error'
                             ]);
        }

        $path = '';
        $date = date('Ymd_His');

        if($request->hasFile('upload_file')){
            $file = $request->file('upload_file');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ', '', $request->emp_name) . '_' . $date . '.' . $extension;
            $file->move(public_path('documents'), $filename);
            $path = 'documents/' . $filename;
        }

        Documents::create([
           'doc_title' => $request->doc_title,
           'doc_type' => $request->doc_type,
           'emp_name' => $request->emp_name,
           'year' => $request->year,
           'upload_file' => $path,
           'authorize' => $request->authorize,
        ]);

        return redirect()->route('admin.dash')
                         ->with([
                            'message' => 'Document Stored Success!',
                            'alert-type' => 'success'
                         ]);
    }

    public function RevisedDocuments(){
        $docs = Documents::all();
        return view('revision.revisions', compact('docs'));
    }
}