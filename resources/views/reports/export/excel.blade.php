@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Export to Excel</div>

                <div class="card-body">
                    <p>Click the button below to export data to Excel:</p>

                    <form action="{{ route('reports.export-excel') }}" method="GET">
                        <button type="submit" class="btn btn-success">Export to Excel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
