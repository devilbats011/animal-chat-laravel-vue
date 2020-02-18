<?php

namespace App\Http\Controllers;


use App\Events\MessageSent;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChatsController extends Controller
{

	public function __construct()
	{
	  $this->middleware('auth');
	}

	/**
	 * Show chats
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	  return view('chat');
	}

	/**
	 * Fetch all messages
	 *
	 * @return Message
	 */
	public function fetchMessages($id)
	{
	 $ft = Message::with('user')->where('channel_id','=',$id)->get();
	  // dd($ft);
	  return $ft;
	}

	/**
	 * Persist message to database
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function sendMessage(Request $request)
	{
	  $user = Auth::user();

	  $message = $user->messages()->create([
	    'message' => $request->input('message'),
	    'channel_id' => $request->input('channel_id')
	  ]);

	  broadcast(new MessageSent($user, $message))->toOthers();

	  // return [$request->input('message'), $request->input('channel_id')];
	  //return $request->all();
	  return [' Message RECEIVED! '=>':)'];

	}
}
