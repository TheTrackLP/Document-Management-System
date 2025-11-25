<?php

namespace App\Http\Controllers;

use App\Models\Document_revisions;
use App\Models\Documents;
use Illuminate\Http\Request;
use Validator;

class DocumentsController extends Controller
{
    public function DocumentManage(){
        $docs = Documents::all();
        $doc_revs = Document_revisions::where('is_current', 1)->get()->keyBy('doc_id');
        return view('document.documents', compact('docs', 'doc_revs'));
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
            $filename = str_replace(' ', '', $request->doc_title). '_' . str_replace(' ', '', $request->emp_name) . '_' . $date . '.' . $extension;
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

        return redirect()->route('document.dash')
                         ->with([
                            'message' => 'Document Stored Success!',
                            'alert-type' => 'success'
                         ]);
    }

    public function RevisedDocuments(){
        $docs = Documents::all();
        $revs = Document_revisions::select(
                                    "document_revisions.*",
                                    "documents.doc_title"
                                )
                                ->join('documents', 'documents.id', '=', 'document_revisions.doc_id')
                                ->get();
        return view('revision.revisions', compact('docs','revs'));
    }

    public function RevisedDocumentsStore(Request $request){
        $valid = Validator::make($request->all(), [
            'doc_id' => 'required',
            'version' => 'required',
            'file_path' => 'required',
            'updated_by' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('revise.docs')
                             ->with([
                                'message' => 'Error, Try Again',
                                'alert-type' => 'error'
                             ]);
        }

        $path = '';
        $date = date('Ymd_His');

        if($request->hasFile('file_path')){
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ', '.', $request->version) . '_' . $date . '.' . $extension;
            $file->move(public_path('revisions'), $filename);
            $path = 'revisions/' . $filename;
        }

        Document_revisions::create([
            'doc_id' => $request->doc_id,
            'version' => $request->version,
            'file_path' => $path,
            'updated_by' => $request->updated_by,
            'remarks' => $request->remarks,
            'is_current' => 0,
            'approval_status' => 0,
        ]);
        
        return redirect()->route('revise.docs')
                         ->with([
                            'message' => 'Document Stored Success!',
                            'alert-type' => 'success'
                         ]);
    }

    public function RevisedDocumentActive($id){
        $revisions = Document_revisions::findOrFail($id);

        Document_revisions::where('doc_id', $revisions->doc_id) 
                            ->update([
                                'is_current' => 0,
                            ]);

        $revisions->update([
            'is_current' => 1
        ]);

        return redirect()->route('revise.docs')
                         ->with([
                            'message' => 'Revised Document Success!',
                            'alert-type' => 'success'
                         ]); 
    }
}