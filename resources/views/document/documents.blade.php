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
            <a class="btn btn-primary float-end px-4" href="{{ route('document.add') }}">Add Document</a>
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
                    @foreach ($docs as $doc)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-center">{{ $doc->doc_title }}</td>
                        <td class="text-center">{{ $doc->doc_type }}</td>
                        <td class="text-center">{{ $doc->emp_name }}</td>
                        <td class="text-center">{{ $doc->year }}</td>
                        <td class="text-center"><a href="{{ asset($doc->upload_file) }}" target="_blank">View
                                Document</a>
                        </td>
                        <td class="text-center">
                            @if($doc->authorize == 1)
                            <span class="badge bg-primary">Employee</span>
                            @elseif($doc->authorize == 1)
                            <span class="badge bg-danger">Admin</span>
                            @elseif($doc->authorize == 1)
                            <span class="badge bg-success">Admin & Employee</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection