<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationStoreRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\CustomDashboardNotification;
use App\Notifications\CustomNotification;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function create()
    {
        $users = User::role('User')->get();

        return view('admin.create', compact('users'));
    }
    public function store(NotificationStoreRequest $request)
    {
        $input = $request->all();


        $user = User::find($request->user_id);


        $notificationData = [
            'user_id' => $request->user_id,
            'subject' => $request->subject,
            'body' => $request->body,
            'notification_type' => $request->notification_type,
            'status' => 'Unread',
        ];

        $singleAttribute = $request->body;




        if ($request->notification_type === 'email') {
            $user->notify(new CustomNotification($notificationData));
        } else {
            $notification = new Notification([
                'user_id' => $user->id,
                'subject' => $notificationData['subject'],
                'body' => $notificationData['body'],
                'status' => 'Unread',
                'notification_type' => $notificationData['notification_type']
            ]);
            $notification->save();

            $user->notify(new CustomDashboardNotification($singleAttribute));
        }

        return redirect('admin')->with('status', 'Notification Sent');
    }
    public function createEmail()
    {
        $users = User::role('User')->get();
        return view('admin.email',compact('users'));
    }
    public function storeEmail(Request $request)
    {
        


        $user = User::find($request->user_id);


        $notificationData = [
            'user_id' => $request->user_id,
            'subject' => $request->subject,
            'body' => $request->body,
            
        ];    

            $user->notify(new CustomNotification($notificationData));
        

        return redirect('admin')->with('status', 'Email Sent');
    }
}
