{{-- @extends('layouts.app')

<div>
    <h4>List of tasks</h4>
</div>

{{-- @section('title', 'The list of tasks') --}}

<h6 class=" text-blue-600/100 font-bold container mx-auto mt-10 mb-10 ml-60">List of Categories</h6>

@section('content')

{{-- <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('tasks.create') }}" >Add Task!</a>
      </nav>
  </button>

  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('categories.create') }}" >Add Category!</a>
      </nav>
  </button> --}}





  <table class="table" id="tasksTable" class="display">
    <thead>
      <tr class="ml-4">
        <th scope="col">Title</th>

        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
        <tr>
          <td>
            <a href="{{ route('categories.show', ['category' => $category->id]) }}"
              >{{ $category->title }}</a>
          </td>



          <td>  <div>


            <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full">
                <a href="{{ route('categories.show', ['category' => $category]) }}"
                    >Show</a>
              </button> </div> </td>

              <td>
          <td>  <div>


            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                <a href="{{ route('categories.edit', ['category' => $category]) }}"
                    >Edit</a>
              </button> </div> </td>

              <td>



</button> <button>
              <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
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


  {{-- @forelse ($tasks as $task)

  <div>
    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
        @class(['line-through' => $task->completed])>{{ $task->title }}</a>
  </div>
  @empty
    <div>There are no tasks!</div>
  @endforelse --}}
  {{-- <script>
    $(document).ready(function() {
      $('#tasksTable').DataTable();
    });
  </script>
  @if ($tasks->count())
  <nav class="mt-4">
    {{ $tasks->links() }}
  </nav> --}}


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


      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
              <td>
                <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                  >{{ $category->title }}</a>
              </td>



              <td>  <div>


                <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full">
                    <a href="{{ route('categories.show', ['category' => $category]) }}"
                        >Show</a>
                  </button> </div> </td>

                  <td>
              <td>  <div>


                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <a href="{{ route('categories.edit', ['category' => $category]) }}"
                        >Edit</a>
                  </button> </div> </td>

                  <td>



    {{-- </button> <button>
                  <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" onclick="return confirm('are you sure you want to delete this post')">Delete</button>


                      </form>

    </button> --}}

                  </td>
            </tr>
          @endforeach
        </tbody>
      </table>


    @if ($categories->count() > 0)
      <nav aria-label="Categories navigation">
        {{ $categories->links() }}
      </nav>
    @endif
  </div>
@endsection
