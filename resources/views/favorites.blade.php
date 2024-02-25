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
    </style>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
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
    <div class="col-md" style="position:fixed; top: 45px; left:45px;text-align:right;font-size: 20px;font-weight:700;color:orange;">My Favorites</div>
     
    
        <div class="container" id="stories" style="margin-top:80px;width:70%;">
        @php
            $count=0;
        @endphp
              @foreach ($stories as $story)   
              <div class="container" style="border-bottom: 1px solid black; text-align:left;margin-top:30px;">
              <div class="row"><div class="col-md-10" style="text-align:left;"><h4>{{rtrim($story->title,".")}}</h4></div>
              
              <div class="col-sm"><div class="row">
              <button type="button" class="btn btn-sm" style="background-color:transparent;width:50px;padding:3px;border:0px;"><a  href="{{url('/togglefavorites')}}/{{$story->story_id}}" style="font-size:25px; color:orange;text-decoration:none;">&#9829;</a></button>
              <button type="button" class="btn btn-lg" style="width:80px;background-color:rgb(34,147,240); font-size:15px;border:0px;"><a href="{{url('/read')}}/{{$story->story_id}}" style=" color:white;text-decoration:none;">Read</a></button>
        
              </div></div>
              <p><em style="color:#674652;">By {{$author[$count]}}</em></p>
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