<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class NewMenuNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $menu;

    public function __construct($menu)
    {
        $this->menu = $menu;
    }

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Nouveau Menu')
            ->body('Un nouveau menu a été ajouté : ' . $this->menu->nom)
            ->action('Voir', 'view_menu')
            ->data(['id' => $this->menu->id]);
    }
}
