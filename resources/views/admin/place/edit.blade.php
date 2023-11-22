@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('assets/css/form.css')}}">
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    .text-center {
        text-align: center;
    }
    #map {
        height: 450px;
    }

    
</style>
</head>

<div class="container-fluid">
            <div class="container">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    <!-- <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Get In Touch</h5> -->
                    <h1 class="display-5 w-50 mx-auto">Відредагуйте маркер #</h1>
                </div>
                <div class="row g-5 mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="h-100">
                                <div id="map"></div> 
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
						
                        <div class="rounded contact-form">
                        <form action="{{ url('admin/update-place/'.$place->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="mb-4">
                                <input type="text" id="name" name="name" class="form-control" value = "{{ $place->name }}">
                            </div>
                            <div class="mb-4">
                                <input type="text" id="address" name="address" class="form-control" value = "{{ $place->address }}">
                            </div>
                            <div class="mb-4">
                                <textarea id="description" name="description" class="form-control" rows="6">{{ $place->description }}</textarea>
                            </div>
                            <div class="mb-4">
                                <input type="file" id="image" name="image" class="form-control">
                                <p>Current Image: 
                                    @if ($place->image)
                                        <img src="{{ asset('uploads/place/' . $place->image) }}" alt="Place Image" style="max-width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4">
                                <input type="text" id="latitude" name="latitude" class="form-control" value="{{ $place->latitude }}" readonly>
                            </div>
                            <div class="mb-4">
                                <input type="text" id="longitude" name="longitude" class="form-control" value="{{ $place->longitude }}" readonly>
                            </div>
                            <center> <button type="submit" class="btn btn-dark">Зберегти</button></center>
                           
                        </form>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        <!-- Contact End -->

<script>
    function initialize() {
    var input = document.getElementById('address');
    var address = new google.maps.places.Autocomplete(input);
    var map;
    var marker;

    address.addListener('place_changed', function() {
    var place = address.getPlace();
    var newLat = place.geometry.location.lat();
    var newLng = place.geometry.location.lng();
    $('#latitude').val(newLat);
    $('#longitude').val(newLng);
    input.removeAttribute('readonly');

    if (!isNaN(newLat) && !isNaN(newLng) && (newLat !== 0 || newLng !== 0)) {
        if (marker) {
            marker.setPosition(place.geometry.location);
            map.setCenter(place.geometry.location); // Оновити центр мапи на вибраний адресу
        } else {
            var mapOptions = {
                center: place.geometry.location,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.TERRAIN
            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            marker = new google.maps.Marker({ map: map, position: place.geometry.location });
        }
        updateAddress(newLat, newLng);
    }
});


    // Створення карти при завантаженні сторінки
    var latitude = parseFloat($('#latitude').val());
    var longitude = parseFloat($('#longitude').val());
    initMap();
    if (!isNaN(latitude) && !isNaN(longitude)) {
        initMap();
        var newLatLng = new google.maps.LatLng(latitude, longitude);

        if (marker) {
                marker.setPosition(newLatLng);
            } else {
                var mapOptions = {
                    center: {
                        lat: parseFloat($('#latitude').val()),
                        lng: parseFloat($('#longitude').val()),
                    },
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.TERRAIN
                };
                map = new google.maps.Map(document.getElementById('map'), mapOptions);
                
                marker = new google.maps.Marker({ map: map, position: newLatLng });
                input.removeAttribute('readonly');
                updateAddress(latitude, longitude);
            }
    }

    google.maps.event.addListener(map, 'click', function(event) {
        var latitude = event.latLng.lat();
        var longitude = event.latLng.lng();
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);

        updateMarker(latitude, longitude);
        input.removeAttribute('readonly');
        updateAddress(latitude, longitude);
    });

    // Функція для оновлення позиції маркера
    function updateMarker(lat, lng) {
        if (marker) {
            var newLatLng = new google.maps.LatLng(lat, lng);
            marker.setPosition(newLatLng);
        }
    }

    function updateAddress(lat, lng) {
        var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(lat, lng);
        geocoder.geocode({ 'location': latLng }, function(results, status) {
            if (status === 'OK' && results[0]) {
                input.value = results[0].formatted_address;
            }
        });
    }
}

window.onload = function() {
    initialize();
    // initMap();
};

</script>


<script>
            let map, activeInfoWindow;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: parseFloat($('#latitude').val()),
                        lng: parseFloat($('#longitude').val()),
                    },
                    zoom: 15,
                });
            };

</script>

<script type = "text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCYr5FgoKvB397iT5QbB0SW0FKv6Xit6V0&libraries=places&callback=initialize"></script>
@endsection
