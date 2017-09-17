@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }} - dashboard </div>

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="is active"><a data-toggle="tab" href="#logworkhours">Log Work Hours</a></li>
                        <li><a data-toggle="tab" href="#logfreedays">Log Free Days</a></li>
                    </ul>
     
                    <div class="tab-content">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        <div id="logworkhours" class="tab-pane fade in active">
                            <h3>Log Work Hours</h3>

                            @include('worker.partials.logworkhours')
                        </div>

                        <div id="logfreedays" class="tab-pane fade">
                            <h3>Log Free Days</h3>

                            @include('worker.partials.logfreedays')
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({dateFormat:'yy-mm-dd'});
    });

    $(document).ready(function() {
        $('#startdatepicker').datepicker({dateFormat:'yy-mm-dd'});
    });

    $(document).ready(function() {
        $('#enddatepicker').datepicker({dateFormat:'yy-mm-dd'});
    });
</script>
</script>
@endsection