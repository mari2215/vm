@extends('layouts.admin')

<html>
    <head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/form.css')}}">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .text-center {
                text-align: center;
            }
            #map {
                width: "100%";
                height: 400px;
            }
        /* Стилізація кнопки видалення маркера */
        .delete-marker-button {
            background-color: #FF5733;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        </style>
    </head>
    @section('content')
    <body>

        <div class="container">
        <div class="form-group">
            <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholer="Enter location">
        </div>
        <div class="form-group">
            <input type="text" id="latitudeArea" class="form-control"  placeholder="Широта">
        </div>
        <div class="form-group">
            <input type="text" id="longitudeArea" class="form-control"  placeholder="Довгота">
        </div>

        <div id="map"></div>
        </div>
        
        
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYr5FgoKvB397iT5QbB0SW0FKv6Xit6V0&libraries=places&callback=initialize" async defer></script> -->
        

        <!-- <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYr5FgoKvB397iT5QbB0SW0FKv6Xit6V0&&callback=initialize">
        </script> -->
        
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#latitudeArea').addClass('d-none');
                $('#longitudeArea').addClass('d-none');
            })
        </script>
         <script type="text/javascript">

            function initialize()
            {
                var input = document.getElementById('autocomplete');
                var autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener('place_changed', function()
                {
                    var place = autocomplete.getPlace();
                    $('#latitudeArea').val(place.geometry['location'].lat())
                    $('#longitudeArea').val(place.geometry['location'].lng())

                    map.setCenter(place.geometry.location);

                    $('#latitudeArea').removeClass('d-none');
                    $('#longitudeArea').removeClass('d-none');
                })

                initMap();
            }
        </script>

        
        <script>
            let map, activeInfoWindow, markers = [];

            /* ----------------------------- Initialize Map ----------------------------- */
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 49.422983,
                        lng: 26.987133,
                    },
                    zoom: 15,
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

                    const editUrl = `{{ url('/admin/edit-place') }}/${markerData.infoWindow.id}`;

                    const infowindow = new google.maps.InfoWindow({
                        content:  `
                        <div class="" style="max-width: 230px;">
                            <h5 class="title">${markerData.infoWindow.name}</h5>
                            <p class="text">${markerData.infoWindow.address}</p>
                            <p class="text-dark mt-2">${markerData.infoWindow.description}</p>
                             ${markerData.infoWindow.image}
                             
                             
                            <center><a href="${editUrl}" class="mt-5">Відредагувати</a></center>
                        </div>
                    `

                    });


                    marker.addListener('click', function () {
                        infowindow.open(map, marker);
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
</html>
