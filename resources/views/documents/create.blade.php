@extends('layouts.system')

{{-- sidebar List Categoyies --}}

@section('category')
<li>
  <a href="#"
    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
</li>
<li>
  <a href="#"
    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
</li>
<li>
  <a href="#"
    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
</li>
@endsection

{{-- content page --}}
@section('content')

<header class="overflow-hidden">
  <div class="py-6 px-6 flex">
    <nav>
      <ol class="flex items-center gap-2">
        <li class="text-base text-slate-700 font-medium">Dashboard /</li>
        <li class="text-base text-sky-500 font-medium">Table</li>
      </ol>
    </nav>
  </div>
</header>

{{-- data table --}}

<div class="px-6 py-2">
  
</div>
@endsection