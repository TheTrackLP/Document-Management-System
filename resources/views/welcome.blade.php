<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <form method="post" action="{{ route('docs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="">Document Title</label>
                        <input type="text" name="doc_title" id="doc_title" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="">Document Type</label>
                        <select name="doc_type" id="doc_type" class="form-control">
                            <option value="" selected disabled>Select an option</option>
                            <option value="trade">Trading</option>
                            <option value="bid">Bidding</option>
                            <option value="ex">Example</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="">Employee Name</label>
                        <input type="text" name="emp_name" id="emp_name" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="">Year</label>
                        <input type="text" name="year" id="year" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="">Upload File</label>
                        <input type="file" name="upload_file" id="upload_file" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="">Who can view This Document</label>
                        <select name="authorize" id="authorize" class="form-control">
                            <option value="" selected disabled>Select an option</option>
                            <option value="1">Employee</option>
                            <option value="2">Admin</option>
                            <option value="3">Admin and Employee</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>