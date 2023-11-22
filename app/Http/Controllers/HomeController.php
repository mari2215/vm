<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\OutletMapController;
use App\Models\HistoricalFigure;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uniqueYears = Event::select(DB::raw('YEAR(event_date) as year'))
        ->distinct()
        ->orderBy('year', 'asc') // Ви можете вибрати 'desc', якщо потрібно в порядку спадання
        ->get();
    
        $places = Place::all();
        $figures = HistoricalFigure::all();
        $initialMarkers = [];
        
        foreach ($places as $place) {
            $initialMarkers[] = [
                'position' => [
                    'lat' => (float) $place->latitude,
                    'lng' => (float) $place->longitude,
                ],
                'infoWindow' => [
                    'id' => $place->id,
                    'name' => $place->name,
                    'address' => $place->address,
                    'image' => $place->image ? '<img src="' . asset('uploads/place/' . $place->image) . '" alt="No Image" style="width: 100%; max-height: 100px; object-fit: cover;">' : '',
                    'description' => Str::limit($place->description, 50), // обмежте опис до 50 символів
                ],

                'label' => ['color' => 'white', 'text' => $place->name],
                'draggable' => false, // You can set this based on your requirements
            ];
        }
        $events = Event::orderBy('event_date')->get();
        return view('home', ['events' => $events, 'uniqueYears' => $uniqueYears, 'initialMarkers' => $initialMarkers, 'figures'=>$figures, 'places'=>$places]);
    }
    public function map()
    {
        $places = Place::all();

        $initialMarkers = [];
        
        foreach ($places as $place) {
            $initialMarkers[] = [
                'position' => [
                    'lat' => (float) $place->latitude,
                    'lng' => (float) $place->longitude,
                ],
                'infoWindow' => [
                    'id' => $place->id,
                    'name' => $place->name,
                    'address' => $place->address,
                    'image' => $place->image ? '<img src="' . asset('uploads/place/' . $place->image) . '" alt="No Image" style="width: 100%; max-height: 100px; object-fit: cover;">' : '',

                    'description' => Str::limit($place->description, 50), // обмежте опис до 50 символів
                ],

                'label' => ['color' => 'white', 'text' => $place->name],
                
                'draggable' => false, // You can set this based on your requirements
            ];
        }
        return view('admin.map', compact('initialMarkers'));
    }

    public function view(Request $request)
    {
        $event = Event::find($request->id);
        
        $SelectedFigures = HistoricalFigure::whereHas('events', function ($query) use ($event) {
            $query->where('event_id', $event->id);
        })->get();
        if (!empty($event->marker_id)) {
            // marker_id не є порожнім, шукаємо відповідний об'єкт place
            $place = Place::where('id', $event->marker_id)->first();
            
            if ($place) {
                if(!isset($SelectedFigures))return view('event', ['event'=> $event, 'place' => null]);
                return view('event', ['event'=> $event, 'place'=>$place, 'SelectedFigures'=>$SelectedFigures]);
            }
        }
        if(!isset($SelectedFigures))return view('event', ['event'=> $event, 'place' => null]);
        return view('event', ['event'=> $event, 'place' => null,'SelectedFigures'=>$SelectedFigures]);
    }

    public function figure(Request $request)
    {
        $figure = HistoricalFigure::find($request->id);
    
        $sortedEvents = $figure->events;
        $events = $sortedEvents->sortBy('event_date');

        if($sortedEvents->isNotEmpty()) return view('figure', ['figure'=> $figure, 'events' => $events]);
        
        return view('figure', ['figure'=> $figure, 'events' => null]);
    }
}
