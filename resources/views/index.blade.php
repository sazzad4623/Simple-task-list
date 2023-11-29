{{-- @extends('layouts.app')

<div>
    <h4>List of tasks</h4>
</div>

{{-- @section('title', 'The list of tasks') --}}

<h6 class=" text-blue-600/100 font-bold container mx-auto mt-10 mb-10 ml-60">List of Tasks</h6>

@section('content')

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('tasks.create') }}" >Add Task!</a>
      </nav>
  </button>





  @if(count($tasks) > 0)
  <table class="table">
    <thead>
      <tr class="ml-4">
        <th scope="col">Title</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)
        <tr>
          <td>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
               @class(['line-through' => $task->completed])>{{ $task->title }}</a>
          </td>
          <td>
            @if($task->completed)
              <span class="badge bg-success font-bold text-green-700 text-opacity-100">Completed</span>
            @else
              <span class="badge bg-warning font-bold text-red-700 text-opacity-100">Incomplete</span>
            @endif
          </td>


          <td>  <div>


            <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full">
                <a href="{{ route('tasks.show', ['task' => $task]) }}"
                    >Show</a>
              </button> </div> </td>

              <td>
          <td>  <div>


            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                <a href="{{ route('tasks.edit', ['task' => $task]) }}"
                    >Edit</a>
              </button> </div> </td>

              <td>


                {{-- <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}


              <button  <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" onclick="return confirm('are you sure you want to delete this post')">Delete</button>


                  </form> </button>



              </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <div>There are no tasks!</div>
@endif

  {{-- @forelse ($tasks as $task)

  <div>
    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
        @class(['line-through' => $task->completed])>{{ $task->title }}</a>
  </div>
  @empty
    <div>There are no tasks!</div>
  @endforelse --}}

  @if ($tasks->count())
  <nav class="mt-4">
    {{ $tasks->links() }}
  </nav>
@endif

@endsection


{{-- <h1>The list of Tasks </h1>


<div> --}}

{{-- @if(count($tasks))
@foreach ($tasks as $task )
<div>{{$task->title }} </div>

@endforeach
@else
<div>There are no tasks</div>
@endif --}}



{{-- @forelse ($tasks as $task ) --}}
{{-- <div>{{$task->title }} </div> --}}
{{-- <div>
    <a href="{{ route('tasks.show', ['id'=>$task->id])}}">{{ $task->title }}</a>
  </div>

@empty
<div>There are no tasks</div>

@endforelse



</div> --}}


@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row mb-4">
      <div class="col">
        <h4>List of Tasks</h4>
      </div>
      <div class="col text-end">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Add Task!</a>
      </div>
    </div>

    @if($tasks->count() > 0)
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tasks as $task)
            <tr>
              <td>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="{{ $task->completed ? 'text-decoration-line-through' : '' }}">
                  {{ $task->title }}
                </a>
              </td>
              <td>
                @if($task->completed)
                  <span class="badge bg-success">Completed</span>
                @else
                  <span class="badge bg-warning text-dark">Incomplete</span>
                @endif
              </td>
              <td>
                <div class="btn-group" role="group">
                  <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-primary">Edit</a>
                  <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="alert alert-info" role="alert">
        There are no tasks!
      </div>
    @endif

    @if ($tasks->count() > 0)
      <nav aria-label="Tasks navigation">
        {{ $tasks->links() }}
      </nav>
    @endif
  </div>
@endsection
