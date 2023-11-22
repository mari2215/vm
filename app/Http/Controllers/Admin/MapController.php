<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlaceFormRequest;
use App\Http\Requests\Admin\PlaceUpdateRequest;

class MapController extends Controller
{
    public function create(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        return view('admin.place.create', compact('latitude', 'longitude'));
    }

    public function index()
    {
        $places = Place::all();
        return view('admin.place.index', compact('places'));
    }

    public function store(PlaceFormRequest $request)
    {
        // Validation of data
        $data = $request->validated();

        $place = new Place;
        $place->name = $data['name'];
        $place->address = $data['address'];
        $place->description = $data['description'];
        $place->latitude = $data['latitude'];
        $place->longitude = $data['longitude'];
        

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/place/', $filename);
            $place->image = $filename;
        }
        $place->save();
        
        // Redirect to the index page with a success message
        return redirect()->route('admin.places.index')->with('success', 'Place created successfully');
    }

    public function edit($place_id)
    {
        $place = Place::find($place_id);

        if (!$place) {
            return  redirect()->route('admin.places.index')->with('error', 'place not found');
        }
    
        return view('admin.place.edit', compact('place'));
    }

    public function delete($place_id)
    {
        $place = Place::find($place_id);
        if($place){
            $place->delete();
            return  redirect()->route('admin.places.index')->with('message', 'place deleted');
        }
        else{
            return  redirect()->route('admin.places.index')->with('message', 'place not deleted');
        }
    }

    public function update(PlaceUpdateRequest $request, $place_id)
    {
        $data = $request->validated();
        $place = place::find($place_id);

        if (!$place) {
            return  redirect()->route('admin.places.index')->with('error', 'place not found');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/place/', $filename);
            $place->image = $filename;
        }
        $place->address = $data['address'];
        $place->description = $data['description'];
        $place->name = $data['name'];
        $place->longitude = $data['longitude'];
        $place->latitude = $data['latitude'];

        $place->save();

        return  redirect()->route('admin.places.index')->with('message', 'place updated successfully');
    }
}
