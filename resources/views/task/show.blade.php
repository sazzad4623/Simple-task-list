@extends('layouts.app')

@section('title', $task->title)

@section('content')
{{-- @if($task->category) --}}
    {{-- <h1 class="mb-4 text-slate-700">Category:  {{$category->title }}</h1> --}}
{{-- @else
    <p>No category associated with this task.</p>
@endif --}}

<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
  </div>
<div>

    @if ($task->category)

    <p>Category: {{ $task->category->title }}</p>

@else
    <p>No category associated with this task.</p>
@endif
    <h1 class="mb-4 text-slate-700">Description: {{ $task->description }}</h1>
  {{-- <p class="mb-4 text-slate-700">{{ $task->description }}</p> --}}
</div>
  @if ($task->long_description)
  {{-- <p class="mb-4 text-slate-700">{{ $task->long_description }}</p> --}}
  <h3 class="mb-4 text-slate-700">Long Description: {{ $task->long_description }}</h3>
  @endif

  <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
    {{ $task->updated_at->diffForHumans() }}</p>



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





  </div>
@endsection
