<!DOCTYPE html>
<html>

<head>
  <title>Laravel 10 Task List App</title>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <style type="text/tailwindcss">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    .btn {
      @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
    }
    .link {
      @apply font-medium text-gray-700 underline decoration-pink-500
    }
    label {
      @apply block uppercase text-slate-700 mb-2
    }
    input,
    textarea {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }
    .error {
      @apply text-red-500 text-sm
    }
  </style>
  {{-- @yield('styles') --}}
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
  {{-- <h1>@yield('title')</h1> --}}
  <div x-data="{ flash: true }">
    @if (session()->has('success'))
    <div x-show="flash"
    class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
    role="alert">
    <strong class="font-bold">Success!</strong>
    <div>{{ session('success') }}</div>

    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" @click="flash = false"
        stroke="currentColor" class="h-6 w-6 cursor-pointer">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </span>
  </div>
  @endif
    @yield('content')
  </div>
</body>
<script src="../path/to/datatables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</html>
