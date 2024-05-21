@extends('layouts.app')
@vite(['resources/css/menu.css'])
@section('content')
<section>
    <div><h1>Liste des menu disponible</h1> </div>
    <div class="flex col menu-page">
       
        @foreach ($menus as $menu)
        <div class="card-menu">
          <div class="card-title"><p>{{ $menu->nom }}</p></div>
          <div class="card-tag"><p>{{$menu->category}}</p></div>
          <div class="card-description"><p>{{$menu->description}}</p></div>
            
        <div class="card-img"><img src="{{$menu->image_path}}" alt="" ></div>

           <div class="card-price flex"><p>{{ $menu->prix }}€</p> <button class="btn-cmd">commander</button></div>
        </div>
        @endforeach
    </div>
</section>
@endsection
