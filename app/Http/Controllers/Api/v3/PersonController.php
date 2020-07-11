<?php

namespace App\Http\Controllers\Api\v3;

use App\Http\Resources\v3\PersonResource;
use App\Http\Resources\v3\PersonResourceCollection;
use App\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     *
     * @param Person $person
     * @return PersonResource
     */

    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'city'       => 'required',
        ]);

        $person = Person::create($request->all());

        return new PersonResource($person);
    }

    public function update(Person $person, Request $request): PersonResource
    {
        // dd($request->all());
        $person->update($request->all());

        return new PersonResource(($person));
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json();
    }
}
