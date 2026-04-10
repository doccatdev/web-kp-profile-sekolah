<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Illuminate\Support\Facades\Gate; // Tambahkan ini agar lebih aman

class CommentResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Comment::class;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
            'send_notification_comment',
            'reply_comment',
        ];
    }

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Komentar Berita';
    protected static ?string $modelLabel = 'Komentar Berita';
    protected static ?string $pluralModelLabel = 'Komentar Berita';
    protected static ?string $navigationGroup = 'Berita & Pengumuman';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('news_id')->label('ID Berita')->required()->numeric(),
                Forms\Components\TextInput::make('user_id')->label('ID User Admin')->numeric()->default(null),
                Forms\Components\TextInput::make('parent_id')->numeric()->default(null),
                Forms\Components\TextInput::make('guest_name')->label('Nama Pengunjung')->maxLength(255),
                Forms\Components\TextInput::make('guest_mail')->label('Email Pengunjung')->maxLength(255),
                Forms\Components\Textarea::make('body')->label('Isi Komentar')->columnSpanFull(),
                Forms\Components\Toggle::make('is_approved')->label('Setujui Komentar Ini?')->required(),
            ]);
    }

    public static function getReplyForm(): array
    {
        return [
            Forms\Components\Textarea::make('body')
                ->label('Isi Balasan')
                ->required()
                ->columnSpanFull(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('news.news_title')->sortable()->label('Judul Berita'),
                Tables\Columns\TextColumn::make('user.name')->sortable()->label('Nama Akun Admin'),
                Tables\Columns\TextColumn::make('parent.body')->limit(10),
                Tables\Columns\TextColumn::make('guest_name')->searchable()->label('Nama Pengunjung'),
                Tables\Columns\TextColumn::make('guest_mail')->searchable()->label('Email Pengunjung'),
                Tables\Columns\IconColumn::make('is_approved')->boolean()->label('Komentar Disetujui?'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->since()->sortable()->label('Dikirim'),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('balas_komentar')
                    ->label('Balas Komentar')
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->color('success')
                    // Tombol hanya muncul jika punya permission
                    ->visible(fn() => Gate::allows('reply_comment_comment'))
                    ->form(static::getReplyForm())
                    ->action(function (Comment $record, array $data, $action): void {
                        // Pakai Gate::denies (Artinya: Jika Gerbang Melarang/Tidak Mengizinkan)
                        if (Gate::denies('reply_comment_comment')) {
                            $action->halt('Anda tidak dapat membalas komentar karena tidak punya hak aksesnya.');
                            return;
                        }

                        Comment::create([
                            'news_id' => $record->news_id,
                            'parent_id' => $record->id,
                            'user_id' => auth()->id(),
                            'body' => $data['body'],
                            'is_approved' => true,
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Balasan berhasil dikirim')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
