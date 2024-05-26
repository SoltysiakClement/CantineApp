@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <div class="container">
            <h1>Vous êtes hors ligne</h1>
            <p>Il semble que vous n'ayez pas de connexion Internet. Vous pouvez toujours consulter les informations mises en cache.</p>
            <nav>
                <ul>
                    <li><a href="/menus">Menus</a></li>
                    <li><a href="/profile">Profil</a></li>
                </ul>
            </nav>
        </div>

@endsection