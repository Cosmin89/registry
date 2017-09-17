@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }} worked hours </div>

                <div class="panel-body">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hours</th>
                            <th>Date</th>
                            <th>Month</th>
                        </tr>
                    </thead>
                        <tbody>
                           @foreach($workhours as $wh)
                            <tr>
                                <th>{{ $wh->id }}</th>
                                <td>{{$wh->hours}}</td>
                                <td> {{ $wh->workdate }}</td>
                                <td>{{$wh->month }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                {{ $workhours->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
