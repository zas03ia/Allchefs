<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Rating;
use Illuminate\Support\Facades\Hash;


class myController extends Controller
{
    public function serve(request $req)
    {
        $req->validate(
            [
              "title"=>"required|max:150|unique:story",
              "genre"=>"required",
              "content"=>"required|max:7500"
            ],
            [
            'title.unique' => 'This title already exists.',
            ]
        );
        $author_id=auth()->user()->id;
        $story = new Story;
        $story->title = $req->input("title");
        $story->genre = $req->input("genre");
        $story->content = $req->input("content");
        $story->user_id = $author_id;
        $story->save();
        return view("success");
    }


    public function delete(Request $req)
    {   
        $user_id=auth()->user()->id;
        $story_id=$req->input("del_id");
        Favorite::where("user_id","=",$user_id)->where("story_id","=",$story_id)->delete(); 
        Rating::where("user_id","=",$user_id)->where("story_id","=",$story_id)->delete(); 
        Story::where("user_id","=",$user_id)->where("story_id","=",$story_id)->delete(); 
        return redirect("/mystories");  
    }


    public function index() {
        $u_id=auth()->user()->id;
        $fav=Favorite::where('user_id', '=', $u_id)->pluck('story_id')->toArray();
        $favorite=[];
        $author=[];
        $stories = Story::inRandomOrder()->get();
        $i=1;
        foreach ($stories as $s){
            if(in_array(intval($s->story_id), $fav)){
                $favorite[$i]=1;
            }
            else{
                $favorite[$i]=0;
            }
            $name=User::where('id', '=', $s->user_id)->pluck('name')->toArray();
            array_push($author,$name[0]);
            $i++;
        }
        $data=compact("stories","favorite","author");
        return view('index')->with($data);
    }


    public function sort() {
        $u_id=auth()->user()->id;
        $fav=Favorite::where('user_id', '=', $u_id)->pluck('story_id')->toArray();
        $favorite=[];
        $author=[];
        $stories = Story::orderBy('avg_rating', 'desc')->limit(20)->get();
        $i=1;
        foreach ($stories as $s){
            if(in_array(intval($s->story_id), $fav)){
                $favorite[$i]=1;
            }
            else{
                $favorite[$i]=0;
            }
            $name=User::where('id', '=', $s->user_id)->pluck('name')->toArray();
            array_push($author,$name[0]);
            $i++;
        }
        $data=compact("stories","favorite","author");
        return view('index')->with($data);
    }


    public function search(Request $req) {
        $u_id=auth()->user()->id;
        $fav=Favorite::where('user_id', '=', $u_id)->pluck('story_id')->toArray();
        $favorite=[];
        $author=[];
        $searchTerm = strtolower($req->input('filter')); 
        $stories = Story::whereRaw('LOWER(title) LIKE ?', ["%{$searchTerm}%"])->orWhereRaw('LOWER(genre) LIKE ?', ["%{$searchTerm}%"])
        ->get();
        $i=1;
        foreach ($stories as $s){
            if(in_array(intval($s->story_id), $fav)){
                $favorite[$i]=1;
            }
            else{
                $favorite[$i]=0;
            }
            $name=User::where('id', '=', $s->user_id)->pluck('name')->toArray();
            array_push($author,$name[0]);
            $i++;
        }
        $data=compact("stories","favorite","author");
        return view('index')->with($data);
    }
    


    public function cookstory() {
        return view('cookstory');
    }
    
    
    public function mystories() {
        $id=auth()->user()->id;
        $stories = Story::where('user_id', '=', $id)->get();
        $data=compact("stories");
        return view('mystory')->with($data);
    }
    

    public function favorites() {
        $id=auth()->user()->id;
        $author=[];
        $ids = Favorite::where('user_id', '=', $id)->pluck('story_id')->toArray();
        $stories = Story::whereIn('story_id', $ids)->get();
        foreach ($stories as $s){
            $name=User::where('id', '=', $s->user_id)->pluck('name')->toArray();
            array_push($author,$name[0]);
        }
        $data=compact("stories", "author");
        return view('favorites')->with($data);
    }


    public function togglefavorites($storyId) {
        $u_id=auth()->user()->id;
        $s_id=$storyId; 
        $fav=Favorite::where('user_id', '=', $u_id)->where("story_id","=",$s_id)->pluck('story_id')->toArray();
        if (count($fav)==0){
            $f = new Favorite;
            $f->user_id=$u_id;
            $f->story_id=$s_id;
            $f->save();
            
        }
        else{
            Favorite::where('user_id', '=', $u_id)->where("story_id","=",$s_id)->delete();
        }
        return redirect()->back();
    }


    public function read($storyId) {
        $u_id=auth()->user()->id;
        $s_id=$storyId;
        $fav=Favorite::where('user_id', '=', $u_id)->pluck('story_id')->toArray();
        $story = Story::find($s_id);
        if(in_array(intval($story->story_id), $fav)){
            $favorite=1;
        }
        else{
            $favorite=0;
        }
        $rate=null;
        $you=null;
        $author=User::where('id', '=', $story->user_id)->pluck('name')->toArray();
        $rating= Rating::where("user_id","=",$u_id)->where("story_id","=",$s_id)->pluck("ratings")->toArray();
        if(count($rating)!=0){
            $rate="d " . $rating[0];
            $you="You ";
        }
        session()->put("story_id", $s_id);
        $data=compact("story","favorite","author","rate","you");
        return view('read')->with($data);
    }
    


    public function edit($storyId) {
        $story_id=$storyId;
        $edit=Story::find($story_id);
        $data=compact("edit");
        return view('editstory')->with($data);
    }


    public function editstory(request $req)
    {
        $req->validate(
            [
              "title"=>"required|max:150|unique:story",
              "genre"=>"required",
              "content"=>"required|max:7500"
            ],
            [
            'title.unique' => 'This title already exists.',
            ]
        );
        $story_id=$req->input("story_id");
        $story = Story::find($story_id);
        $story->title = $req->input("title");
        $story->genre = $req->input("genre");
        $story->content = $req->input("content");
        $story->save();
        return view("success");
    }


    public function rate($val) {
        $u_id=auth()->user()->id;
        $s_id=session()->get("story_id");
        $rating= Rating::where("user_id","=",$u_id)->where("story_id","=",$s_id)->pluck("ratings")->toArray();
        $story=Story::find($s_id);
        $avg=$story->avg_rating;
        $num=$story->num_rating;
        if(count($rating)!=0){
            $story->avg_rating=($avg*$num+$val-$rating[0])/$num;
            $rate=Rating::where("user_id","=",$u_id)->where("story_id","=",$s_id)->first();
            $rate->ratings=$val;
            $rate->save();
        }
        else{
            $story->avg_rating=($avg*$num+$val)/($num+1);
            $story->num_rating=$num+1;
            $rate=new Rating;
            $rate->user_id=$u_id;
            $rate->story_id=$s_id;
            $rate->ratings=$val;
            $rate->save();
        }
        $story->save();
        
        return redirect()->back();
    }


    public function login(Request $req) {
        validator($req->all(),[
            "email"=>["required","email"],
            "password"=>["required"]
        ])->validate();
        if (auth()->attempt($req->only(["email","password"]))){
            return redirect("/");
        }
        print_r($req->all());
        return redirect("/login")->withErrors(["email"=>"Invalid Credentials!"]);
    }
            
            


    public function logout() {
        auth()->logout();
        return redirect("/home");
    }


    public function signup(Request $req) {
        $req->validate(
            [
              "email"=>"required|email|unique:users",
              "name"=>"required|unique:users",
              "password"=>"required|max:7500"
            ],
            [
            'email.unique' => 'An account already exists with this email.',
            'username.unique' => 'An account already exists with this username.'
            ]
            );
            
            $user = new User;
            $user->name = $req->input("name");
            $user->email = $req->input("email");
            $user->password =Hash::make($req->input("password"));
            $user->save();
            return redirect("/home")->with('message', 'Please log in!');
    }



    public function home(){
        return view("home");
    }

    public function tologin(){
        return view("login");
    }

    public function tosignup(){
        return view("signup");
    }
}
