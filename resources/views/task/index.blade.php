@extends('layouts.app')

<h6 class=" text-blue-600/100 font-bold container mx-auto mt-10 mb-10 ml-60">List of Tasks</h6>

@section('content')

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('tasks.create') }}" >Add Task!</a>
      </nav>
  </button>

  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('categories.create') }}" >Add Category!</a>
      </nav>
  </button>

  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('tags.create') }}" >Add Tag!</a>
      </nav>
  </button>

  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('categories.index') }}" >Categories</a>
      </nav>
  </button>

  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('tags.index') }}" >Tags</a>
      </nav>
  </button>





  @if(count($tasks) > 0)
  <table class="table" id="tasksTable" class="display">
    <thead>
      <tr class="ml-4">
        <th scope="col">Title</th>

        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)
        <tr>
          <td>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
              >{{ $task->title }}</a>
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



</button> <button>
              <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" onclick="return confirm('are you sure you want to delete this post')">Delete</button>


                  </form>

</button>

              </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <div>There are no tasks!</div>
@endif
@if ($tasks->count() > 0)
<nav aria-label="Tasks navigation">
  {{ $tasks->links() }}
</nav>
@endif
@endsection





