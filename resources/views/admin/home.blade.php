
@extends('layouts.admin')
<link href="{{ asset('assets/theme/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
<script src="{{ asset('assets/theme/plugins/nprogress/nprogress.js')}}"></script>
@section('content')

<div class="content-wrapper bg-light">
          <div class="content">                
             <div class="row">
                  <div class="col-xl-6">
                      <!-- Sessions By Device -->
                      <div class="card card-default">
                        <div class="card-header border-bottom">
                          <h2 class="mdi mdi-desktop-mac">Події по рокам</h2>
                        </div>
                        <div class="card-body pt-2">
                        <div class="chart-container">
                            <canvas id="chart2"></canvas>
                        </div>
                        </div>
                      </div>
                  </div>

                 
                  <div class="col-xl-4 col-md-6">
                    <div class="card card-default bg-secondary">
                      <div class="d-flex p-1">
                        <div class="icon-md bg-white rounded-circle mr-3">
                          <i class="mdi mdi-bell text-secondary"></i>
                        </div>
                        <div class="text-left">
                          <span class="h2 d-block text-white">{{ $totalEvents }}</span>
                          <p class="text-white">Подій</p>
                        </div>
                      </div>
                    </div>

                    <div class="card card-default bg-success">
                      <div class="d-flex p-1">
                        <div class="icon-md bg-white rounded-circle mr-3">
                          <i class="mdi mdi-pin text-success"></i>
                        </div>
                        <div class="text-left">
                        <span class="h2 d-block text-white">{{ $totalPlaces }}</span>
                          <p class="text-white">Маркерів</p>
                        </div>
                      </div>
                    </div>


                    <div class="card card-default bg-info">
                      <div class="d-flex p-1">
                        <div class="icon-md bg-white rounded-circle mr-3">
                          <i class="mdi mdi-account text-success"></i>
                        </div>
                        <div class="text-left">
                        <span class="h2 d-block text-white">{{ $figures }}</span>
                          <p class="text-white">Учасників подій</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Second box -->
                  <div class="col-xl-4 col-md-6">
                    
                  </div>



                
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Маркери</h2>
                        
                      </div>
                      <div class="card-body">
                      <table id="PlacesTable" class="table table-hover table-product table-responsive" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Назва</th>
                                  <th>Адрес</th>
                                  <th>Опис</th>
                                  <th>Зображення</th>
                                  <th>Широта</th>
                                  <th>Довгота</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($places as $place)
                              <tr>
                                  <td>{{ $place->name }}</td>
                                  <td>{{ \Illuminate\Support\Str::limit($place->address, 25) }}</td>
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
                                      </div>
                                    </div>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>

                      </div>
                    </div>
                  </div>
                </div>

                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Події</h2>
                        
                      </div>
                      <div class="card-body">
                      <table id="myTable" class="table table-hover table-product table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Зображення</th>
                                <th>Опис</th>
                                <th>Опис зображення</th>
                                <th>маркер ID</th>
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
                                <td>{{ \Illuminate\Support\Str::limit($event->description, 40) }}</td>
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

                      </div>
                    </div>
                  </div>
                </div>

</div>
          
        </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
let table = new DataTable('#PlacesTable');
let table2 = new DataTable('#myTable');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script>
  var labels = JSON.parse('{{ $labels }}');
  var datas = JSON.parse('{{$data }}');
  const ctx2 = document.getElementById("chart2").getContext('2d');
    const myChart3 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: datas,
                backgroundColor: ['#369382', '#E4BFFF', '#FFD6A5', '#C70039', '#F0A6CA', '#C7CEEA'],
 // Встановіть власні кольори
                hoverBackgroundColor: '#ABCDEF' // Колір при наведенні
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    enabled: true
                },
                legend: {
                    display: false // Вимкнути відображення легенди
                }
            }
        }
    });

</script>



<script src="{{ asset('assets/theme/plugins/apexcharts/apexcharts.js')}}"></script>
@endsection
