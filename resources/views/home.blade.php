@extends('layouts.main')

<link rel="stylesheet" href="{{ asset('assets/css/timeline.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/form.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>

  body{
    font-family: var(--font-ermilov);
  }
  .year-links {
      position: fixed;
      padding: 0 0 0 1.4rem;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      list-style-type: none;
    
  }
  .hidden {
      display: none;
  }
  .text-center {
                  text-align: center;
              }
              #map {
                  width: "100%";
                  height: 400px;
                  box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
    -webkit-box-shadow: 12px 40px 40px rgba(0, 0, 0, 0.25);
    border-radius: 16px;
              }
  .span-head
  {
    font-family:Arial Black;
    color:#883a47;
    font-size:xx-large;
  }
  section#war-top {
      position: relative;
      display: flex;
      height: 32rem;
      background-color: var(--color-black);
      background-size: auto 68%;
      background-position: center 10%;
      background-repeat: no-repeat;
      order: 0
  }

  @media(min-width: 1025px) {
      section#war-top {
          height:31.7rem;
          background-size: 55% auto;
          background-position: center
      }
  }

  section#war-top .container {
      /* margin: auto; */
      text-align: center
  }

  section#war-top h1 {
      width: auto;
      text-align: center;
      color: #fff;
      font-size: 3.1rem;
      margin-bottom: .8rem
  }

  @media(min-width: 1025px) {
      section#war-top h1 {
          font-size:2.9rem;
          margin-bottom: .7rem
      }
  }

  section#war-top .count {
      position: absolute;
      width: 100%;
      left: 0;
      bottom: 2rem;
      color: #fff;
      font-size: .7rem;
      padding: 0 1em
  }

  section#war-top .count .days {
      font-family: var(--font-ermilov);
      font-weight: var(--weight-ermilov);
      font-style: normal;
      font-size: 2rem;
      line-height: 1;
      text-align: center;
      text-shadow: 0 0 70.238px var(--color-black);
      margin-bottom: .4rem
  }

  section#war-top .count .days span {
      color: var(--color-red)
  }

  section#war-top .count .text {
      font-weight: 400;
      font-size: .67rem;
      line-height: 1;
      text-align: center;
      color: #fff;
      text-shadow: 0 0 70.238px var(--color-black)
  }

  section#war-top .count .text2 {
      font-weight: 700;
      font-size: .9rem;
      line-height: 1.36;
      text-align: center;
      color: #fff;
      margin-top: .4rem
  }

  section#war-top .count .text2 a {
      color: inherit
  }

  @media(max-width: 767px) {
      div#page.lang-de section#war-top h1 {
          font-size:2.1rem
      }
  }

  .content {
    text-align: center; /* Вирівнювання по центру */
  }

  .content span {
    font-size: 18px; /* Збільшити розмір шрифту */
    display: block; /* Розділити рядки */
  }

  .arrow {
    box-sizing: border-box;
    height: 2vw;
    width: 2vw;
    border-style: solid;
    border-color: black;
    border-width: 0px 1px 1px 0px;
    transform: rotate(45deg);
    transition: border-width 150ms ease-in-out;
  }

  .arrow:hover {
    border-bottom-width: 4px;
    border-right-width: 4px;
  }

  .arrow-down {
    box-sizing: border-box;
    height: 2vw;
    width: 2vw;
    border-style: solid;
    border-color: black;
    border-width: 0px 1px 1px 0px;
    transform: rotate(225deg);
    transition: border-width 150ms ease-in-out;
  }

  .arrow-down:hover {
    border-bottom-width: 4px;
    border-right-width: 4px;
  }

  #expandTimeline {
          margin-top: 10px;
          cursor: pointer;
      }


</style>
@section('content')

<div class="div">
	<center><h1 class="span-head text-dark">РОСІЯ ВТОРГНУЛАСЬ В УКРАЇНУ</h1></center>
	<section id="war-top" style="background-image: url('https://war.ukraine.ua/wp-content/uploads/2022/03/war_map.png')">
		<div class="container">

			<div class="count mt-5">
				<span class="text-danger span-head" id="daysCount"></span>
				<div class="text-dark ">героїчного опору України повномасштабній російській агресії</div>
					<div class="text2">
					<a href="#timeline" class = "text-dark">
					Дізнайтесь хронологію подій 9-річної російської агресії проти України</a>
					</div>
			</div>
		</div>
	</section>
</div>


<!-- <div class="owl-carousel owl-theme carousel-with-captions my-5">
  <div class="single-item bg-overlay-black-40 rounded">
    <img class="rounded" src="{{ asset('assets\theme\images\elements\slide4.jpg')}}" alt="Slide Image">
    <div class="carousel-caption d-none d-md-block">
      <h3 class="text-white mb-3">First Title Goes Here</h3>
      <p class="text-white">Praesent commodo cursus magna vel scelerisque</p>
    </div>
  </div>
  <div class="single-item bg-overlay-black-40 rounded">
    <img class="rounded" src="{{ asset('assets\theme\images\elements\slide3.jpg')}}" alt="Slide Image">
    <div class="carousel-caption d-none d-md-block">
      <h3 class="text-white mb-3">Second Title Goes Here</h3>
      <p class="text-white">Praesent commodo cursus magna vel scelerisque</p>
    </div>
  </div>
  <div class="single-item bg-overlay-black-40 rounded">
    <img class="rounded" src="{{ asset('assets\theme\images\elements\slide1.jpg')}}" alt="Slide Image">
    <div class="carousel-caption d-none d-md-block">
      <h3 class="text-white mb-3">Third Title Goes Here</h3>
      <p class="text-white">Praesent commodo cursus magna vel scelerisque</p>
    </div>
  </div>
</div> -->

<!-- <div class="container"> -->

<!-- <section class="cd-horizontal-timeline">
	<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>
					<li><a href="#0" data-date="16/01/2014" class="selected">16 Jan</a></li>
					<li><a href="#0" data-date="28/02/2014">28 Feb</a></li>
					<li><a href="#0" data-date="20/04/2014">20 Mar</a></li>
					<li><a href="#0" data-date="20/05/2014">20 May</a></li>
					<li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
					<li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
					<li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
					<li><a href="#0" data-date="01/11/2014">01 Nov</a></li>
					<li><a href="#0" data-date="10/12/2014">10 Dec</a></li>
					<li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
					<li><a href="#0" data-date="03/03/2015">3 Mar</a></li>
				</ol>

				<span class="filling-line" aria-hidden="true"></span>
			</div> 
		</div> 
			
		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul> 
	</div>

	<div class="events-content">
		<ol>
			<li class="selected" data-date="16/01/2014">
				
				<span>January 16th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="28/02/2014">
				
				<span>February 28th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="20/04/2014">
				
				<span>March 20th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="20/05/2014">
				
				<span>May 20th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="09/07/2014">
				
				<span>July 9th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="30/08/2014">
				
				<span>August 30th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="15/09/2014">
				
				<span>September 15th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="01/11/2014">
				
				<span>November 1st, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="10/12/2014">
				
				<span>December 10th, 2014</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="19/01/2015">
				
				<span>January 19th, 2015</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>

			<li data-date="03/03/2015">
				
				<span>March 3rd, 2015</span>
				<p>	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
				</p>
			</li>
		</ol>
	</div> 
</section> -->



<section class="game-section">
  <h2 class="line-title span-head">2014 - 2023</h2>
  <div class="owl-carousel custom-carousel owl-theme">
    <div class="item active" style="background-image:url('uploads/slider/2014.jpg')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2014</span></h3>
        <p>
        Війна на сході України<br>
        Росія розпочала агресію проти України, захопивши Крим і частину Донбасу. Внаслідок агресії загинули понад 10 тисяч людей, а десятки тисяч стали біженцями.</p>
      </div>
    </div>
    <div class="item" style="background-image: url('uploads/slider/2015.jpg')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2015</span></h3>
        <p>Мінські угоди<br>
          12 лютого 2015 року в Мінську були підписані угоди, які передбачали припинення вогню на Донбасі, відведення важкого озброєння, звільнення полонених та проведення місцевих виборів.
  Однак, угоди так і не були виконані.</p>
      </div>
    </div>
    <div class="item" style="background-image: url('uploads/slider/2016.jpg')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2016</span></h3>
        <p>Звинувачення Росії в воєнних злочинах<br>

  19 лютого 2016 року Міжнародна комісія ООН з розслідування подій на Донбасі представила свій звіт, у якому звинуватила Росію в воєнних злочинах.</p>
      </div>
    </div>
    <div class="item" style="background-image: url('uploads/slider/2018.jpg')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2017</span></h3>
        <p>Створення "ДНР" та "ЛНР"<br>
        20 лютого 2017 року Росія оголосила про створення так званих "ДНР" та "ЛНР". Російський президент Володимир Путін підписав указ про визнання "ДНР" та "ЛНР" в якості "суверенних і незалежних держав".</p>
      </div>
    </div>
    <div class="item" style="background-image: url('uploads/slider/2019.png')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2018-2020</span></h3>
        <p>
        Переговори в Мінську<br>
  Україна та Росія проводили переговори в Мінську з метою врегулювання конфлікту на Донбасі. Переговори проходили за посередництва Німеччини та Франції. Однак, переговори не привели до істотних результатів.
       
      </p>
      </div>
    </div>
    <div class="item" style="background-image: url('uploads/slider/2021.jpg')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2021</span></h3>
        <p>Послаблення масштабу конфлікту<br>
        Проовження обстрілів в деяких районах Донбасу. Втрати серед військових та мирного населення.
          Сторони конфлікту продовжували обмінюватися полоненими, але переговори про мир так і не привели до результатів</p>
      </div>
    </div>
    <div class="item" style="background-image: url('uploads/slider/2022.jpg')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2022</span></h3>
        <p>Повномасштабне вторгнення Росії в Україну<br>
        24 лютого 2022 року Росія розпочала повномасштабне вторгнення в Україну. Російські війська вторглися в Україну з усіх боків, і війна швидко переросла в наймасштабніший конфлікт в Європі з часів Другої світової війни.</p>
      </div>
    </div>
    <div class="item" style="background-image: url('uploads/slider/2023.jpg')">
      <div class="item-desc">
        <h3><span class="span-head text-white">2023</span></h3>
        <p>Повномасштабна війна в Україні триває<br>
        У 2023 році повномасштабна війна в Україні триває. Російські війська намагаються захопити Донбас, але українська армія чинить опір.
        Україна отримала значну військову допомогу від Заходу, яка забезпечила умови для переходу в контрнаступ.</p>
      </div>
    </div>
  </div>
  </div>
</section>



<center><h3><span class="span-head mb-5 pb-5">Карта подій</span></h3></center>


<div class="mt-5" style="text-align: center;">
<select class="js-example-basic-single form-control col-8 mt-4" id="place-select" name="state">
    @foreach ($places as $place)
      <option value="{{$place->id}}" data-latitude="{{$place->latitude}}" data-longitude="{{$place->longitude}}">{{$place->name}}</option>
    @endforeach
</select>

</div>

<div class="container">
<div id="map" class="my-5 pb-5"></div> 
</div>


<div class="container my-8">
<center><h3><span class="span-head mt-5 pt-5">Учасники подій</span></h3></center>
  <div class="owl-carousel owl-theme carousel-user mt-6">
    @foreach($figures as $figure)
    <div class="card rounded-2 py-5 mx-2" style=" border-radius: 15px; box-shadow: 0 0px 18px rgba(0, 0, 0, 0.25);">
        <a href="{{ route('figure', ['id' => $figure->id]) }}">
        <img src="{{ asset('uploads/figure/' . $figure->image) }}" class="card-img-top rounded-circle" style="width: 150px;
            height: 150px;
            object-fit: cover;" alt="User Image">
        </a>
     
      <div class="card-body text-center">
        <span class="h3">{{$figure->name}}</span><br>
        <span>{{$figure->description}}</span>
      </div>
    </div>
    @endforeach
  </div>
</div>



<section class="my-5 pt-5">
<div class="container">

<center><h3><span class="span-head mt-5 pt-5">Хронологія</span></h3></center>
    <div class="row">
        <nav class="col-sm-3"> 
            <ul id="year-menu" class="navnav-pills year-links hidden">
                @foreach ($uniqueYears as $year)
                    <li class="nav-item">
                       <a class="nav-link year-l" href="#year-{{ $year->year }}"> <span class="span-head">{{ $year->year }}</span></a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="col-sm-8 offset-sm-12 vertical-tl"> <!-- Додано offset-sm-3 для зсуву правого блоку на ширину лівого блоку -->
			<ul id='timeline'>
				@php
					$previousYear = null;
				@endphp

				@foreach ($events as $event)
					@php
						$currentYear = \Carbon\Carbon::parse($event->event_date)->year;
					@endphp

					@if ($currentYear != $previousYear)
						<span  class="span-head" id="year-{{ $currentYear }}">{{ $currentYear }}</span>
						@php
							$previousYear = $currentYear;
						@endphp
					@endif

					<li class='work' >
						<input class='radio' id='work{{ $loop->index }}'  name='works' type='radio' {{ $loop->first ? 'checked' : '' }}>
						<div class="relative">
							<label for='work{{ $loop->index }}'>
								<!-- {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }} -->
                {{ $event->name }}
							</label>
							<span class='date-timeline'>
								{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}
							</span>
							<span class='circle-timeline'></span>
						</div>
						<div class='content-timeline'>
              <p>{{ \Illuminate\Support\Str::limit($event->description, 250) }} <a href="{{ route('event', ['id' => $event->id]) }}">Переглянути детальніше</a></p>
              <!-- @if ($event->image)
              <img src="{{ asset('uploads/event/' . $event->image) }}" alt="Event Image" >
             @else
                            
              @endif -->
						</div>
					</li>
				@endforeach
			</ul>

        </div>
    </div>
</div>
</section>

<!-- </div> -->

<script src="{{ asset('assets/js/timeline.js')}}"></script>
<script src="{{ asset('assets/js/form.js')}}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script>
    
        $('.js-example-basic-single').select2();
        
        $('#place-select').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var latitude = parseFloat(selectedOption.attr('data-latitude'));
            var longitude = parseFloat(selectedOption.attr('data-longitude'));

            // Встановлення центру карти за координатами місця
            var center = { lat: latitude, lng: longitude };
            map.setCenter(center);
            map.setZoom(15); 
});
    
</script>
<script>
$(document).ready(function() {
   
    var sectionOffset = $('.vertical-tl').offset().top;
    var $yearLinks = $('.year-links');

    // Заховати список років при завантаженні сторінки
    $yearLinks.hide();

    // Слухач на подію hover для блоку .vertical-tl
    $('.vertical-tl').hover(
        function() {
            // При наведенні вивести список років
            $yearLinks.fadeIn();
        },
        function() {
            // При знятті наведення сховати список років
            // $yearLinks.fadeOut(700);
        }
    );

    $(window).scroll(function() {
        if ($(window).scrollTop() >= sectionOffset) {
            // При прокрутці до .vertical-tl відобразити список років
            // $yearLinks.fadeIn(700);
        } else {
            // Якщо прокрутка нижче .vertical-tl, заховати список років
            $yearLinks.fadeOut(700);
        }
    });


    var itemsToShow = 3; // Кількість записів для відображення спочатку
var $timelineItems = $('.work');

// Приховати всі записи, крім перших itemsToShow
$timelineItems.filter(':gt(' + (itemsToShow - 1) + ')').hide();

// Додати кнопку "розгорнути"
$('#timeline').after('<center><a data-scroll id="expandTimeline">' +
  '<div class="arrow"></div>' +
'</a></center>');

// Додати кнопку "згорнути" (приховану спочатку)
$('#timeline').after('<center><a data-scroll id="collapseTimeline" style="display: none;">' +
  '<div class="arrow-down"></div>' +
'</a></center>');

// Обробка кліку на кнопку "розгорнути"
$('#expandTimeline').on('click', function() {
    $timelineItems.show(); // Показати всі записи
    $(this).hide(); // Приховати кнопку "розгорнути"
    $('#collapseTimeline').show(); // Показати кнопку "згорнути"
});

// Обробка кліку на кнопку "згорнути"
$('#collapseTimeline').on('click', function() {
    $timelineItems.filter(':gt(' + (itemsToShow - 1) + ')').hide(); // Приховати записи після itemsToShow
    $(this).hide(); // Приховати кнопку "згорнути"
    $('#expandTimeline').show(); // Показати кнопку "розгорнути"
});

});
</script>
<script>
	// JavaScript-код
document.addEventListener('DOMContentLoaded', function() {
    // Задаємо початкову дату
    var startDate = new Date('2022-02-23');
    var currentDate = new Date();
    var timeDiff = currentDate - startDate;
    var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    document.getElementById('daysCount').textContent = daysDiff + ' день';
});

</script>
<script>
    const yearLinks = document.querySelectorAll('.year-l');

    yearLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const href = link.getAttribute('href');
            const year = href.replace('#year-', ''); // Extract the year

            // Construct the target ID
            const targetId = `year-${year}`;
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                });

				const firstWork = targetElement.nextElementSibling.querySelector('input.radio');
				console.log(firstWork);
				if (firstWork) {
					// Uncheck all radio inputs with the same name
					document.querySelectorAll('input.radio').forEach(radio => {
						radio.checked = false;
					});

					// Check the selected radio input
					firstWork.checked = true;
				}

            }
        });

        
    });
</script>
<script type="text/javascript">

function initialize()
{
    initMap();
    initMarkers();
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
        zoom: 6,
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

    initMarkers();
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
            </div>
        `

        });


        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
    });

}

</script>

<script type = "text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCYr5FgoKvB397iT5QbB0SW0FKv6Xit6V0&libraries=places&callback=initialize"></script>


@endsection

