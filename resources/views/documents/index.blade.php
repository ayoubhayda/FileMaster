@extends('layouts.system')

{{-- List Categoyies --}}

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
  <div class="container justify-center mx-auto flex flex-col">
    <div class="overflow-x-auto shadow-md">

      {{-- heder search and button add --}}

      <div class="w-full bg-white">
        <div class="p-4 border-b">
          <div class="flex flex-row justify-between items-center">

            {{-- input search --}}

            <form action="/search" method="GET" class="flex items-center basis-1/2">
              <div class="relative w-full">
                <input type="text" id="table-search" name="search"
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

            <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
              class="flex items-center rounded bg-sky-500 hover:bg-sky-600 px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                <path fill-rule="evenodd"
                  d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V10.5z"
                  clip-rule="evenodd" />
              </svg>
            </button>

            {{-- MODEL FORM --}}

            <!-- Modal toggle -->

            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
              class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                  <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                  <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Add a new document</h3>
                    <form class="space-y-6" action="#">
                      <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">File name</label>
                        <input type="name" name="name" id="name"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                          placeholder="Enter the file name" required>
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
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                  or drag and drop</p>
                                <p class="text-xs text-gray-500 mx-auto">DOCS, PDF, PPTX (MAX. 5 MB)</p>
                              </div>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                          </label>
                        </div>
                      </div>
                      <div class="grid grid-cols-2 gap-4">
                        <div>
                          <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Categories</label>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Choose a category</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                          </select>
                        </div>
                        <div>
                          <label class="block mb-2 text-sm font-medium text-gray-900">Visibility</label>
                          <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg sm:flex">
                            <li class="w-full border-r rounded-l-lg border-gray-300 bg-gray-50 sm:border-b-0 sm:border-r">
                              <div class="flex items-center pl-3">
                                <input id="horizontal-list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-white border-gray-400 focus:ring-blue-500 focus:ring-2">
                                <label for="horizontal-list-radio-license" class="w-full py-2.5 ml-2 text-sm font-medium text-gray-900">Visible</label>
                              </div>
                            </li>
                            <li class="w-full border-b border-gray-300 bg-gray-50 rounded-r-lg sm:border-b-0">
                              <div class="flex items-center pl-3">
                                <input id="horizontal-list-radio-id" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-white border-gray-400 focus:ring-blue-500 focus:ring-2">
                                <label for="horizontal-list-radio-id" class="w-full py-2.5 ml-2 text-sm font-medium text-gray-900">Non Visible</label>
                              </div>
                            </li>
                          </ul>
                        </div>                        
                      </div>
                      <button type="submit"
                        class="w-full text-white my-6 bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add a new document</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            {{-- END MEDEL FORM --}}
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
                  Email
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                  Created_at
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
              <tr class="whitespace-nowrap">
                <td class="px-6 py-4 text-sm text-gray-500">
                  1
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    Adam joe
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-500">adamjoe@example.com</div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  2021-12-12
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 
                            2 0 112.828 
                            2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </a>
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 
                            4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-6 py-4 text-sm text-gray-500">
                  2
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    Jon doe
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-500">jhondoe@example.com</div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  2021-1-12
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 
                            2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </a>
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 
                            4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-6 py-4 text-sm text-gray-500">
                  3
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    Emily chan
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-500">emilychan@example.com</div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  2021-1-12
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 
                            112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </a>
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 
                            4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                </td>
              </tr>
              <tr class="whitespace-nowrap">
                <td class="px-6 py-4 text-sm text-gray-500">
                  4
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900">
                    Susan coby
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-500">susancoby@example.com</div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                  2021-1-12
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 
                            2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </a>
                </td>
                <td class="px-6 py-4">
                  <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 
                            4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection