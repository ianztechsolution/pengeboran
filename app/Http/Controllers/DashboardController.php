<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\InvoiceRepository;
use App\Repositories\ProjectRepository;

class DashboardController extends Controller
{
    protected $projectRepository;
    protected $invoiceRepository;


    public function __construct(
        ProjectRepository $projectRepository,
        InvoiceRepository $invoiceRepository
    )
    {
        $this->projectRepository            = $projectRepository;
        $this->invoiceRepository            = $invoiceRepository;

    }
    public function dashboard()
    {
        $data['title']      = 'Dashboard';
        $data['projects']   = $this->projectRepository->all();
        $data['invoices']   = $this->invoiceRepository->all();
        $data['customers']  = User::whereHas('roles', function($query) {
            $query->where('name', 'customer');
        })->get();
        $data['totalPayment'] = 0;
        
        foreach($data['invoices'] as $invoice)
        {
            $data['totalPayment'] = $data['totalPayment'] + $invoice->total_payment;
        }

        $data['projectWaitingApproval']   = $this->projectRepository->all(['status' => 'REQUEST_APPROVAL']);
        $data['projectSchedule']   = $this->projectRepository->all(['status' => 'SCHEDULED']);



        return view('page.dashboard.dashboard.wrapper', $data);
    }
}
