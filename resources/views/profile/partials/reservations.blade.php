<div>
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Votre Réservation</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('reservation_details'))
        <div class="card-menu bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="card-title"><p class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ session('reservation_details.nom') }}</p></div>
            <div class="card-tag"><p class="text-gray-600 dark:text-gray-400">{{ session('reservation_details.category') }}</p></div>
            <div class="card-description"><p class="text-gray-600 dark:text-gray-400">{{ session('reservation_details.description') }}</p></div>
            <div class="card-img"><img src="{{ session('reservation_details.image_path') }}" alt="" class="rounded-lg"></div>
            <div class="card-price flex justify-between items-center mt-4">
                <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ session('reservation_details.prix') }}€</p>
            </div>
            <div class="reservation-date mt-2 text-gray-600 dark:text-gray-400">
                <p>Date de réservation : {{ session('reservation_details.reservation_date') }}</p>
            </div>
        </div>
    @endif

    @if($reservations->isEmpty())
        <p class="text-gray-600 dark:text-gray-400">Vous n'avez aucune réservation.</p>
    @else
        @php
            $reservation = $reservations->first(); // Puisqu'il ne peut y avoir qu'une seule réservation
            $menu = $reservation->menu;
        @endphp
        <div class="card-menu bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="card-title"><p class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $menu->nom }}</p></div>
            <div class="card-tag"><p class="text-gray-600 dark:text-gray-400">{{$menu->category}}</p></div>
            <div class="card-description"><p class="text-gray-600 dark:text-gray-400">{{$menu->description}}</p></div>
            <div class="card-img"><img src="{{$menu->image_path}}" alt="" class="rounded-lg"></div>
            <div class="card-price flex justify-between items-center mt-4">
                <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $menu->prix }}€</p>
                <div class="flex space-x-2">
                  
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-cmd">Annuler</button>
                    </form>
                </div>
            </div>
            <div class="reservation-date mt-2 text-gray-600 dark:text-gray-400">
                <p>Date de réservation : {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    @endif
</div>
