@extends('layouts.main')
<style>
    @import 'https://fonts.googleapis.com/css?family=Open+Sans|Quicksand:400,700';


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


.timeline_wrap {
    overflow:hidden;
}
#timeline_slider {
    display:flex;
     overflow-x:scroll;
     padding-bottom:20px;
      transform:translatey(20px)
}
.timeline {
    width:2px;
     position:absolute;
     background:white;
     height:100%;
     left:50%;
}
 .timeline_slide {
    min-width:300px;

     max-width:10px;
     cursor:grab;
}

 .timeline_nav {
     margin:auto;
     position:absolute;
     right:10%;
     z-index:99999;
     top:115px;
     width:fit-content;
}
 .timeline_nav button span {
/*  Keep the user from selecting the chevrons. You could just use an image instead of an icon instead.   */
    pointer-events:none;
  -webkit-touch-callout: none;
    -webkit-user-select: none; 
       -moz-user-select: none; 
        -ms-user-select: none; 
            user-select: none; 
     border-radius:100%;
      pointer-events:none;
     border:2px solid white;
     font-size:40px;
       color:white;
}

 .blueback {
    background:#2D5772;
}
 .timeline_nav button {
    background:transparent;
     border:none;

}

 .timeline_nav button:hover {
    transform:scale(1.1)
}
/* Overlay in case you want to add a background image */
.timeline_dot {
    background: rgb(255, 255, 255); /* Змінений колір на білий (255, 255, 255) */
    width: 20px;
    height: 20px;
    border: 2px solid rgba(0, 0, 0, 0.5);
    border-radius: 100%;
    padding: 5px;
    margin: 10px auto;
}

.timeline_dot_center {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background: red; /* Змінений колір на білий */
}

.timeline_item_content {
    border: 1px solid rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    padding: 15px;
    background: rgba(0, 0, 0, 0.5); /* Змінений колір фону на темний прозорий */
}


 @media only screen and (max-width:1200px) {
     .timeline_nav {
        width:90%;
         z-index:999999;
         left:5%;
         display:flex;
         justify-content:space-between;
    }
}
 @media only screen and (max-width:768px) {
     .timeline_line {
        min-width:100%;
         background: rgba(0, 0, 0, 0.5);
         /* background: linear-gradient(-90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 10%, rgba(255,255,255,1) 90%, rgba(255,255,255,0) 100%); */
    }
     .timeline_nav span {
        background:transparent;
    }
}
 @media only screen and (min-width:768px) {
     #timeline_slider {
        padding-left:10%;
    }
     .timeline_header {
        position:relative;
         width:fit-content;
         padding:0 20px;
         margin-left:10%
    }
     .timeline_top {
        max-width:90%;
         overflow:hidden;
         padding:100px 0;
         margin-left:auto;
    }
     .tl_line {
        position:absolute;
         background:white;
    }
}
.timeline_line {
     position:absolute;
     max-width:100%;
     right:0;
     height:2px;
     top: 39%;
     background:rgba(0, 0, 0, 0.5);
     width:100%;
}
.timeline_fadebox {
    position: absolute;
    background: rgb(255, 255, 255); /* Білий колір фону */
    background: linear-gradient(-90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 3) 100%);
    z-index: 9999;
    width: 10%;
    height: 100%;
    left: 0;
    top: 0;
}
.timeline_fadeboxs {
    position: absolute;
    background: rgb(255, 255, 255); /* Білий колір фону */
    background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 3) 100%);
    z-index: 9999;
    width: 10%;
    height: 100%;
    right: 0;
    top: 0;
}



/*  */

</style>

<!-- <link rel="stylesheet" href="{{ asset('assets/css/timeline.css')}}"> -->
@section('content')
<body>




<div class="container">
    <div class="page-content">
        <div class="row">
            @if ($figure->image)
                <div class="col-lg-4">
                    <img src="{{ asset('uploads/figure/' . $figure->image) }}" id="image" class=" rounded-1 horizontal-img img-fluid w-100" style="border-radius: 32px; height: inherit; " alt="Image">
                </div>
                <div class="col-lg-8">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="span-head">{{ $figure->name }}</span>
                        <p>{{ $figure->description }}</p>

                        @if ($events)
                        <!-- <span>Список подій в яких приймав участь:</span> -->
                        <section id="timeline" class="mt-5">
   
                          <div class="timeline_bottom bg-cover" >
                              <div class="green_overlay pb-md-5">
                                <div class="py-2 timeline_content position-relative">
                                <div class="timeline_fadebox d-none d-md-block" aria-hidden="true">
                                    </div>
                                    <div class="timeline_wrap">
                                    <div class="timeline_line" aria-hidden="true">
                                      </div>
                                      <div id="timeline_slider">
                                          
                                      <!--------------------------------------->
                                      @foreach($events as $event)
                                          <div class="timeline_slide px-4">
                                            <p class="yellow timeline_date text-center m-0 h4">
                                              <a href="{{ route('event', ['id' => $event->id]) }}">{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}</a>
                                            </p>
                                            <div class="timeline_dot flex-center" aria-hidden="true">
                                                <div class="timeline_dot_center">
                                                </div>
                                            </div>
                                            <p class="timeline_item_content text-light mt-3">
                                            {{ \Illuminate\Support\Str::limit($event->description, 100) }}
                                            </p>
                                          </div>
                                          <!--------------------------------------->
                                          @endforeach
                                      </div>
                                      <div class="timeline_fadeboxs d-none d-md-block" aria-hidden="true">
                                    </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </section>
                        @endif
                    </div>
                </div>
            @elseif (!$figure->image)
                <div class="col-lg-12">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="span-head">{{ $figure->name }}</span>
                        <p>{{ $figure->description }}</p>

                        @if ($events)
                        <!-- <span>Список подій в яких приймав участь:</span> -->
                        <section id="timeline" class="mt-5">
   
                          <div class="timeline_bottom bg-cover" >
                              <div class="green_overlay pb-md-5">
                                <div class="py-2 timeline_content position-relative">
                                <div class="timeline_fadebox d-none d-md-block" aria-hidden="true">
                                    </div>
                                    <div class="timeline_wrap">
                                    <div class="timeline_line" aria-hidden="true">
                                      </div>
                                      <div id="timeline_slider">
                                          
                                      <!--------------------------------------->
                                      @foreach($events as $event)
                                          <div class="timeline_slide px-4">
                                            <p class="yellow timeline_date text-center m-0 h4">
                                              <a href="{{ route('event', ['id' => $event->id]) }}">{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}</a>
                                            </p>
                                            <div class="timeline_dot flex-center" aria-hidden="true">
                                                <div class="timeline_dot_center">
                                                </div>
                                            </div>
                                            <p class="timeline_item_content text-light mt-3">
                                            {{ \Illuminate\Support\Str::limit($event->description, 100) }}
                                            </p>
                                          </div>
                                          <!--------------------------------------->
                                          @endforeach
                                      </div>
                                      <div class="timeline_fadeboxs d-none d-md-block" aria-hidden="true">
                                    </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </section>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        
    </div>
</div>


<div class="container mt-5 pt-5">
<div id="disqus_thread"></div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = "{{ url('/figure/' . $figure->id) }}";  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = "figure_{{ $figure->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://virtual-museum.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<script>
  // Arrow Movement
var interval;

jQuery('.left').mousedown(function(event) {
        let target = jQuery("#timeline_slider");
        let current_x = target.scrollLeft();
        if (target.length) {
            event.preventDefault();
            jQuery(target).animate({
                scrollLeft: current_x - 100
            }, 100, "linear");
        }
        interval = setInterval(function() {
            let target = jQuery("#timeline_slider");
            let current_x = target.scrollLeft();

            if (target.length) {
                event.preventDefault();
                jQuery(target).animate({
                    scrollLeft: current_x - 100
                }, 100, "linear");
            }
        }, 100);
    })
    .mouseup(function() {
        clearInterval(interval);
    });

jQuery('.right').mousedown(function(event) {
        let target = jQuery("#timeline_slider");
        let current_x = target.scrollLeft();

        if (target.length) {
            event.preventDefault();
            jQuery(target).animate({
                scrollLeft: current_x + 100
            }, 100, "linear");
        }
        interval = setInterval(function() {
            let target = jQuery("#timeline_slider");
            let current_x = target.scrollLeft();

            if (target.length) {
                event.preventDefault();
                jQuery(target).animate({
                    scrollLeft: current_x + 100
                }, 100, "linear");
            }
        }, 100);
    })
    .mouseup(function() {
        clearInterval(interval);
    });

// Grab and Move
const container = document.querySelector('#timeline_slider');

let startY;
let startX;
let scrollLeft;
let scrollTop;
let isDown;

container.addEventListener('mousedown', e => mouseIsDown(e));
container.addEventListener('mouseup', e => mouseUp(e))
container.addEventListener('mouseleave', e => mouseLeave(e));
container.addEventListener('mousemove', e => mouseMove(e));

function mouseIsDown(e) {
    isDown = true;
    startY = e.pageY - container.offsetTop;
    startX = e.pageX - container.offsetLeft;
    scrollLeft = container.scrollLeft;
    scrollTop = container.scrollTop;
}

function mouseUp(e) {
    isDown = false;
}

function mouseLeave(e) {
    isDown = false;
}

function mouseMove(e) {
    if (isDown) {
        e.preventDefault();
        //Move vertcally
        const y = e.pageY - container.offsetTop;
        const walkY = y - startY;
        container.scrollTop = scrollTop - walkY;

        //Move Horizontally
        const x = e.pageX - container.offsetLeft;
        const walkX = x - startX;
        container.scrollLeft = scrollLeft - walkX;

    }
}
</script>
<!-- <script src="{{ asset('assets/js/timeline.js')}}"></script> -->
</body>

@endsection
