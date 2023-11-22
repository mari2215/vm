<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HistoricalFigure;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $counts = Event::select(DB::raw('YEAR(event_date) as year, COUNT(*) as count'))
            ->groupBy('year')
            ->get();
        $totalEvents = DB::table('events')->count();
        $totalPlaces = DB::table('places')->count();
        $places = Place::all();
        $figures = DB::table('historical_figures')->count();
        $events = Event::all();
        $labels = $counts->pluck('year');
        $data = $counts->pluck('count');

        return view('admin/home', compact('counts', 'labels', 'data', 'totalEvents', 'totalPlaces', 'places', 'events', 'figures'));
    }
}
