@extends('admin.body.header')
@section('admin')
@php
$i = 1;
@endphp

<div class="container-fluid mt-4">
    <h3>Document Manage</h3>
    <hr>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary float-end px-4" data-bs-target="#reviseDocs" data-bs-toggle="modal">Revise
                Document</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Document Title</th>
                        <th class="text-center">Document Type</th>
                        <th class="text-center">Employee Name</th>
                        <th class="text-center">Year</th>
                        <th class="text-center">Original Document</th>
                        <th class="text-center">Authorize User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="reviseDocs" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                Document Revision Form
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="doc_id" class="form-label">Document</label>
                            <select name="doc_id" id="doc_id" class="form-select" required>
                                <option value="" selected disabled>Select Document</option>
                                @foreach ($docs as $doc)
                                <option value="{{ $doc->id }}">{{ $doc->title }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a document.</div>
                        </div>
                        <div class="col-md-3">
                            <label for="version" class="form-label">Version</label>
                            <input type="text" name="version" id="version" class="form-control" placeholder="e.g., v1.1"
                                required>
                            <div class="invalid-feedback">Please enter the version.</div>
                        </div>
                        <div class="col-md-3">
                            <label for="revision_date" class="form-label">Revision Date</label>
                            <input type="date" name="revision_date" id="revision_date" class="form-control"
                                value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="file_path" class="form-label">Upload File</label>
                            <input type="file" name="file_path" id="file_path" class="form-control" required>
                            <div class="invalid-feedback">Please upload the revised document.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="edited_by" class="form-label">Edited By</label>
                            <input type="text" name="edited_by" id="edited_by" class="form-control"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="pending" selected>Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" rows="3"
                                placeholder="Optional remarks or notes"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success px-4">Submit Revision</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection