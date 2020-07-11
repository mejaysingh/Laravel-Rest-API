<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use Illuminate\Http\Request;

use App\Person;

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
            'first_name' => 'required',
            'last_name'  => 'required',
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

    /**
     *
     * @param Person $person
     * @return void
     */
    
    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json();
    }
}
