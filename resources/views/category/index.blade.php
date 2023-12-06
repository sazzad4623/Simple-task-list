@extends('layouts.app')

<h6 class=" text-blue-600/100 font-bold container mx-auto mt-10 mb-10 ml-60">List of Categories</h6>

@section('content')

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('categories.create') }}" >Add Category!</a>
      </nav>
  </button>

  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
    <nav>
        <a href="{{ route('tasks.create') }}" >Add Task!</a>
      </nav>
  </button>

  <div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
  </div>
<div>


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


@endsection


