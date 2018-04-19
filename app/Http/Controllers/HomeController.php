<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Links;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all links
        $links = Links::where('active', '=', 1)
            ->where('user_id', '=', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home',compact('links'));
    }

    public function new_link(Request $request){

        $link = new \stdClass();
        if ($request->isMethod('post')) {

            $name = $request->input('name');
            $original_link = $request->input('original_link');

            $link_table = new Links();
            $link_table->name = $name;
            $link_table->original_link = $original_link;
            $link_table->redirect_link = $this->createRandomLink();
            $link_table->user_id = Auth::id();
            $link_table->save();
            return view('view')->with('link',$link_table);
        }

        return view('new');
    }

    public function view_link(Request $request, $id){
        $link = Links::where('id', '=', $id)->where('user_id','=',Auth::id())->first();
        return view('view')->with('link',$link);
    }

    public function delete_link(Request $request, $id){
        $link = Links::where('id', '=', $id)->where('user_id','=',Auth::id())->first();
        $link->delete();
        return redirect('home');
    }

    public function resolve_link(Request $request, $link){
        $link = Links::where('redirect_link', '=', $link)->first();
        if($link){
            header('Location: ' . filter_var($link->original_link, FILTER_SANITIZE_URL));
            die();
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    private function createRandomLink(){
        $success = false;
        do{
            $random = str_random(10);
            $link = Links::where('redirect_link', '=', $random)->first();
            if($link)
                $success = false;
            else
                $success = true;

        }while(!$success);

        return $random;
    }
}
