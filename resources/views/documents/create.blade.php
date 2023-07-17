@extends('layouts.system')
@section('title', 'Ajouter')
{{-- sidebar List Categoyies --}}

@section('category')
<li>
  <a href={{route('documents.index')}}
    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tout</a>
</li>
@foreach ($categories as $category)
<li>
  <a href={{route('categories.show', $category->id)}}
    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{$category->name}}</a>
</li>
@endforeach
@endsection

{{-- content page --}}
@section('content')

<header class="overflow-hidden">
  <div class="py-6 px-6 flex">
    <nav>
      <ol class="flex items-center gap-2">
        <li class="text-base text-slate-700 font-medium">Documents /</li>
        <li class="text-base text-sky-500 font-medium">Ajouter</li>
      </ol>
    </nav>
  </div>
</header>

{{-- data table --}}

<div class="px-6 pt-2 pb-14">
  <div class="px-6 py-6 lg:px-8 bg-white shadow-lg rounded-lg">
    <h3 class="pb-4 text-xl font-medium text-gray-900 border-b-2 border-sky-500">Ajouter un nouveau document</h3>
    <form class="space-y-6" action={{route('documents.store')}} method="POST" enctype="multipart/form-data">
      @csrf
      <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nom du Fichier</label>
        <input type="text" name="name" id="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
          placeholder="Entrer le nom du ficher" value="{{ old('name') }}" required>
        @error('name')
            <span class="text-sm text-red-500">* {{$message}}</span>
        @enderror
      </div>
      <div>
        <div class="flex items-center justify-center w-full">
          <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
            <div class="flex flex-col items-center justify-center pt-3 pb-4">
              <div id="upload-icon">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                  </path>
                </svg>
              </div>
              <div id="file-name" class="flex flex-col items-center">
                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Cliquez pour télécharger</span>
                  ou glisser et déposer</p>
              <p class="text-xs text-gray-500 mx-auto">DOCX, PDF, PPTX, CSV, TXT, XLSX</p>
              </div>
            </div>
            <input id="dropzone-file" name="file" type="file" class="hidden"  required />
          </label>
        </div>
        @error('file')
            <span class="text-sm text-red-500">* {{$message}}</span>
        @enderror
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label for="cotegory_id" class="block mb-2 text-sm font-medium text-gray-900">Catégories</label>
          <select id="countries" name="category_id" class="bg-gray-50 overflow-y-auto border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            <option disabled selected hidden>Choisissez une catégorie</option>
          
            {{-- categories list --}}
          
            @foreach ($categories as $category)
              @if (old('category_id') == $category->id)
                <option value="{{$category->id}}" selected>{{$category->name}}</option>
              @else
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endif
            @endforeach
          </select>                   
          @error('category_id')
            <span class="text-sm text-red-500">* {{$message}}</span>
        @enderror
        </div>
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900">Visibilité</label>
          <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg sm:flex">
            <li class="w-full border-r rounded-l-lg border-gray-300 bg-gray-50 sm:border-b-0 sm:border-r">
              <div class="flex items-center pl-3">
                <input id="horizontal-list-radio-license" type="radio" value="1" name="visibility" class="w-4 h-4 text-blue-600 bg-white border-gray-400 focus:ring-blue-500 focus:ring-2" checked>
                <label for="horizontal-list-radio-license" class="w-full py-2.5 ml-2 text-sm font-medium text-gray-900">Visible</label>
              </div>
            </li>
            <li class="w-full border-b border-gray-300 bg-gray-50 rounded-r-lg sm:border-b-0">
              <div class="flex items-center pl-3">
                <input id="horizontal-list-radio-id" type="radio" value="0" name="visibility" class="w-4 h-4 text-blue-600 bg-white border-gray-400 focus:ring-blue-500 focus:ring-2">
                <label for="horizontal-list-radio-id" class="w-full py-2.5 ml-2 text-sm font-medium text-gray-900">Non Visible</label>
              </div>
            </li>
          </ul>
        </div>
        @error('visibility')
            <span class="text-sm text-red-500">* {{$message}}</span>
        @enderror
      </div>
      <button type="submit"
        class="w-full text-white my-6 bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none uppercase focus:ring-sky-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ajouter le document</button>
    </form>
  </div>
</div>
@endsection
