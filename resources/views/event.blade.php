@extends('layouts.main')
<style>
        @import 'https://fonts.googleapis.com/css?family=Open+Sans|Quicksand:400,700';
    body,
    html {
    /* height: 100%; */
    /* font-family: 'Quicksand', sans-serif; */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }

    h2, h3 {
    font-size: 16px;
        letter-spacing: -1px;
    line-height: 20px;
    }

    h6 {
    font-size: 6px;
    
    }

    h2 {
        color: #747474;
        text-align: center;
    }

    h3 {
        color: #032942;
        text-align: right;
    }

    .span-head
  {
    font-family:Arial Black;
    color:red;
    font-size:xx-large;
  }

.main-banner {
  background-position: center center;
  background-size: cover;
  min-height: 380px;
  border-radius: 23px;
}

.main-banner h6 {
  font-size: 20px;
  color: #fff;
  font-weight: 400;
  margin-bottom: 25px;
}

.main-banner h4 {
  font-size: 45px;
  text-transform: uppercase;
  margin-bottom: 25px;
}

.main-banner h4 em {
  font-style: normal;
  color: #ec6090;
}

a {
	color: #CCC;
  text-decoration: none !important;
}
a:hover {
	color: #F99;
}

h1, h2, h3, h4, h5 {
  margin-top: 0px;
  margin-bottom: 0px;
  color: #fff;
  font-weight: 700;
}

img {
  width: 100%;
  overflow: hidden;
}

/* 
---------------------------------------------
Global Styles
--------------------------------------------- 
*/
html,
body {
  background: #1f2122;
  font-family: 'Poppins', sans-serif;
}

body .page-content {
  padding: 40px;
  border-radius: 23px;
  box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
    -webkit-box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
}

p {
  font-size: 15px;
  color: #848484;
  line-height: 30px;
  margin-bottom: 0px;
}

.templatemo-item {
	max-width: 80px; 
	border-radius: 23px;
}

.main-button a {
  font-size: 14px;
  color: #fff;
  background-color: #848484;
  padding: 12px 30px;
  display: inline-block;
  border-radius: 25px;
  font-weight: 400;
  text-transform: capitalize;
  letter-spacing: 0.5px;
  transition: all .3s;
  position: relative;
  overflow: hidden;
}

.main-button a:hover {
  background-color: #fff;
  color: #848484;
}

.main-border-button a {
  font-size: 14px;
  color: #848484;
  background-color: transparent;
  border: 1px solid #868686;
  padding: 12px 30px;
  display: inline-block;
  border-radius: 25px;
  font-weight: 400;
  text-transform: capitalize;
  letter-spacing: 0.5px;
  transition: all .3s;
  position: relative;
  overflow: hidden;
}

.main-border-button a:hover {
  border-color: #fff;
  background-color: #fff;
  color: #848484;
}


section {
  margin-top: 120px;
}

#map {
                height:300px;
            }
@media(max-width: 767px) {
    #map {
                
                height:150px;
            }

    body .page-content {
      padding: 30px;
      margin: 0;
      }
  }
  .image-container {
  position: relative;
  display: inline-block;
}

.zoomable-image {
  width: 60px;
  height: 60px;
  object-fit: cover;
}

.image-overlay {
  position: absolute;
  width: 15vw;
  top: -50px; 
  transform: translateY(-50%);
  left:calc(0% - 5vw);
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  opacity: 0;
  transition: opacity 0.3s ease;
  pointer-events: none;
}
.image-overlay:after {
  content:'';
  position: absolute;
  top:100%;
  left:calc(50% - 10px);
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 10px 10px 0 10px ;
  border-color: #1f2122 transparent transparent transparent;
}

.image-container:hover .image-overlay {
  opacity: 1;
  pointer-events: auto;
}

</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')
<body>



<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                @if ($event->image)
                    @if (!empty($event->marker_id))
                    <div class="col-lg-4">
                    <img src="{{ asset('uploads/event/' . $event->image) }}" id = "image" class="rounded-2 horizontal-img img-fluid w-100" style="border-radius: 16px; height:inherit;" alt="Image">
                    </div>
                    <div class="col-lg-8 align-self-center">
                    <div id="map" style="border-radius: 16px;"></div>
                    </div>
                  </div>
                  <div class="col-lg-12 align-self-center">
                    <div class="main-info header-text">
                    <span class="span-head">{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}</span>
                      <h4>{{ $event->name }}</h4>
                      <p>{{ $event->description }}</p>
                    </div>
                  </div>
                  
                  @else
                  <div class="col-lg-4">
                      <img src="{{ asset('uploads/event/' . $event->image) }}" class="rounded-left horizontal-img img-fluid w-100" style="border-radius: 16px;" alt="Image">
                  </div>
                  <div class="col-lg-8 align-self-center">
                    <div class="main-info header-text">
                    <span class="span-head">{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}</span>
                      <h4>{{ $event->name }}</h4>
                      <p>{{ $event->description }}</p>
                    </div>
                  </div>
                  @endif
                  @elseif (!empty($event->marker_id))
                  <div class="col-lg-6 align-self-center">
                    <div class="main-info header-text">
                    <span class="span-head">{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}</span>
                      <h4>{{ $event->name }}</h4>
                      <p>{{ $event->description }}
                       
                      </div>
                    </div>
                  <div class="align-self-center col-lg-6">
                    <div id="map" style="border-radius: 16px;"></div>
                  </div>
                @else
                <div class="col-lg-12 align-self-center">
                    <div class="main-info header-text">
                    <span class="span-head">{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}</span>
                      <h4>{{ $event->name }}</h4>
                      <p>{{ $event->description }}</p>
                      
                    </div>
                  </div>
                @endif

                 
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="clips">
                      <div class="row mt-2">
                        @if ($event->video_url)
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                              <div class="main-border-button">
                                <h4><a href="{{$event->video_url}}" class="mr-2" target="_blank">Переглянути відео  <i class="fa fa-play"></i></a></h4>
                              </div>
                          </div>
                        </div>
                        @endif
                        @if ($event->article_url)
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                              <div class="main-border-button">
                                <h4><a href="{{$event->article_url}}" class="mr-2" target="_blank">Прочитати статтю   <i class="fa fa-eye"></i></a></h4>
                              </div>
                          </div>
                        </div>
                        @endif

                        @if ($SelectedFigures)
                          @foreach($SelectedFigures as $SelectedFigure)
                          <div class="media media-sm mb-0 ml-3">
                            <div class="media-sm-wrapper">
                            @if ($SelectedFigure->image)
                            <div class="image-container">
                              <div class="image-overlay">
                                <center><span class="overlay-text">{{$SelectedFigure->name}}</span><center>
                              </div>
                              <a href="{{ route('figure', ['id' => $SelectedFigure->id]) }}">
                                <img src="{{ asset('uploads/figure/' . $SelectedFigure->image) }}" alt="figure Image" class="zoomable-image mx-2">
                              </a>
                            </div>

                            @else
                                No Image
                            @endif
                            
                            </div>
                          </div>
                          @endforeach
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->
        </div>
      </div>
    </div>
  </div>

<div class="container mt-5 pt-5 bg-white">
<div id="disqus_thread" class="bg-white"></div>
</div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = "{{ url('/event/' . $event->id) }}";  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = "event_{{ $event->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://virtual-museum.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<!-- <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> -->
<script>
    function initialize() {
    var map;
    var marker;
    var placeExists = <?php echo json_encode(isset($place)); ?>; // Перевірка на існування об'єкту place
    console.log(placeExists);
    <?php if (isset($place)) : ?>
    if (placeExists) {
        
        var latitude = <?php echo json_encode($place->latitude); ?>;
        var longitude = <?php echo json_encode($place->longitude); ?>;

        if (!isNaN(latitude) && !isNaN(longitude)) {
            var newLatLng = new google.maps.LatLng(latitude, longitude);

            var mapOptions = {
                center: newLatLng,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.TERRAIN
            };

            const map = new google.maps.Map(document.getElementById('map'), mapOptions);
            <?php if (isset($event->image)) : ?>
                const image = document.getElementById('image');
                const imageHeight = image.offsetHeight;
                console.log(imageHeight);
                map.getDiv().style.height = `${imageHeight}px`;
            <?php endif ?>

            const marker = new google.maps.Marker({
            position: newLatLng,
            map: map,
        });
        const imageUrl = <?php echo json_encode(asset('uploads/place/' . $place->image)); ?>;
        const infowindow = new google.maps.InfoWindow({
    content: `
        <div class="" style="max-width: 230px; max-height: 300px; overflow-y: auto;">
            <h6 class="title"><?php echo ($place->name) ?></h6>
            <h6 class="text"><?php echo ($place->address)?></h6>
            <h6 class="text-dark mt-2"><?php echo ($place->description)?></h6>
            
            
        </div>
    `
});


        // marker.addListener('click', function () {
            infowindow.open(map, marker);
        // });
            
        }

    }
    <?php endif ?>
    
window.onload = function() {
    initialize();
};

}


</script>

<script type = "text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCYr5FgoKvB397iT5QbB0SW0FKv6Xit6V0&libraries=places&callback=initialize"></script>
</body>
@endsection
