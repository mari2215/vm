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
            <form action="{{ url('admin/update-event/'.$event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-1">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value = "{{ $event->name }}">
                
                </div>
                <div class="my-1">
                    <label for="event_date">Event Date:</label>
                    <input type="date" id="event_date" name="event_date" value="{{ $event->event_date }}" class="form-control">
                    <p>Current Date: {{ $event->event_date }}</p>
                </div>


                <div class="my-1">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4">{{ $event->description }}</textarea>
                </div>

                <div class="my-1">
                    <label for="image">Event Image:</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <p>Current Image: 
                        @if ($event->image)
                            <img src="{{ asset('uploads/event/' . $event->image) }}" alt="Event Image" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </p>
                </div>

                <div class="my-1">
                    <label for="photo_description">Image Description:</label>
                    <textarea id="photo_description" name="photo_description" class="form-control" rows="4">{{ $event->photo_description }}</textarea>
                </div>

                <div class="my-1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="url відео" value = "{{ $event->video_url }}">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="article_url" name="article_url" placeholder="url статті" value = "{{ $event->article_url }}">
                                </div>
                            </div>
                </div>

                <div class="input-group my-1">
                        <input type="text"  id="marker_id" name="marker_id" class="form-control" aria-label="Recipient's username"
                            aria-describedby="basic-addon2" value="{{ $event->marker_id }}" readonly>
                        <div class="input-group-prepend">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-stock">Знайти маркер</button>
                        </div>
                </div>

                
                <select class="js-example-placeholder-multiple form-control" name="figures[]" multiple="multiple">
    @foreach($AllFigures as $figure)
        <option value="{{ $figure->id }}" {{ (isset($selectedFigureIds) && in_array($figure->id, $selectedFigureIds)) ? 'selected' : '' }}>
            {{ $figure->name }}
        </option>
    @endforeach
</select>




                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
 

        </div>
      </div>
    </div>
  </div>



  <!-- Stock Modal -->
<div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
        <form action="#">
            <div class="modal-content">
                <div class="modal-header align-items-center p3 p-md-5">
                    <h2 class="modal-title" id="exampleModalGridTitle">Оберіть маркер</h2>
                    <div>
                        <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                        <!-- <button type="submit" class="btn btn-primary btn-pill" data-dismiss="modal"> save </button> -->
                    </div>
                </div>
                <div class="modal-body p3">
                    <div class="container">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">

function initialize()
{
    initMap();
    $(".js-example-placeholder-multiple").select2({
    placeholder: " Оберіть учасників"
});
}
</script>
<script>
let map, activeInfoWindow, markers = [];

/* ----------------------------- Initialize Map ----------------------------- */
function initMap() {

        map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: <?php echo $lat; ?>,
            lng: <?php echo $lng; ?>,
        },
        zoom: 10,
        styles: 
        [
            {
                "featureType": "all",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": "32"
                    },
                    {
                        "lightness": "-3"
                    },
                    {
                        "visibility": "on"
                    },
                    {
                        "weight": "1.18"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "hue": "#ff0000"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "landscape.man_made",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": "-70"
                    },
                    {
                        "lightness": "14"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.attraction",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.government",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "saturation": "-81"
                    }
                ]
            },
            {
                "featureType": "poi.medical",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "saturation": "-57"
                    }
                ]
            },
            {
                "featureType": "poi.medical",
                "elementType": "labels",
                "stylers": [
                    {
                        "saturation": "-67"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels",
                "stylers": [
                    {
                        "lightness": "40"
                    },
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "poi.place_of_worship",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "42"
                    }
                ]
            },
            {
                "featureType": "poi.school",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "simplified"
                    },
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "40"
                    },
                    {
                        "weight": "0.80"
                    }
                ]
            },
            {
                "featureType": "poi.sports_complex",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "simplified"
                    },
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": "100"
                    },
                    {
                        "lightness": "-14"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    },
                    {
                        "lightness": "12"
                    }
                ]
            }
        ]

    });

    map.addListener("click", function(event) {
    addMarker(event.latLng);
    });



    // map = new google.maps.Map(document.getElementById("map"), {
    //     center: {
    //         lat: 49.422983,
    //         lng: 26.987133,
    //     }

    // });

    
    initMarkers();
}

function addMarker(location) {
    
    const marker = new google.maps.Marker({
        position: location,
        map: map
    });

    // Додавання кнопки видалення маркера
    const deleteButton = document.createElement("button");
    deleteButton.innerHTML = "X";
    deleteButton.className = "delete-marker-button";
    
    // Слухач події для видалення маркера
    deleteButton.addEventListener("click", function() {
        deleteMarker(marker);
    });

    const longitude = location.lng();
    const latitude = location.lat();

    const url = `{{ url('/admin/add-place') }}?longitude=${longitude}&latitude=${latitude}`;

   
    const popupContent = `
        <div class="info-window">
            <p>Your location: ${latitude}, ${longitude}.</p>
            <center><a href="${url}" class="add-marker-link">Додати як новий маркер</a></center>
        </div>
    `;

    const infowindow = new google.maps.InfoWindow({
        content: popupContent
    });

    // Показувати інфовікно при кліку на маркер
    marker.addListener("click", function() {
        infowindow.open(map, marker);
    });

    // Додавання кнопки видалення на маркер
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(deleteButton);

    // Збереження маркера в масиві
    markers.push({ marker, deleteButton });
}

function deleteMarker(marker) {
    // Знаходимо маркер у масиві та видаляємо його з карти
    marker.setMap(null);

    // Видалення кнопки видалення
    const index = markers.findIndex(item => item.marker === marker);
    if (index !== -1) {
        const deleteButton = markers[index].deleteButton;
        deleteButton.remove();
        markers.splice(index, 1);
    }
}

/* --------------------------- Initialize Markers --------------------------- */
function initMarkers() {
    const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

    initialMarkers.forEach(markerData => {
        const marker = new google.maps.Marker({
            position: markerData.position,
            map: map,
            label: markerData.label,
            draggable: markerData.draggable,
        });

        const infowindow = new google.maps.InfoWindow({
            content:  `
            <div class="" style="max-width: 230px;">
                <h5 class="title">${markerData.infoWindow.name}</h5>
                <p class="text">${markerData.infoWindow.address}</p>
                <p class="text-dark mt-2">${markerData.infoWindow.description}</p>
                ${markerData.infoWindow.image}
                
                <center><a href="#" class="choose-marker-btn" data-dismiss="modal" data-id="${markerData.infoWindow.id}">Обрати</a></center>
            </div>
        `
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });

        // Додайте обробник події для кнопки "Обрати"
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('choose-marker-btn')) {
                const id = event.target.dataset.id;
                console.log(id);
                // Set the id in the main form
                document.querySelector('#marker_id').value = id;
                // Закрийте вікно інфовікна
                infowindow.close();
            }
        });
    });
}





/* ------------------------- Handle Map Click Event ------------------------- */
function mapClicked(event) {
    console.log(map);
    // console.log(event.latLng.lat(), event.latLng.lng());
}

/* ------------------------ Handle Marker Click Event ----------------------- */
function markerClicked(marker, index) {
    console.log(map);
    // console.log(marker.position.lat());
    // console.log(marker.position.lng());
}

/* ----------------------- Handle Marker DragEnd Event ---------------------- */
function markerDragEnd(event, index) {
    console.log(map);
    // console.log(event.latLng.lat());
    // console.log(event.latLng.lng());
}
</script>

<script type = "text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCYr5FgoKvB397iT5QbB0SW0FKv6Xit6V0&libraries=places&callback=initialize"></script>
</body>
@endsection