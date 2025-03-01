<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Project;
use App\Models\ServiceType;
use App\Http\Controllers\Controller;
use App\Repositories\InvoiceRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProjectRepository;
use App\Http\Requests\Payment\PaymentStoreRequest;
use App\Http\Requests\Payment\PaymentUpdateRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $projectRepository;
    protected $invoiceRepository;
    protected $paymentRepository;


    public function __construct(
        InvoiceRepository $invoiceRepository,
        ProjectRepository $projectRepository,
        PaymentRepository $paymentRepository
    )
    {
        $this->projectRepository     = $projectRepository;
        $this->invoiceRepository     = $invoiceRepository;
        $this->paymentRepository     = $paymentRepository;
    }
    public function index()
    {
        $data['title']     = 'Daftar Pembayaran';
        return view('page.dashboard.payments.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']      = 'Buat Pembayaran';
        $data['projects']   = Project::where('status', 'WAITING_PAYMENT')->get();
        $data['project']    = Project::find(request()->get('project_id'));
        $data['invoice']    = $data['project']->invoices()->where('status', 'WAITING_PAYMENT')->first();

        return view('page.dashboard.payments.render.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentStoreRequest $request)
    {

        $data = $request->validated();
        $payment = $this->paymentRepository->store($data);
        return redirect()->route('dashboard.transaction.projects.edit', $payment->project_id)->with('success', 'Pembayaran berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $data['title']      = 'Lihat Pembayaran';
        $data['projects']   = Project::where('status', 'WAITING_PAYMENT')->get();
        $data['project']    = Project::find($payment->project_id);
        $data['invoice']    = $data['project']->invoices()->where('status', 'WAITING_PAYMENT')->first();
        $data['payment']    = $payment;

        return view('page.dashboard.payments.render.detail.wrapper', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $data['title']      = 'Ubah Pembayaran';
        $data['projects']   = Project::where('status', 'WAITING_PAYMENT')->get();
        $data['project']    = Project::find($payment->project_id);
        $data['invoice']    = $data['project']->invoices()->where('status', 'WAITING_PAYMENT')->first();
        $data['payment']    = $payment;
        
        return view('page.dashboard.payments.render.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentUpdateRequest $request, Payment $payment)
    {
        $data = $request->validated();

        $this->paymentRepository->update($payment->id, $data);
        return redirect()->route('dashboard.transaction.payments.edit', $payment->id)->with('success', 'Pembayaran berhasil diperbaharui');
    }

    public function destroy(Payment $payment)
    {
        $this->paymentRepository->destroy($payment->id);
        return redirect()->route('dashboard.transaction.payments.edit', $payment->project_id)->with('success', 'Pembayaran berhasil dihapus');
    }
}