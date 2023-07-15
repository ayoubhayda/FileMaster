@section('title', 'Ajouter')

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ajouter un utiisateur') }}
    </h2>
  </x-slot>
  <div class="px-6 py-12">
    <div class="px-6 py-6 mx-auto max-w-xl bg-white shadow-lg rounded-lg">
      <h3 class="pb-4 text-lg font-bold text-gray-900 border-b-2 border-sky-500 uppercase">Ajouter un nouvel utilisateur
      </h3>
      <form class="space-y-6" action={{route('documents.store')}} method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nom et Prénom</label>
          <input type="text" name="name" id="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
            placeholder="Entrer le nom complet" value="{{ old('name') }}" required>
          @error('name')
          <span class="text-sm text-red-500">* {{$message}}</span>
          @enderror
        </div>

        <!-- Name -->
        <div>
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Adresse e-mail</label>
          <input type="text" name="email" id="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
            placeholder="Entrer le adresse email" value="{{ old('email') }}" required>
          @error('email')
          <span class="text-sm text-red-500">* {{$message}}</span>
          @enderror
        </div>

        <!-- Name -->
        <div>

          <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Adresse e-mail</label>
          <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox"
            class="text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-700"
            type="button">Dropdown checkbox <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg></button>

          <!-- Dropdown menu -->
          <div id="dropdownDefaultCheckbox"
            class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow">
            <ul class="p-3 space-y-3 text-sm text-gray-700" aria-labelledby="dropdownCheckboxButton">
              <li>
                <div class="flex items-center">
                  <input id="checkbox-item-1" type="checkbox" value=""
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                  <label for="checkbox-item-1" class="ml-2 text-sm font-medium text-gray-900">Default checkbox</label>
                </div>
              </li>
              <li>
                <div class="flex items-center">
                  <input checked id="checkbox-item-2" type="checkbox" value=""
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                  <label for="checkbox-item-2" class="ml-2 text-sm font-medium text-gray-900">Checked state</label>
                </div>
              </li>
            </ul>
          </div>

          @error('email')
          <span class="text-sm text-red-500">* {{$message}}</span>
          @enderror
        </div>

        <!-- Name -->
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
          <input type="password" name="password" id="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
            placeholder="Entrer le mot de passe" value="{{ old('password') }}" required autocomplete="new-password">
          @error('password')
          <span class="text-sm text-red-500">* {{$message}}</span>
          @enderror
        </div>

        <!-- Name -->
        <div>
          <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirmez le mot de
            passe</label>
          <input type="text" name="password_confirmation" id="password_confirmation"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
            placeholder="Entrer le mot de passe" value="{{ old('password_confirmation') }}" required
            autocomplete="new-password">
          @error('password_confirmation')
          <span class="text-sm text-red-500">* {{$message}}</span>
          @enderror
        </div>

        <!-- Name -->
        <button type="submit"
          class="text-white my-6 bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none uppercase focus:ring-sky-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
      </form>
    </div>
  </div>
</x-app-layout>