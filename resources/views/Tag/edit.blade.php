@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Tag</h2>
        </div>
        {{-- <div class="pull-right">
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" href="{{ route('categories.index') }}">Cancel</button>
        </div> --}}
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tags.update', $tag->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $tag->title }}" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $tag->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Update Tag</button>
        </div>

        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{ route('tags.index') }}">Cancel</a>

          </button>
    </div>

</form>
@endsection
