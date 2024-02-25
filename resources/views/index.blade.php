<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllChefs</title>
    <style>
        /* Custom style for the toggle arrow */
        .btn-primary.dropdown-toggle::after {
            border-top-color: darkslategrey;
            width:10px;
        }

        i:hover{
          opacity: 90%;
        }
        .col-md{
          background-color: transparent;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body id="search">
    <div style="width:auto; height:60px;background: linear-gradient(to bottom, lightgray,white);position:fixed;top:0;right:0;left:0;opacity:90%;">
    <div class="container">
        <div class="row">
           <div class="col-md-2" style="position:fixed; top:3px; left:30px;"><a style="color:rgb(252, 46, 146); font-weight:800;font-size:30px;">AllChefs</a></div>
           <div calss="col-md" >
           <div class="dropdown" >
            <button class="btn btn-primary dropdown-toggle" type="button" style="position:fixed;right:180px;top:3px;background-color:transparent;border:0px;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('images/user.png') }}" style="width:40px;height: 35px;" alt="User">
            </button>
            
            <!-- Dropdown menu -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width:auto;">
            <a class="dropdown-item" href="/">All Stories</a>
                <a class="dropdown-item" href="/mystories">My Stories</a>
                <a class="dropdown-item" href="/favorites">Favorites</a>
                <a class="dropdown-item" href="/logout">Log out</a>
            </div>
        </div>
          </div>
           <div class="col-md" style="width:130px;padding:0px; position:fixed; top:3px; right:45px;text-align:right;"><a href="/cookstory" target="_blank"><button type="button" class="btn btn-lg" style="background-color:rgb(252, 46, 146);color:white">Cook Story</button></a></div>
        </div>
     </div>
    </div>
     <div class="container" style="margin-top:60px">
        <form id="myForm" action="/search" method="post">
          @csrf
            <div class="col-md " style="text-align:center;"><input name="filter"type="text" id="myInput" style="width:60%;border:1.5px solid rgb(174, 172, 174);border-radius: 5px;" placeholder="Search by story, genre"></div>
            <input type="submit" style="display: none;">
          </form>
     </div>
     <div class="container" style="border-top:1.5px solid rgb(252, 46, 146);width:80%; margin-top: 10px;"></div>
        <div class="container" id='genres' style="width: 60%; margin-top:10px; text-align:center;">
            <a href="/sort"><button type="button" class="btn btn-block">Popular</button></a>&nbsp;
            <a href="/"><button type="button" class="btn btn-block">All</button></a>
        </div>
        <a href="#search"><i class="fa" style="position:fixed;bottom:50px;right:30px;font-size:40px;color:gray;background-color:aliceblue;border-radius:5px;padding:5px; ">&#xf002;</i></a>
        <div class="container" id="stories" style="width:80%;">
              @php
                $count = 1;
              @endphp
              @foreach ($stories as $story)     
              <div class="container" style="border-bottom: 1px solid black; text-align:left;margin-top:30px;">
              <div class="row"><div class="col-md-10" style="text-align:left;"><h4>{{rtrim($story->title,".")}}</h4></div>
              
              <div class="col-sm"><div class="row">
              @if (isset($favorite[$count]) && $favorite[$count]==1)
              <button type="button" class="btn btn-sm" style="background-color:transparent;width:50px;padding:3px;border:0px;"><a  href="{{url('/togglefavorites')}}/{{$story->story_id}}" style="font-size:25px; color:orange;text-decoration:none;">&#9829;</a></button>
              @else
              <button type="button" class="btn btn-sm" style="background-color:transparent;width:50px; padding:3px;border:0px;"><a  href="{{url('/togglefavorites')}}/{{$story->story_id}}"style="font-size:25px; color:orange;text-decoration:none;">&#9825;</a></button>
              @endif
      <button type="button" class="btn btn-lg" style="width:80px;background-color:rgb(34,147,240); font-size:15px;"><a href="{{url('/read')}}/{{$story->story_id}}" style=" color:white;text-decoration:none;">Read</a></button>
              </div></div>
              <p><em style="color:#6c4d5e;">By {{$author[$count-1]}}</em></p>
              <p class="col-md-10">{{substr($story->content,0,150)}}   .  .  .  .</p>
              <div class="row">
                <div class="col-md" style="color:orange;">Genre: {{$story->genre}}</div>
                <div class="col-md"style="text-align:right;">{{round(strlen($story->content)/100)}}min read</div>
                <div class="col-md"style="text-align:right;"> <span style="font-size:120%;color:orange;">&starf;</span>{{$story->avg_rating}} &nbsp; ({{$story->num_rating}} ratings)</div>
              @php
                  $count++;
              @endphp  
              </div>
              </div></div>
              @endforeach

            </div>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>