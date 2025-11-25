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
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Document Title</th>
                        <th class="text-center">Version</th>
                        <th class="text-center">File</th>
                        <th class="text-center">Updated By</th>
                        <th class="text-center">Statuses</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($revs as $rev)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-center">{{ $rev->doc_title }}</td>
                        <td class="text-center">{{ $rev->version }}</td>
                        <td class="text-center">
                            <a href="{{ asset($rev->file_path) }}" class="btn btn-sm btn-primary"
                                target="_blank">View</a>
                        </td>
                        <td class="text-center">{{ $rev->updated_by }}</td>
                        <td class="text-center">
                            @if($rev->is_current == 1)
                            <span class="badge bg-success">Current</span>
                            @else
                            <span class="badge bg-secondary">Old</span>
                            @endif
                            <!-- @if($rev->approval_status == 0)
                            <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($rev->approval_status == 1)
                            <span class="badge bg-success">Approved</span>
                            @elseif($rev->approval_status == 2)
                            <span class="badge bg-danger">Rejected</span>
                            @endif -->
                        </td>
                        <td class="text-center">{{ $rev->created_at->format('M d, Y') }}</td>
                        <td class="text-center">
                            @if($rev->is_current == 0)
                            <a href="{{ route('revise.setActive', $rev->id) }}" class="btn btn-sm btn-success">
                                Set Active
                            </a>
                            @endif
                            <!-- <a href="" class="btn btn-sm btn-primary">Approve</a>
                            <a href="" class="btn btn-sm btn-danger">Reject</a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="modal fade" id="reviseDocs" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('revise.store') }}" id="docReviseForm" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    Document Revision Form
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="doc_id" class="form-label">Document</label>
                            <select name="doc_id" id="doc_id" class="form-select select2">
                                <option value="" selected disabled>Select Document</option>
                                @foreach ($docs as $doc)
                                <option value="{{ $doc->id }}">{{ $doc->doc_title }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a document.</div>
                        </div>
                        <div class="col-md-3">
                            <label for="version" class="form-label">Version</label>
                            <input type="text" name="version" id="version" class="form-control"
                                placeholder="e.g., v1.1">
                            <div class="invalid-feedback">Please enter the version.</div>
                        </div>
                        <div class="col-md-3">
                            <label for="revision_date" class="form-label">Revision Date</label>
                            <input type="date" name="revision_date" id="revision_date" class="form-control"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="file_path" class="form-label">Upload File</label>
                            <input type="file" name="file_path" id="file_path" class="form-control">
                            <div class="invalid-feedback">Please upload the revised document.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="updated_by" class="form-label">Updated By</label>
                            <input type="text" name="updated_by" id="updated_by" class="form-control"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="col-12">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" rows="3"
                                placeholder="Optional remarks or notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-success px-4">Submit Revision</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#docReviseForm').validate({
        rules: {
            doc_id: {
                required: true,
            },
            version: {
                required: true,
            },
            revision_date: {
                required: true,
            },
            file_path: {
                required: true,
            },
        },
        messages: {
            doc_id: {
                required: 'Please Select Document',
            },
            version: {
                required: 'Please Enter Document Version',
            },
            revision_date: {
                required: 'Please Enter Date',
            },
            file_path: {
                required: 'Please Select File',
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });
});
</script>

@endsection