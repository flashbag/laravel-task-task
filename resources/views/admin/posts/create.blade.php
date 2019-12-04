@extends('layouts.app')

@section('content')

  <div class="row">

    <div class="col-md-6">
      <h2>Add new post</h2>
    </div>

  </div>

<br/>

<form method="POST" action="{{ $action }}">

  {{ csrf_field() }}
  {!! method_field($method) !!}


   <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="title">
                    title <span class="text-danger">*</span>
                    <br>
                    @if ($errors->has('title'))
                        <i class="fa fa-times-circle-o text-danger">
                            {{ $errors->first('title') }}
                        </i>
                    @endif
                </label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" >
            </div>
        </div>
    </div>


   <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="body">
                    body <span class="text-danger">*</span>
                    <br>
                    @if ($errors->has('body'))
                        <i class="fa fa-times-circle-o text-danger">
                            {{ $errors->first('body') }}
                        </i>
                    @endif
                </label>
                <textarea class="form-control" cols="40" rows="10" name="body">{{ old('body') }}</textarea>
            </div>
        </div>
    </div>


  <div class="row">
    <div class="form-group col-md-4">
      <button type="submit" class="btn btn-success">create</button>
    </div>
  </div>


</form>


@endsection
