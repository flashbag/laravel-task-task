@extends('layouts.app')

@section('content')

  <div class="row">

    <div class="col-md-6">
      <h2>Edit post</h2>
    </div>

  </div>

<br/>

<form method="POST" action="{{ $action }}">

  {{ csrf_field() }}
  {!! method_field($method) !!}

  <input type="hidden" name="id" value="{{ $item['id'] }}">

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
                <input type="text" name="title" class="form-control" value="{{ old('title', $item['title']) }}" >
            </div>
        </div>
    </div>

  <div class="row">
      <div class="col-md-2">
        <a class="btn btn-block btn-primary" id="search-image">search image</a>
      </div>
      <div class="col-md-2">
        <a class="btn btn-block btn-primary" id="insert-image">insert image</a>
      </div>
  </div>

  <br>

  <div class="row">
      <div class="col-md-12" id="image-block">
      </div>
  </div>

  <br>

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
                <textarea class="form-control" cols="40" rows="10" name="body">{{ old('body', $item['body']) }}</textarea>
            </div>
        </div>
    </div>


  <div class="row">
    <div class="form-group col-md-4">
      <button type="submit" class="btn btn-success">update</button>
    </div>
  </div>


</form>

@endsection


@push('scripts')
<script>

  $(function(){

    function getRandomInt(min, max) {

        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;

    }

    var image = {};
    var $textarea = $('textarea[name="body"]');

    function searchImage() {

      var title = $('input[name="title"]').val()

      $.ajax({
        url: '{{ route("search-image") }}/?query=' + title ,
        method: 'GET',
        dataType: 'json',
        success: function (response) {

          console.log(response);

          image = {};
          $('#image-block').html('');

          if (response.hasOwnProperty('hits') && response.hits.length) {
            var hitsLastKey = response.hits.length - 1;

            var randomKey = getRandomInt(0, hitsLastKey);
            image = response.hits[randomKey];

            $('#image-block').html('<img src="' + image.previewURL + '">');
          }
        },
        error: function (response) {
          alert('Error!');
        }
      });

    }

    function insertImage() {

      var body = $textarea.val();

      var imageTag = '<img src="' + image.webformatURL + '"><br>'

      $textarea.val(imageTag + body);

    }

    $('#search-image').on('click', searchImage);
    $('#insert-image').on('click', insertImage);

  });

</script>
@endpush