<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class Slack extends Notification
{
    use Queueable;

    protected $content;
    protected $channel;
    protected $name;
    protected $icon;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->channel = env('SLACK_CHANNEL');
        $this->name = env('SLACK_NAME');
        $this->icon = env('SLACK_ICON');
        $this->content = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

     /**
     * @param $notifiable
     * @return $this
     */
    public function toSlack($notifiable)
    {
        $content = $this->content;
        return (new SlackMessage)
            ->from($this->name)
            ->image($this->icon)
            ->to($this->channel)
            ->success()
            ->attachment(function ($attachment) use ($content) {
                $attachment->title("【キャリアアドバイザー.com】新規会員登録がありました", $content['url'])
                    ->fields([
                        'ユーザー名' => $content['name'],
                        '紹介者' => $content['introduce'] ?  $content['introduce'] : 'なし',
                        'メールアドレス' => $content['email'],
                        '日時' => \Carbon\Carbon::now()->toDateTimeString(),
                        '登録方法' => $content['client'] ? $content['client'] : 'フォーム',
                        'Twitter_id' => $content['twitter_id'] ? "https://twitter.com/intent/user?user_id=".$content['twitter_id'] : ""
                    ]);
            });
    }
}
