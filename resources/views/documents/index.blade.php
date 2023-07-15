@extends('layouts.system')
@section('title', "Documents")

{{-- List Categoyies --}}

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
        <li class="text-base text-sky-500 font-medium">{{$name}}</li>
      </ol>
    </nav>
  </div>
</header>

{{-- data table --}}

<div class="px-6 pt-2 pb-14">
  <div class="container justify-center mx-auto flex flex-col">
    <div class="overflow-x-auto shadow-md">

      {{-- heder search and button add --}}

      <div class="w-full bg-white">
        <div class="p-4 border-b">
          <div class="flex flex-row justify-between items-center">

            {{-- input search --}}

            <form action="{{route('documents.search')}}" method="POST" class="flex items-center basis-1/2">
              @csrf
              <div class="relative w-full">
                <input type="text" id="table-search" name="search" value="{{$search}}"
                  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-4 pr-14 py-2.5 w-full"
                  placeholder="Search for items" />
                <button type="submit"
                  class="absolute right-0 top-0 bottom-0 bg-sky-500 hover:bg-sky-600 text-white text-sm px-4 py-2 rounded-r-lg">
                  <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
            </form>

            {{-- btn add --}}

            <a href="{{route('documents.create')}}"
              class="flex items-center rounded bg-sky-500 hover:bg-sky-600 px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                <path fill-rule="evenodd"
                  d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V10.5z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
        <div class="overflow-hidden">

          {{-- data table --}}

          <table class="min-w-full table-fixed dark:divide-gray-700 divide-y divide-red-600 ">
            <thead class="bg-gray-50 border-b-2 border-sky-500">
              <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                  ID
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Name
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Category
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Visibility
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Download
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Edit
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Delete
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">

              {{-- Documents List --}}

              @foreach ($documents as $document)
              <tr class="whitespace-nowrap">
                <td class="px-6 py-4 text-sm text-gray-500">
                  {{$document->id}}
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    {{$document->name}}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-500">{{$document->category->name}}</div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500 text-center">
                  {{$document->visibility}}
                </td>
                <td class="px-6 py-4">
                  <a href={{url('files/'.$document->file)}} download
                    class="flex justify-center text-green-600 hover:text-green-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6 ">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                  </a>
                </td>
                <td class="px-6 py-4">
                  <a href={{route('documents.edit', $document->id)}}
                    class="flex justify-center text-blue-400 hover:text-blue-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2
                            2 0 112.828
                            2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </a>
                </td>
                <td class="px-6 py-4 flex justify-center ">
                  <button data-modal-target="{{'delete-modal.'.$document->id}}" data-modal-toggle="{{'delete-modal.'.$document->id}}"
                    class="text-red-400 hover:text-red-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5
                            4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </td>
              </tr>

              {{-- DELETE MODEL --}}

              <div id="{{'delete-modal.'.$document->id}}" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                  <div class="relative bg-white rounded-lg shadow">
                    <button type="button"
                      class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-200 hover:text-gray-900"
                      data-modal-hide="{{'delete-modal.'.$document->id}}">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                      <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                      <h3 class="mb-5 text-lg font-normal text-gray-500">Voulez-vous vraiment supprimer cette document?
                      </h3>
                      <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="flex justify-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                          Supprimer
                        </button>
                    </form>
                      <button data-modal-hide="{{'delete-modal.'.$document->id}}" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Annuler</button>
                    </div>
                  </div>
                </div>
              </div>

              {{-- END DELETE MODEL --}}

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <footer class="card-footer is-centered mt-4">
    {{ $documents->links() }}
</footer>
</div>
@endsection
