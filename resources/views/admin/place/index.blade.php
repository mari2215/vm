@extends('layouts.admin')

@section('content')

@if(session('message'))
    <div class="alert alert-success">{{ session('message')}}</div>
@endif

<body>
<table id="myTable" class="table table-hover table-product" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Description</th>
            <th>Image</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($places as $place)
        <tr>
            <td>{{ $place->name }}</td>
            <td>{{ $place->address }}</td>
            <td>{{ $place->description }}</td>
            <td>
                @if ($place->image)
                    <img src="{{ asset('uploads/place/' . $place->image) }}" alt="Event Image" class="templatemo-item" style="max-width: 100px;">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $place->latitude }}</td>
            <td>{{ $place->longitude}}</td>
            <td>
              <div class="dropdown">
                <a class="dropdown-toggle" role="button" 
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">Action
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  <a href="/admin/edit-place/{{$place->id}}" class="dropdown-item">Edit</a>
                  <a href="/admin/delete-place/{{$place->id}}" class="dropdown-item">Delete</a>
                  
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
let table = new DataTable('#myTable');
</script>
</body>
@endsection