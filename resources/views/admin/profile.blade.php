@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }} worked hours </div>

                <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="is active"><a data-toggle="tab" href="#workhours">Work hours logged</a></li>
                    <li><a data-toggle="tab" href="#freedays">Free days logged</a></li>
                </ul>

                <div class="tab-content">
                        <div id="workhours" class="tab-pane fade in active">
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

                        <div id="freedays" class="tab-pane fade">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Days Off</th>
                                    <th>Month</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($freedays as $fd)
                                    <tr>
                                        <th>{{ $fd->id }}</th>
                                        <td>{{$fd->start_date}}</td>
                                        <td> {{ $fd->end_date }}</td>
                                        <td>{{$fd->total_free_days }}</td>
                                        <td>{{ $fd->month }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                        {{ $freedays->links() }}
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
