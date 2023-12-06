@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')



@section('content')
  <form method="POST"
    action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div class="mb-4">
      <label for="title">
        Title
      </label>
      <input text="text" name="title" id="title"
      @class(['border-red-500' => $errors->has('title')])
        value="{{ $task->title ?? old('title') }}" />
      @error('title')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description">Description</label>
      <textarea name="description" id="description"
      @class(['border-red-500' => $errors->has('description')])
        rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="="mb-4>
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description"
      @class(['border-red-500' => $errors->has('long_description')])
        rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <label for="category">Select Category:</label>
    <select id="category" name="category_id" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>

    <div class="flex items-center gap-2">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
        @isset($task)
          Update Task
        @else
          Add Task
        @endisset
      </button>

      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
        <a href="{{ route('tasks.index') }}">Cancel</a>

      </button>

    </div>
  </form>
@endsection
