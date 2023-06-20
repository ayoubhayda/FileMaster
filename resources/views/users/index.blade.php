@section('title', 'Accueil')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  flex flex-row justify-between">
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
                      @isset($users)
                          @foreach ( $users as $category)
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
                                  <button type="button" data-modal-target="{{$category->id}}update-modal" data-modal-toggle="{{$category->id}}update-modal">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                      viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2
                                              2 0 112.828
                                              2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                      </svg>
                                    </button>
                              </td>
                              <td class="px-6 py-4">
                                  <button data-modal-target="{{$category->id}}delete-modal" data-modal-toggle="{{$category->id}}delete-modal" class="text-red-400 hover:text-red-500 transition">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24"
                                      stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5
                                              4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                  </button>
                                  <form id="delete{{$category->id}}" action="{{route('users.destroy', $category)}}" method="post">
                                      @csrf
                                      @method('delete')
                                  </form>
                                  <div id="{{$category->id}}delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                      <div class="relative w-full max-w-md max-h-full">
                                          <div class="relative bg-white rounded-lg shadow">
                                              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-200 hover:text-gray-900" data-modal-hide="{{$category->id}}delete-modal">
                                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                  <span class="sr-only">Close modal</span>
                                              </button>
                                              <div class="p-6 text-center">
                                                  <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                  <h3 class="mb-5 text-lg font-normal text-gray-500">Voulez-vous vraiment supprimer cette catégorie?</h3>
                                                    <button  onclick="event.preventDefault(); document.getElementById('delete{{$category->id}}').submit()" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                      Supprimer
                                                  </button>
                                                  <button data-modal-hide="{{$category->id}}delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Annuler</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </td>
                          </tr>
                          @endforeach
                      @endisset
                      @empty($users)
                          Aucune catégorie à afficher
                      @endempty
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</x-app-layout>
