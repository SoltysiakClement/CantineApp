@extends('layouts.app')
@vite(['resources/css/menu.css'])
@section('content')
<section>
    <div><h1>Liste des menus disponibles</h1></div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <div class="card-menu">
                <div class="card-title"><p>{{ session('reservation_details.nom') }}</p></div>
                <div class="card-tag"><p>{{ session('reservation_details.category') }}</p></div>
                <div class="card-description"><p>{{ session('reservation_details.description') }}</p></div>
                <div class="card-img"><img src="{{ session('reservation_details.image_path') }}" alt=""></div>
                <div class="card-price flex">
                    <p>{{ session('reservation_details.prix') }}€</p>
                    <div class="reservation-date mt-2">
                        <p>Date de réservation : {{ session('reservation_details.reservation_date') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex col menu-page">
        @foreach ($menus as $menu)
        <div class="card-menu">
            <div class="card-title"><p>{{ $menu->nom }}</p></div>
            <div class="card-tag"><p>{{ $menu->category }}</p></div>
            <div class="card-description"><p>{{ $menu->description }}</p></div>
            @if (strpos($menu->image_path, 'http') === 0)
            <!-- Si c'est une URL externe -->
            <div class="card-img"><img src="{{ $menu->image_path }}" alt=""></div>
        @else
            <!-- Si c'est une image stockée localement -->
            <div class="card-img"><img src="{{ asset('storage/' . $menu->image_path) }}" alt=""></div>
        @endif
                    <div class="card-price flex">
                <p>{{ $menu->prix }}€</p>
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <button type="submit" class="btn-cmd">Réserver</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $menus->links() }}
    </div>
</section>
@endsection
