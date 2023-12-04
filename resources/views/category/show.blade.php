@extends('layouts.app')

@section('title', $category->title)

@section('content')

<div class="mb-4">
    <a href="{{ route('categories.index') }}" class="link">← Go back to the category list!</a>
  </div>

    <h1 class="mb-4 text-slate-700">Description: {{ $category->description }}</h1>
  {{-- <p class="mb-4 text-slate-700">{{ $task->description }}</p> --}}
</div>


  <p class="mb-4 text-sm text-slate-500">Created {{ $category->created_at->diffForHumans() }} • Updated
    {{ $category->updated_at->diffForHumans() }}</p>



  <div class="flex gap-2">
    {{-- <a href="{{ route('tasks.edit', ['task' => $task]) }}"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a> --}}
     <div> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        <a href="{{ route('categories.edit', ['category' => $category]) }}"
            >Edit</a>
      </button> </div>
      <div>
        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
           @csrf
          @method('DELETE')
          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" onclick="return confirm('are you sure you want to delete this category')">Delete</button>


        </form>



      </div>



    {{-- <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')

        <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
          Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
      </form> --}}
  </div>
@endsection
