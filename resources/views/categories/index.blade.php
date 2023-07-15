@extends('layouts.system')
@section('title', "Catégories")

{{-- List Categories --}}

@section('category')
<li>
  <x-dropdown-item :href="route('documents.index')" :active="request()->routeIs('documents.index')">
    {{ __('Tout') }}
  </x-dropdown-item>
</li>
@foreach ($categories as $category)
<li>
  <x-dropdown-item :href="route('categories.show', $category->id)" :active="request()->routeIs('categories.show', $category->id)">
    {{$category->name}}
  </x-dropdown-item>
</li>
@endforeach
@endsection

{{-- content page --}}
@section('content')

<header class="overflow-hidden">
  <div class="py-6 px-6 flex">
    <nav>
      <ol class="flex items-center gap-2">
        <li class="text-base text-slate-700 font-medium">Catégories</li>
      </ol>
    </nav>
  </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class=" px-6 flex">
                <div
                class="mb-3 inline-flex w-full items-center rounded-lg bg-red-100 px-6 py-5 text-base text-red-800"
                role="alert">
                    <span class="mr-2">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                          fill-rule="evenodd"
                          d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                          clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{$error}}
                </div>
            </div>
        @endforeach
    @endif



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

            <form action="{{route('categories.search')}}" method="post" class="flex items-center basis-1/2">
              @csrf
              <div class="relative w-full">
                <input type="text" id="table-search" name="search" value="{{$search}}"
                  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-4 pr-14 py-2.5 w-full"
                  placeholder="Rechercher une catégorie" />
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

            <button type="button" data-modal-target="add-modal" data-modal-toggle="add-modal"
              class="flex items-center rounded bg-sky-500 hover:bg-sky-600 px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                <path fill-rule="evenodd"
                  d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                  clip-rule="evenodd" />
              </svg>

            </button>

            {{-- MODEL FORM --}}

            <!-- Modal toggle -->

            <!-- Add modal -->
            <div id="add-modal" tabindex="-1" aria-hidden="true"
              class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                  <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                  <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Ajouter une nouvelle catégorie</h3>
                    <form class="space-y-6" action="{{route('categories.store')}}" method="post">
                      @csrf
                      <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Titre de la
                          Catégorie</label>
                        <input type="name" name="name" id="name"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                          placeholder="Entrer le titre de la catégorie" value="{{old('name')}}" required>
                      </div>
                      <button type="submit"
                        class="w-full text-white my-6 bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">AJOUTER</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            {{-- END MODEL FORM --}}
          </div>
        </div>
        <div class="overflow-hidden">

          {{-- data table --}}

          <table class="min-w-full table-fixed dark:divide-gray-700 divide-y divide-red-600 ">
            <thead class="bg-gray-50 border-b-2 border-sky-500">
              <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Titre
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Nombre de Document
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Modifier
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Supprimer
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">

              @if (count($categories) === 0)

                <tr class="whitespace-nowrap py-6">
                  <td colspan="5" class="px-6 py-14">
                    <div class="flex flex-col items-center">
                      <x-no-result-found />
                      <p class="text-md mt-6 mb-2 font-bold text-gray-900">Aucun catégorie trouvé</p>
                      <p class="text-sm text-gray-500">Désolé, aucun catégorie n'a été trouvé</p>
                    </div>
                  </td>
                </tr>
              @else
              @foreach ( $categories as $category)
                <tr class="whitespace-nowrap">
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">
                      {{$category->name}}
                    </div>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">
                    {{$category->documents->count()}}
                  </td>
                  <td class="px-6 py-4">
                    <button type="button" data-modal-target="{{$category->id}}update-modal"
                      data-modal-toggle="{{$category->id}}update-modal">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2
                                      2 0 112.828
                                      2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </button>
                    <!-- Update modal -->
                    <div id="{{$category->id}}update-modal" tabindex="-1" aria-hidden="true"
                      class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                      <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                          <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="{{$category->id}}update-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                          </button>
                          <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900">Modifier le titre de la catégorie</h3>
                            <form class="space-y-6" action="{{route('categories.update', $category)}}" method="post">
                              @csrf
                              @method('put')
                              <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Titre de la
                                  Catégorie</label>
                                <input type="name" name="name" id="name"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                  value="{{$category->name}}" required>
                              </div>
                              <button type="submit"
                                class="w-full text-white my-6 bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">MODIFIER</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>
                  <td class="px-6 py-4">
                    <button data-modal-target="{{$category->id}}delete-modal"
                      data-modal-toggle="{{$category->id}}delete-modal"
                      class="text-red-400 hover:text-red-500 transition">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5
                                      4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                    <form id="delete{{$category->id}}" action="{{route('categories.destroy', $category)}}" method="post">
                      @csrf
                      @method('delete')
                    </form>
                    <div id="{{$category->id}}delete-modal" tabindex="-1"
                      class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                      <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                          <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-200 hover:text-gray-900"
                            data-modal-hide="{{$category->id}}delete-modal">
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500">Voulez-vous vraiment supprimer cette
                              catégorie?</h3>
                            <button
                              onclick="event.preventDefault(); document.getElementById('delete{{$category->id}}').submit()"
                              class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                              Supprimer
                            </button>
                            <button data-modal-hide="{{$category->id}}delete-modal" type="button"
                              class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Annuler</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <footer class="card-footer is-centered mt-4">
    {{ $categories->links() }}
  </footer>
</div>
@endsection