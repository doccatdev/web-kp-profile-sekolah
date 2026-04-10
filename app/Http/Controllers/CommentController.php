<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Filament\Resources\CommentResource;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class CommentController extends Controller
{
     public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        $comment = Comment::create($data + [
            'user_id'     => auth()->id(),
            'guest_name'  => auth()->check() ? null : $data['guest_name'],
            'guest_mail' => auth()->check() ? null : $data['guest_mail'],
        ]);

        $users = User::permission('send_notification_comment_comment')->get();
        Notification::make()
                ->title("Ada Komentar Baru di Berita!")
                ->actions([
                    Action::make('view')
                        ->url(CommentResource::getUrl('edit',['record'=>$comment]))
                ])
                ->sendToDatabase($users);
                ;

        return back()->with('success', 'Komentar Anda berhasil terkirim');
}

}
