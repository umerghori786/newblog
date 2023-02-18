<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class OrderShippedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected  $first_love;
    protected  $second_love;

    public function __construct(User $user)
    {
        $this->first_love = $user;
        $this->second_love = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->view('mail')->with([
                        'orderName' => $this->first_love,
                        'orderPrice' => $this->second_love,
                    ]);
    }
}
