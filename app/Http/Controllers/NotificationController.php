<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Models\User;
use App\Notifications\ActionsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $queries = ['search', 'page'];

        $notification = $request->user()->notifications()->paginate(50);

        foreach ($notification as $keyFirst => $notify) {
            if (Arr::exists($notify->data, 'models')) {
                foreach ($notify->data['models'] as $key => $id) {
                    $model = "\App\Models\\$key";
                    $models[$key] = $model::find((int) $id); // find() and findOrFail() need an integer to return one element.
                }
                $notify->models = $models;
            }
        }

        //  $notification->addModels(50);

        // $notification->paginate(50);

        return Inertia::render('Notification/Index', [
            'notification' => $notification,
            'filters' => $request->all($queries),
        ]);
    }

    public static function top(User $user)
    {

        $notifications = $user->notifications->addModels()->take(5);

        return $notifications;
    }
    public static function add(User $user, $data)
    {

        $users = User::where("id", "!=", $user->id)->get();

        Notification::send($users, new ActionsNotification($data));
        // Notification::send($userSchema, new ActionsNotification($data));
        // $user->notify( );

        event(new NotificationEvent('Notification'));
        // $notifications = $user->notifications->addModels();

        return back();
    }
    public static function show(Request $request)
    {
        $user = $request->user();

        $notification = $user->notifications()->find($request->id);
        if (empty($notification->read_at)) {
            $notification->markAsRead();
        }

        if (!empty($notification->data['link'])) {
            return redirect($notification->data['link']);
        } else {
            return redirect("/dashboard");
        }
        return redirect("/dashboard");

    }

    public function sendActionNotification()
    {
        $userSchema = User::first();

        $data = [
            'type' => 'action',
            'body' => 'Usted esta recibiendo su primer notificación.',
            'link' => '/dashboard',
            'item_id' => '',
            'user_id' => 1,
            'action_id' => now()->getPreciseTimestamp(3),
        ];

        // Notification::send($userSchema, new ActionsNotification($data));
        $userSchema->notify(new ActionsNotification($data));

        $notifications = $userSchema->notifications->addModels();

        dd($notifications);
    }
}
