@extends('layouts.app')
@vite(['resources/css/menu.css'])
@section('content')
<section>
    <div class="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100">Bienvenue à l'App Cantine</h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Composez votre menu de cantine pour la semaine.</p>
            <div class="mt-8">
                <a href="{{ route('menus') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                    Voir la carte
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
