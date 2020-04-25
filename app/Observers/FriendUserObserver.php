<?php

namespace App\Observers;

use App\FriendUser;
use App\Jobs\LogUserActions;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;

class FriendUserObserver
{
    use DispatchesJobs;
    /**
     * Handle the friend user "created" event.
     *
     * @param  \App\FriendUser  $friendUser
     * @return void
     */
    public function created(FriendUser $friendUser)
    {
        $this->dispatch(new LogUserActions($friendUser));
    }

    /**
     * Handle the friend user "updated" event.
     *
     * @param  \App\FriendUser  $friendUser
     * @return void
     */
    public function updated(FriendUser $friendUser)
    {
        $job = (new LogUserActions($friendUser));
        $this->dispatch($job);
    }

    /**
     * Handle the friend user "deleted" event.
     *
     * @param  \App\FriendUser  $friendUser
     * @return void
     */
    public function deleted(FriendUser $friendUser)
    {
        //
    }

    /**
     * Handle the friend user "restored" event.
     *
     * @param  \App\FriendUser  $friendUser
     * @return void
     */
    public function restored(FriendUser $friendUser)
    {
        //
    }

    /**
     * Handle the friend user "force deleted" event.
     *
     * @param  \App\FriendUser  $friendUser
     * @return void
     */
    public function forceDeleted(FriendUser $friendUser)
    {
        //
    }
}
