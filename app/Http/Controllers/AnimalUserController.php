<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// use Faker\Factory as Faker;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class AnimalUserController extends Controller
{


        // use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'shyt';
        return view('auth/loginChat');
    }

    /**
     * Show the form for creating a new messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              $mm = Message::with('user')->get();
             // dd($mm);
              return $mm;
    }

     /**
      * create Annoymous User instantly  
      * get It Name And Avatar
      *
      */
    function getRandomWord($len = 10) {
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    public function storeUser(Request $request)
    {
        //todo 1 . prevent if same name pop out <-- create another function
        // $faker = Faker::create();
        // $faker = Faker\Factory::create();

        $word = $this->getRandomWord();
        $word2 = $this->getRandomWord();
        
        if(Auth::user() == false)
        {
            $user = User::create([
                    'name' => $request->name,
                    'avatar' => $request->avatar,
                    'email' => $word+"@"+$word2+"+.com",
                    'password'=> bcrypt('password')
            ]);

            if(Auth::attempt(['name' => $request->name, 'password' => 'password'])) {
                $userAuth = Auth::user();
                return response()->json($userAuth);
                
            }
            else{
                $user->forceDelete();
                return response()->json('forbidden',403);
                //later ,just Auth::attempt back lolol
            }
        }
        // if truee, just keep using it
        return response()->json(['respond(Auth:user == true )'=>Auth::user()],403);

    }



    public function messageChannel()
    {
            //
    }

    /**
     * Store a newly created messages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'avatar' => 'required',
        //     'password' => 'required|min:6|confirmed',
        // ];

        // $this->validate($request,$rules);
        // $data = $request->all();
        // $data['password'] = bcrypt("password");
        // $data['verified'] = User::UNVERIFIED_USER;
        // $data['verification_token'] = User::generateVerificationCode();
        // $data['admin'] = User::REGULAR_USER;

        // return response()->json(['data' => $user],200);

        // $user = User::create($data);
              // $message = $user->messages()->create([
        // 'message' => $request->input('message')
      // ]);
    }

    /**
     * Display the fetchMessages
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // public function fetchMessages()
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //checking user whether login or not
    public function xxx()
    {
        if (Auth::check()) {
        // The user is logged in...
        return response()->json([Auth::user()],200);
        }
        else
        {   return response()->json(["NOLOGIN"],403); }
        // return "shht";
      // return [$x->all(),$x->all()];
        }
}
