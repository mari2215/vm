@extends('layouts.admin')
<style></style>
<!-- Додайте цей тег в ваш <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')



<div class="container-fluid">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    <!-- <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Get In Touch</h5> -->
                    <h1 class="display-5 w-50 mx-auto font-weight-bold">Додайте нового учасника подій</h1>

                </div>
                <div class="">
                    <form class = "" action="{{url('admin/add-figure')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-1">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Назва"></input>
                        </div>

                        <div class="my-1">
                            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Опис"></textarea>
                        </div>

                        <div class="my-1">
                            <input type="file" id="image" name="image" class="form-control">
                        </div>



                        <div class="my-1">
                           <input type="text" class="form-control" id="article_url" name="article_url" placeholder="url статті">
                        </div>
                        
                       <center> <button type="submit" class="btn btn-primary">Підтвердити</button></center>

                    </form>
                </div>
            </div>
        </div>



<script type="text/javascript">

</script>

<!-- <script type = "text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCYr5FgoKvB397iT5QbB0SW0FKv6Xit6V0&libraries=places&callback=initialize"></script> -->
@endsection