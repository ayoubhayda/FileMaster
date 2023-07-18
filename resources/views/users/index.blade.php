@section('title', 'Utilisateurs')

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Utilisateurs') }}
    </h2>
  </x-slot>

  <div class="px-6 py-12">
    <div class="container justify-center mx-auto flex flex-col max-w-6xl ">
      <div class="overflow-x-auto shadow-md">

        {{-- heder search and button add --}}

        <div class="w-full bg-white">
          <div class="p-4 border-b">
            <div class="flex flex-row justify-between items-center">

              {{-- input search --}}

              <form action="{{route('users.search')}}" method="post" class="flex items-center basis-1/2">
                @csrf
                <div class="relative w-full">
                  <input type="text" id="table-search" name="search" value="{{$search}}"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-4 pr-14 py-2.5 w-full"
                    placeholder="Saisissez le nom de l'utilisateur" />
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

              <a href="{{route('users.create')}}"
                class="flex items-center rounded bg-sky-500 hover:bg-sky-600 px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                  <path
                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
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
                    Nom
                  </th>
                  <th class="px-6 py-2 text-xs text-gray-500">
                    Email
                  </th>
                  <th class="px-6 py-2 text-xs text-gray-500">
                    Categories Accessible
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
                @if (count($users) === 0)
                <tr class="whitespace-nowrap py-6">
                  <td colspan="5" class="px-6 py-14">
                    <div class="flex flex-col items-center">
                      <x-no-result-found />
                      <p class="text-md mt-6 mb-2 font-bold text-gray-900">Aucun utilisateurs trouvé</p>
                      <p class="text-sm text-gray-500">Désolé, aucun utilisateurs n'a été trouvé</p>
                    </div>
                  </td>
                </tr>
                @else
                @foreach ( $users as $user)
                <tr class="whitespace-nowrap">
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">
                      {{$user->name}}
                    </div>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">
                    {{$user->email}}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{$user->id}}"
                      class="text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                      type="button">Liste des Categories <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4" />
                      </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown{{$user->id}}"
                      class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                      <ul id="dropDown-cat" class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">

                        @foreach ($user->categories as $category)
                        <li class="block px-4 py-2 hover:bg-gray-100">
                          {{$category->name}}
                        </li>
                        @endforeach
                      </ul>
                    </div>

                  </td>
                  <td class="px-6 py-4">
                    <a class="flex justify-center" href="{{route('users.edit', $user)}}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2
                                        2 0 112.828
                                        2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </a>
                  </td>
                  <td class="px-6 py-4">
                    <button data-modal-target="{{$user->id}}delete-modal" data-modal-toggle="{{$user->id}}delete-modal"
                      class="text-red-400 hover:text-red-500 transition">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5
                                        4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                    <form id="delete{{$user->id}}" action="{{route('users.destroy', $user)}}" method="post">
                      @csrf
                      @method('delete')
                    </form>
                    <div id="{{$user->id}}delete-modal" tabindex="-1"
                      class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                      <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                          <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-200 hover:text-gray-900"
                            data-modal-hide="{{$user->id}}delete-modal">
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500">Voulez-vous vraiment supprimer cet
                              utilisateur ?</h3>
                            <button
                              onclick="event.preventDefault(); document.getElementById('delete{{$user->id}}').submit()"
                              class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                              Supprimer
                            </button>
                            <button data-modal-hide="{{$user->id}}delete-modal" type="button"
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
  </div>
</x-app-layout>
