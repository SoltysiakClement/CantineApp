<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PushSubscription;
use Illuminate\Support\Facades\Auth;

class PushSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();

        // Créer ou mettre à jour l'abonnement push dans la base de données
        $subscription = PushSubscription::updateOrCreate(
            ['user_id' => $user->id],
            [
                'endpoint' => $request->endpoint,
                'public_key' => $request->publicKey,
                'auth_token' => $request->authToken,
                'content_encoding' => $request->contentEncoding,
            ]
        );

        return response()->json(['success' => true]);
    }
}
