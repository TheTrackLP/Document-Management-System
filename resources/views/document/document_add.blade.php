@extends('admin.body.header')
@section('admin')
<style>
.form-control:hover,
.form-select:hover {
    border-color: #0d6efd;
    box-shadow: 0 0 5px rgba(13, 110, 253, 0.4);
    transition: 0.2s ease-in-out;
}

.form-control:focus,
.form-select:focus {
    border-color: #0a58ca;
    box-shadow: 0 0 5px rgba(10, 88, 202, 0.4);
}

.btn-primary:hover {
    background-color: #0b5ed7;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    transition: 0.2s ease;
}
</style>

<div class="container-fluid mt-4">
    <form method="post" action="{{ route('document.store') }}" enctype="multipart/form-data" id="documentForm">
        @csrf
        <div class="card shadow-sm p-4 mb-4">
            <h4 class="mb-3 fw-bold">Upload Document</h4>
            <div class="row g-4">
                <div class="col-md-6 form-group">
                    <label class="form-label fw-semibold">Document Title</label>
                    <input type="text" name="doc_title" class="form-control" placeholder="Enter document title">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label fw-semibold">Document Type</label>
                    <select name="doc_type" class="form-select">
                        <option value="" disabled selected>Select type</option>
                        <option value="trade">Trading</option>
                        <option value="bid">Bidding</option>
                        <option value="ex">Example</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label fw-semibold">Employee Name</label>
                    <input type="text" name="emp_name" class="form-control" placeholder="Name of employee">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label fw-semibold">Year</label>
                    <input type="text" name="year" class="form-control" placeholder="e.g. 2025">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label fw-semibold">Upload File</label>
                    <input type="file" name="upload_file" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label fw-semibold">Who Can View This Document</label>
                    <select name="authorize" class="form-select">
                        <option value="" disabled selected>Select audience</option>
                        <option value="1">Employee</option>
                        <option value="2">Admin</option>
                        <option value="3">Admin and Employee</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-success px-5">Submit</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#documentForm').validate({
        rules: {
            doc_title: {
                required: true,
            },
            doc_type: {
                required: true,
            },
            emp_name: {
                required: true,
            },
            year: {
                required: true,
            },
            upload_file: {
                required: true,
            },
            authorize: {
                required: true,
            },
        },
        messages: {
            doc_title: {
                required: 'Please Enter Document Title',
            },
            doc_type: {
                required: 'Please Enter Document Type',
            },
            emp_name: {
                required: 'Please Enter Employee Name',
            },
            year: {
                required: 'Please Enter Year',
            },
            upload_file: {
                required: 'Please Select File',
            },
            authorize: {
                required: 'Please Select Authorize User',
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