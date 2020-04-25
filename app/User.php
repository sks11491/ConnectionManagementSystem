<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Auth;

use App\FriendUser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the Hobby that was chosen by user.
     */
    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class, 'user_hobbies');
    }

    /**
     * Get list of Hobbies with comma seperated values
     */
    public function hobbyList() {
        $hobbyArray = [];
        foreach ($this->hobbies as $userHobby) {
            $hobbyArray[] = $userHobby->name;
        }
        return implode(", ", $hobbyArray);
    }
    
    public function getFrienshipStatus() {
        $friend = FriendUser::where('user_id', Auth::user()->id)->where('friend_id', $this->id)->first();
        $friendReverse = FriendUser::where('user_id', $this->id)->where('friend_id', Auth::user()->id)->first();
        if ($friend) {
            return $friend->status;
        } elseif($friendReverse) {
            switch($friendReverse->status) {
                case 0:
                    return 4; // request recieved
                    break;
                case 1:
                    return 1; // Your Friend
                    break;
                case 2:
                    return 2; // You are blocked
                    break;
                default:
                    return -1;
            }
        } else {
            return -1;
        }
    }
}
