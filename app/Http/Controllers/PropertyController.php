<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use App\Models\User;
use App\Notifications\ContactRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        // Property::paginate() is a shortcut of Property::query()->paginate()
        $query = Property::query()->orderBy('created_at', 'desc');

        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }

        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }

        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $request->input('rooms'));
        }

        if ($title = $request->input('title')) {
            $query = $query->where('title', 'like', "%{$request->input('title')}%");
        }

        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }

    public function show(string $slug, Property $property)
    {
        // /** @var User $user */
//        $user = User::first();
//        dd($user->notifications);
//        dd($user->unreadNotifications);
//        dd($user->unreadNotifications[0]->markAsRead());
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property,
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request) {
        // envoie de mail lors qu'on envoie le formulaire de contact
//        ContactRequestEvent::dispatch($property, $request->validated());
//        event(new ContactRequestEvent($property, $request->validated()));
        // au lieu d'utiliser cette event je vais utiliser le systeme de notification
        /** @var User $user */
        $user = User::first();
        $user->notify(new ContactRequestNotification($property, $request->validated()));


        return back()->with('success', 'Votre demande a bien été envoyée.');
    }
}
