@extends('layouts.admin')

@section('content')




<body>

<table id="myTable" class="table table-hover table-product" style="width:100%">
    <thead>
        <tr>
            <th>Event date</th>
            <th>Image</th>
            <th>Description</th>
            <th>Photo Description</th>
            <th>Marker ID</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $event->event_date }}</td>
            <td>
                @if ($event->image)
                    <img src="{{ asset('uploads/event/' . $event->image) }}" alt="Event Image" class="templatemo-item" style="max-width: 100px;">
                @else
                    No Image
                @endif
            </td>
            <td>{{ \Illuminate\Support\Str::limit($event->description, 150) }}</td>
            <td>{{ $event->photo_description }}</td>
            <td>
                @if ($event->marker_id)
                    {{$event->marker_id}}
                @else
                    NULL
                @endif
            </td>
            <td>
              <div class="dropdown">
                <a class="dropdown-toggle" role="button" 
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">Action
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  <a href="/admin/edit-event/{{$event->id}}" class="dropdown-item">Edit</a>
                  <a href="/admin/delete-event/{{$event->id}}" class="dropdown-item">Delete</a>
                  <a href="/admin/view-event/{{$event->id}}" class="dropdown-item">View event</a>
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