<form class="form-horizontal" method="POST" action="{{ route('logfreedays') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
        <label for="start_date" class="col-md-4 control-label">Pick start date</label>

        <div class="col-md-6">
            <input id="startdatepicker" type="text" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
            @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
        <label for="start_date" class="col-md-4 control-label">Pick end date</label>

        <div class="col-md-6">
            <input id="enddatepicker" type="text" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
            @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_date') }}</strong>
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