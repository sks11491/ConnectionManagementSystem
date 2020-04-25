<?php

namespace App\Jobs;

use App\User;
use App\FriendUser;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogUserActions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $friendUser;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(FriendUser $friendUser)
    {
        $this->friendUser = $friendUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $createdBy = User::where('id', $this->friendUser->user_id)->first();
        $createdFor = User::where('id', $this->friendUser->friend_id)->first();
        $actionStr = "";
        switch($this->friendUser->status) {
            case 0:
                $actionStr = "Sent Request"; 
                break;
            case 1:
                $actionStr = "Accept request"; 
                $createdFor = User::where('id', $this->friendUser->user_id)->first();
                $createdBy = User::where('id', $this->friendUser->friend_id)->first();
                break;
            case 2:
                $actionStr = "Block request";
                break;
        }
        \UserActionLogHelper::addToLog($createdBy->name, $createdFor->name, $actionStr);
    }
}
