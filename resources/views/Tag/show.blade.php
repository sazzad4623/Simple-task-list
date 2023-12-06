@extends('layouts.app')

@section('title', $tag->title)

@section('content')

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('tags.create') }}" >Add Tag!</a>
      </nav>
  </button>

<div class="mb-4">
    <a href="{{ route('tags.index') }}" class="link">← Go back to the tag list!</a>
  </div>

    <h1 class="mb-4 text-slate-700">Description: {{ $tag->description }}</h1>
  {{-- <p class="mb-4 text-slate-700">{{ $task->description }}</p> --}}
</div>


  <p class="mb-4 text-sm text-slate-500">Created {{ $tag->created_at->diffForHumans() }} • Updated
    {{ $tag->updated_at->diffForHumans() }}</p>



  <div class="flex gap-2">
    {{-- <a href="{{ route('tasks.edit', ['task' => $task]) }}"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a> --}}
     <div> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        <a href="{{ route('tags.edit', ['tag' => $tag]) }}"
            >Edit</a>
      </button> </div>
      <div>
        <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="POST">
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
