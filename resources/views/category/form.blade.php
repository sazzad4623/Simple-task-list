@extends('layouts.app')




@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
        </div>
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

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection

{{-- @section('title', isset($category) ? 'Edit Task' : 'Add Task')



@section('content')
  <form method="POST"
    action="{{ isset($category) ? route('categories.update', ['category' => $category->id]) : route('categories.store') }}">
    @csrf
    @isset($category)
      @method('PUT')
    @endisset
    <div class="mb-4">
      <label for="title">
        Title
      </label>
      <input text="text" name="title" id="title"
      @class(['border-red-500' => $errors->has('title')])
        value="{{ $category->title ?? old('title') }}" />
      @error('title')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description">Description</label>
      <textarea name="description" id="description"
      @class(['border-red-500' => $errors->has('description')])
        rows="5">{{ $category->description ?? old('description') }}</textarea>
      @error('description')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>



    <div class="flex items-center gap-2">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
        @isset($category)
          Update Category
        @else
          Add Category
        @endisset
      </button>

      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
        <a href="{{ route('tasks.index') }}">Cancel</a>

      </button>

    </div>
  </form>
@endsection --}}

