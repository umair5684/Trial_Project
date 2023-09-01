<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();
            

        return view('user.dashboard',compact('notifications'));

    }
    public function changeStatus($id){
        $notification = Notification::find($id);
    
        if ($notification) {
            $notification->status = 'Read';
            $notification->save();
        }
    
        return redirect('user');
    }
    
}
