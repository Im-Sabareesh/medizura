<?php

namespace App\Http\Controllers;

use App\Events\Appointment;
use App\Events\MessageSent;
use App\Events\SendMessage;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /***
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'actionType' => 'required',
            'broadcastAs' => 'required',
            'channelName' => 'required',
            'message' => 'required',
        ]);

        // Broadcast the message
        broadcast(new SendMessage($request->channelName, $request->broadcastAs, $request->actionType, $request->message));

        return response()->json(true);
    }
}
