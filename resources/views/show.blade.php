@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
  </div>
<div>
    <h1 class="mb-4 text-slate-700">Description: {{ $task->description }}</h1>
  {{-- <p class="mb-4 text-slate-700">{{ $task->description }}</p> --}}
</div>
  @if ($task->long_description)
  {{-- <p class="mb-4 text-slate-700">{{ $task->long_description }}</p> --}}
  <h3 class="mb-4 text-slate-700">Long Description: {{ $task->long_description }}</h3>
  @endif

  <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
    {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if ($task->completed)
        <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not completed</span>
    @endif
  </p>

  <div class="flex gap-2">
    {{-- <a href="{{ route('tasks.edit', ['task' => $task]) }}"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a> --}}
     <div> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
            >Edit</a>
      </button> </div>
      <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" onclick="return confirm('are you sure you want to delete this post')">Delete</button>


        </form>



      </div>


    {{-- <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
      @csrf
      @method('PUT')
      <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900" type="submit">
        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
      </button>
    </form> --}}

    {{-- <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Delete</button>
        </form>
      </div> --}}

    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')

        <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
          Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
      </form>
  </div>
@endsection
