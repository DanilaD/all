<?php

namespace App\Observers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Send a welcome email to the new user
        Mail::to($user->email)->send(new WelcomeEmail($user));

        $user->name = $this->getName($user);
        $user->save();
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        // Perform actions after user update (e.g., log the update)
//        if ($user->isDirty('fname') || $user->isDirty('lname')) {
//            $user->name = $this->getName($user);
//            $user->save();
//        }
    }

    private function getName($user)
    {
        return implode(' ', [$user->fname, $user->lname]);
    }
}
