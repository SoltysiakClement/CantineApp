<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Reservation;
use App\Models\Menu;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Store a newly created reservation in storage.
     */
    public function store(Request $request)
    {
        if (!$this->canMakeReservation()) {
            return Redirect::back()->with('error', 'Les réservations pour aujourd\'hui doivent être faites entre 5h00 et 11h00 du matin.');
        }

        $reservation = new Reservation();
        $reservation->menu_id = $request->menu_id;
        $reservation->user_id = Auth::id();
        $reservation->reservation_date = Carbon::now();
        $reservation->save();

        $menu = $reservation->menu;

        return Redirect::back()->with('success', 'Réservation effectuée avec succès.')
            ->with('reservation_details', [
                'nom' => $menu->nom,
                'category' => $menu->category,
                'description' => $menu->description,
                'prix' => $menu->prix,
                'image_path' => $menu->image_path,
                'reservation_date' => $reservation->reservation_date->format('d/m/Y H:i')
            ]);
    }

    /**
     * Update the specified reservation in storage.
     */
    public function update(Request $request, $id)
    {
        if (!$this->canMakeReservation()) {
            return Redirect::back()->with('error', 'Les réservations pour aujourd\'hui doivent être modifiées entre 5h00 et 11h00 du matin.');
        }

        $reservation = Reservation::findOrFail($id);
        $reservation->menu_id = $request->menu_id;
        $reservation->save();

        $menu = $reservation->menu;

        return Redirect::back()->with('success', 'Réservation modifiée avec succès.')
            ->with('reservation_details', [
                'nom' => $menu->nom,
                'category' => $menu->category,
                'description' => $menu->description,
                'prix' => $menu->prix,
                'image_path' => $menu->image_path,
                'reservation_date' => $reservation->reservation_date->format('d/m/Y H:i')
            ]);
    }

    /**
     * Remove the specified reservation from storage.
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return Redirect::back()->with('success', 'Réservation annulée avec succès.');
    }

    /**
     * Check if a reservation can be made or modified.
     */
    private function canMakeReservation()
    {
        $now = Carbon::now();
        $todayStart = Carbon::today()->addHours(5);
        $todayEnd = Carbon::today()->addHours(11);

        return $now->between($todayStart, $todayEnd);
    }
}
