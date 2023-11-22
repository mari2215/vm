<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use App\Models\figure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HistoricalFigure;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FigureFormRequest;
use App\Http\Requests\Admin\FigureUpdateRequest;

class FiguresController extends Controller
{
    public function index(){

        $figures = HistoricalFigure::all();
        return view('admin.figure.index', compact('figures'));
    }

    public function create(){
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
        
        return view('admin.figure.create', ['initialMarkers' => $initialMarkers]);
    }

    public function store(figureFormRequest $request)
    {
        $data = $request->validated();
        $figure = new HistoricalFigure;
        $figure->name = $data['name'];
        $figure->description = $data['description'];
        $figure->article_url = $data['article_url'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/figure/', $filename);
            $figure->image = $filename;
        }
        $figure->save();
        return redirect('admin/figure')->with('message', 'figure created successfully');
    }

    public function edit($figure_id)
    {
        $figure = HistoricalFigure::find($figure_id);
    
        return view('admin.figure.edit', ['figure' => $figure]);
    }

    public function view($figure_id)
    {
        $figure = HistoricalFigure::find($figure_id);
    
        return view('admin.figure.view', ['figure'=> $figure]);
        
    }

    public function delete($figure_id)
    {
        $figure = HistoricalFigure::find($figure_id);
        if($figure){
            $figure->delete();
            return redirect('admin/figure')->with('message', 'figure deleted');
        }
        else{
            return redirect('admin/figure')->with('message', 'figure not deleted');
        }
    }

    public function update(FigureUpdateRequest $request, $figure_id)
    {
        $data = $request->validated();
        $figure = HistoricalFigure::find($figure_id);

        if (!$figure) {
            return redirect('admin/figure')->with('error', 'figure not found');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/figure/', $filename);
            $figure->image = $filename;
        }

       
        $figure->name = $data['name'];
        $figure->description = $data['description'];
        $figure->article_url = $data['article_url'];
        $figure->save();

        return redirect('admin/figure')->with('message', 'figure updated successfully');
    }
}
