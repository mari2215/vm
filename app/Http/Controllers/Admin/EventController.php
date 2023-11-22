<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HistoricalFigure;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventFormRequest;
use App\Http\Requests\Admin\EventUpdateRequest;

class EventController extends Controller
{
    public function index(){

        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    public function home(){
        $events = Event::all();
        return view('admin.home', compact('events'));
    }

    public function getEvents()
    {
        $events = Event::all(); // Отримайте всі об'єкти подій
    
        return response()->json($events);
    }

    public function create(){
        $places = Place::all();
        $initialMarkers = [];
        $figures = HistoricalFigure::all();
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
        
        return view('admin.event.create', ['initialMarkers' => $initialMarkers, 'figures'=>$figures, 'places'=>$places]);
    }

    public function store(EventFormRequest $request)
    {
        $data = $request->validated();
        $event = new Event;
        $event->name = $data['name'];
        $event->event_date = $data['event_date'];
        $event->description = $data['description'];
        $event->photo_description = $data['photo_description'];
        $event->article_url = $data['article_url'];
        $event->video_url = $data['video_url'];
        if (isset($data['marker_id'])) {
            $event->marker_id = $data['marker_id'];
        } 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/event/', $filename);
            $event->image = $filename;
        }
        $event->save();
        if (isset($data['figures'])) {
            $event->figures()->attach($data['figures']);
        }
        
        return redirect('admin/event')->with('message', 'Event created successfully');
    }

    public function edit($event_id)
    {
        $event = Event::find($event_id);
        $places = Place::all();
        $SelectedFigures = HistoricalFigure::whereHas('events', function ($query) use ($event_id) {
            $query->where('event_id', $event_id);
        })->get();
        
        $AllFigures = HistoricalFigure::all();
        $selectedFigureIds = [];
        foreach ($SelectedFigures as $figure) {
            $selectedFigureIds[] = $figure->id;
        }

        $lat = 0; $lng=0;
        if ($event) {
            $place = Place::where('id', $event->marker_id)->first();

            if ($place) {
                $lat = $place->latitude;
                $lng = $place->longitude;

            } else {
                $lat = 50.4501;
                $lng = 30.5234;
            }
        } 
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
        if (!$event) {
            return redirect('admin/event')->with('error', 'Event not found');
        }
        if(!isset($AllFigures))
        {
            return view('admin.event.edit', ['event' => $event, 'initialMarkers' => $initialMarkers, 'lat'=>$lat, 'lng'=>$lng]);
        }
        return view('admin.event.edit', ['event' => $event, 'initialMarkers' => $initialMarkers, 'lat'=>$lat, 'lng'=>$lng, 'SelectedFigures' => $SelectedFigures,
        'AllFigures' => $AllFigures, 'selectedFigureIds'=>$selectedFigureIds, 'places'=>$places]);
    }

    public function view($event_id)
    {
        $event = Event::find($event_id);
        $SelectedFigures = HistoricalFigure::whereHas('events', function ($query) use ($event_id) {
            $query->where('event_id', $event_id);
        })->get();
        if (!empty($event->marker_id)) {
            // marker_id не є порожнім, шукаємо відповідний об'єкт place
            $place = Place::where('id', $event->marker_id)->first();
            
            if ($place) {
                if(!isset($SelectedFigures))return view('admin.event.view', ['event'=> $event, 'place' => null]);
                return view('admin.event.view', ['event'=> $event, 'place'=>$place, 'SelectedFigures'=>$SelectedFigures]);
            }
        }
        if(!isset($SelectedFigures))return view('admin.event.view', ['event'=> $event, 'place' => null]);
        return view('admin.event.view', ['event'=> $event, 'place' => null,'SelectedFigures'=>$SelectedFigures]);
        
    }

    public function delete($event_id)
    {
        $event = Event::find($event_id);


        if($event){
            $event->delete();
            return redirect('admin/event')->with('message', 'Event deleted');
        }
        else{
            return redirect('admin/event')->with('message', 'event not deleted');
        }
    }

    public function update(EventUpdateRequest $request, $event_id)
    {
        $data = $request->validated();
        $event = Event::find($event_id);

        if (!$event) {
            return redirect('admin/event')->with('error', 'Event not found');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/event/', $filename);
            $event->image = $filename;
        }

        // Check if the event date or description has changed
        if ($data['event_date'] != null && $event->event_date != $data['event_date']) {
            $event->event_date = $data['event_date'];
        }
        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->photo_description = $data['photo_description'];
        $event->marker_id = $data['marker_id'];
        $event->video_url = $data['video_url'];
        $event->article_url = $data['article_url'];
        $event->save();

        if (isset($data['figures'])) {
            $event->figures()->sync($data['figures']);
        }

        return redirect('admin/event')->with('message', 'Event updated successfully');
    }
}
