<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
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
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property,
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request) {
        ContactRequestEvent::dispatch($property, $request->validated());
//        event(new ContactRequestEvent($property, $request->validated()));

        return back()->with('success', 'Votre demande a bien été envoyée.');
    }
}
