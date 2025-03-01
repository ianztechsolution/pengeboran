<?php

namespace App\Repositories;

use App\Models\InvoiceDetail;

class InvoiceDetailRepository extends BaseRepository
{
    public function __construct(InvoiceDetail $invoice_detail)
    {
        parent::__construct($invoice_detail);
    }
}
