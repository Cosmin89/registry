<form class="form-horizontal" method="POST" action="{{ route('logworkhours') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
        <label for="hours" class="col-md-4 control-label">Worked hours</label>

        <div class="col-md-6">
            <input id="hours" type="text" class="form-control" name="hours" value="{{ old('hours') }}" required autofocus>

            @if ($errors->has('hours'))
                <span class="help-block">
                    <strong>{{ $errors->first('hours') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('workdate') ? ' has-error' : '' }}">
        <label for="workdate" class="col-md-4 control-label">Pick date</label>

        <div class="col-md-6">
            <input id="datepicker" type="text" class="form-control" name="workdate" value="{{ old('workdate') }}" required>

            @if ($errors->has('workdate'))
                <span class="help-block">
                    <strong>{{ $errors->first('workdate') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
</form>