<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use Meddelivery\Models\User;
use Meddelivery\Models\Status;
use Auth;

class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        $this->validate($request,[
            'status' => 'required|max:1000',
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
        ]);

        return redirect()
            ->back()
            ->with('info','Post enviado com sucesso!');
    }
    public function getStatus()
    {
        if (Auth::check())
        {
            $statuses = Status::notReply()->where(function($query) {
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id')
                );
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

            return view('timeline.index')
                ->with('statuses', $statuses);
        }
        $user = User::all();
        return view('home',['users' => $user]);
    } 

    public function getSend()
    {
        return view ('timeline.sended');
    }
    

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:1000',
        ], [
            'required' => 'Preencha o campo de resposta primeiro.'
        ]);

        $status = Status::notReply()->find($statusId);

        if (!$status)
        {
            return redirect()->route('home');
        }

        if (!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id)
        {
            return redirect()->route('home');
        }

        $reply = Status::create([
            'body' => $request->input("reply-{$statusId}"),
        ])->user()->associate(Auth::user());

        $status->replies()->save($reply); 

        return redirect()->back();
    }

    public function getLike($statusId)
    {
        $status = Status::find($statusId);

        if (!$status)
        {
            return redirect()->route('home');
        }

        if (!Auth::user()->isFriendsWith($status->user))
        {
            return redirect()->route('timeline.index');
        }

        if(Auth::user()->hasLikedStatus($status))
        {
            return redirect()->back();
        }

        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }
}
