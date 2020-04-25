@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Logs</div>
                <div class="card-body filterable">
                    @if ($logs->count() > 0)
                    <table class="table table-bordered">
                        <tr>
                            <th>Sr No</th>
                            <th>Created by Name</th>
                            <th>Created for Name</th>
                            <th>Action</th>
                            <th>Created Date</th>
                        </tr>
                            @php $cnt = 1; @endphp
                            @foreach($logs as $key => $log)
                            <tr>
                                <td>{{ $cnt++ }}</td>
                                <td>{{ $log->created_by_name }}</td>
                                <td>{{ $log->created_for_name }}</td>
                                <td><label class="label label-info">{{ $log->action }}</label></td>
                                <td><button class="btn btn-danger btn-sm">{{date('Y-m-d', strtotime($log->created_at)) }}</button></td>
                            </tr>
                            @endforeach
                    </table>
                    @else
                        <p>No Record Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
