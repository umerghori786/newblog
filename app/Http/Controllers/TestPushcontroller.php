<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TestPushNotification;

class TestPushcontroller extends Controller
{
    public function notificationSent(Request $request)
    {   

        //now find the user to whom we send push notificaion
        $user = User::findOrFail(11);
        $user->notify(new TestPushNotification($user->id , 'someone comment on your post'));
        return view('pusher.pushNotification');
    }
}
