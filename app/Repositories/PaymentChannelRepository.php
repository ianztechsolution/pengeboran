<?php

namespace App\Repositories;

use App\Models\PaymentChannel;

class PaymentChannelRepository extends BaseRepository
{
    public function __construct(PaymentChannel $payment_channel)
    {
        parent::__construct($payment_channel);
    }
}
