@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-md-6">
		<h2>Posts</h2>
	</div>

	<div class="col-md-6">
		<a href="{{ route('posts.create') }}" class="btn btn-success float-md-right">
			<i class="fa fa-plus"></i>
			<span>add new</span>
		</a>
	</div>

</div>

<br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th scope="col" class="text-center">id</th>
            <th scope="col" class="text-center">title</th>
			<th scope="col" class="text-center" colspan="2">actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $post)
		<tr>
			<td class="text-center">{{ $post->id }}</td>
			<td class="text-center">{{ $post->title }}</td>
			<td class="text-center">
				<a href="{{ route('posts.edit', $post->id) }}">
					<i class="fa fa-pencil edit-icon text-inverse m-r-10"></i>
					edit
				</a>
			</td>
			<td class="text-center">
				<a style="" data-href="{{ route('posts.destroy', $post->id)  }}" class="remove-item" data-item-id="{{ $post->id }}">
					<i class="fa fa-close icon-close text-danger"></i>
					delete
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{!! $items->appends(\Request::except('page'))->render() !!}
</div>

@endsection


@push('scripts')
<script>

	$(function(){

		function removeItem(url) {

			$.ajax({
				url: url,
				method: 'POST',
				data: {
					"_token": '{{ csrf_token() }}',
					"_method": 'DELETE'
				},
				success: function (response) {
					location.reload();
				},
				error: function (response) {
					alert('Error!')
				}
			});

		}

		$('.remove-item').on('click', function (e) {

			e.preventDefault();

			var self = this;

			var isConfirmed = confirm('Do you really want to delete item?');

			if (!isConfirmed) {
				return false;
			}

			// alert(isConfirmed);
			removeItem($(self).data('href'));

		});

	});

</script>
@endpush
