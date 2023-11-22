@extends('layouts.admin')

@section('content')
<body>

<table id="myTable" class="table table-hover table-product" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Article_url</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($figures as $figure)
        <tr>
            <td>{{ $figure->name }}</td>
            <td>
                @if ($figure->image)
                    <img src="{{ asset('uploads/figure/' . $figure->image) }}" alt="figure Image" class="templatemo-item" style="max-width: 100px;">
                @else
                    No Image
                @endif
            </td>
            <td>{{ \Illuminate\Support\Str::limit($figure->description, 150) }}</td>
            <td>{{ $figure->article_url }}</td>
            <td>
              <div class="dropdown">
                <a class="dropdown-toggle" role="button" 
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">Action
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  <a href="/admin/edit-figure/{{$figure->id}}" class="dropdown-item">Edit</a>
                  <a href="/admin/delete-figure/{{$figure->id}}" class="dropdown-item">Delete</a>
                  <a href="/admin/view-figure/{{$figure->id}}" class="dropdown-item">View figure</a>
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