<?php

namespace App\Jobs;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;


class WriteMessageFromChatIntoDB implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $message;
    public int $dialog_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($msg_data)
    {
        $this->message = $msg_data['body'];
        $this->dialog_id = $msg_data['dialog_id'];
    }

    public function uniqueId()
    {
        return 'messages';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = new Message();

        $message->dialog_id = $this->dialog_id;
        $message->message = $this->message;
        $message->save();
    }
}
