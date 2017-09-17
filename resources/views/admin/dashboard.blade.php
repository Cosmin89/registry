@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        @foreach($months as $month)
                        <li class="{{ $month == 'jan' ? 'is active' : ' ' }}"><a data-toggle="tab" href="#{{$month}}">{{$month}}</a></li>
                        @endforeach
                    </ul>
     
                    <div class="tab-content">
                        @foreach($months as $month)
                        <div id="{{$month}}" class="{{ $month == 'jan' ? 'tab-pane fade in active' : 'tab-pane fade ' }}">
                            <h3>{{$month}}</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Total worked hours</th>
                                        <th>Total free days</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><a href="{{ route('profile', ['name' => $user->name]) }}">{{ $user->name }}</a></td>
                                            <td>{{ $user->workhours()->where('month', $month)->sum('hours') }}</td>
                                            <td>{{ $user->freedays()->where('month', $month)->sum('total_free_days') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
