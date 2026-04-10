<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use App\Models\Comment; // Pastikan Model di-import
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Gate;

class EditComment extends EditRecord
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),

            // Gunakan Actions\Action (untuk Header)
            Actions\Action::make('reply')
                ->label('Balas Komentar')
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('success')
                // Cek permission
                ->visible(fn () => Gate::allows('reply_comment_comment'))
                // Ganti schema jadi form
                ->form(CommentResource::getReplyForm())
                ->action(function (array $data): void {
                    // Pakai $this->record untuk mengambil data komentar yang sedang diedit
                    $comment = $this->record;

                    Comment::create([
                        'news_id' => $comment->news_id,
                        'parent_id' => $comment->id,
                        'user_id' => auth()->id(),
                        'body' => $data['body'],
                        'is_approved' => true,
                    ]);

                    \Filament\Notifications\Notification::make()
                        ->title('Balasan berhasil dikirim')
                        ->success()
                        ->send();
                }),
        ];
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
