@extends('layouts.admin')
<style>
     .delete-marker-button {
            background-color: #FF5733;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }
 #map {
                /* width: 1000px; */
                width: 50vw;
                height: 400px;
            }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@section('content')

@if(session('message'))
        <div class="alert alert-success">{{ session('message')}}</div>
        @endif

<body>
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    <!-- <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Get In Touch</h5> -->
                    <h1 class="display-5 w-50 mx-auto font-weight-bold">Відредагуйте запис #</h1>
                </div>
            <form action="{{ url('admin/update-figure/'.$figure->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-1">
                    <input type="text" id="name" name="name" class="form-control" value = "{{ $figure->name }}">
                </div>


                <div class="my-1">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4">{{ $figure->description }}</textarea>
                </div>

                <div class="my-1">
                    <input type="text" class="form-control" id="article_url" name="article_url" placeholder="url статті" value = "{{ $figure->article_url }}">
                </div>

                <div class="my-1">
                    <input type="file" id="image" name="image" class="form-control">
                    <p>Current Image: 
                        @if ($figure->image)
                            <img src="{{ asset('uploads/figure/' . $figure->image) }}" alt="figure Image" style="max-height: 100px;">
                        @else
                            No Image
                        @endif
                    </p>
                </div>
                
                <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </form>
 

        </div>
      </div>
    </div>
  </div>



</body>
@endsection