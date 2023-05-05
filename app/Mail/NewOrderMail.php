<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,Order $order)
    {
        //
        $this->name = $name;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('طلب جديد من الايميل','ميديا بيرد');
        $this->from('mediabird@gmail.com');
        return $this->view('mails.neworder',[
            'name' => $this->name,
            'order'=> $this->order,
        ]);
    }
}
