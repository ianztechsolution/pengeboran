<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Repositories\InvoiceRepository;
use App\Http\Requests\Invoice\InvoiceStoreRequest;
use App\Http\Requests\Invoice\InvoiceUpdateRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $invoiceRepository;

    public function __construct(
        InvoiceRepository $invoiceRepository
    )
    {
        $this->invoiceRepository            = $invoiceRepository;
    }
    public function index()
    {
        $data['title']      = 'Tagihan';
        $data['invoices']   = $this->invoiceRepository->all(['status' => request()->get('status')]);
        return view('page.dashboard.invoices.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']      = 'Buat Tagihan';
        $data['projects']   = Project::where('status', 'WAITING_PAYMENT')->get();

        return view('page.dashboard.invoices.render.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceStoreRequest $request)
    {
        $data = $request->validated();

        $this->invoiceRepository->store($data);
        return redirect()->route('dashboard.transaction.invoices.index')->with('success', 'Tagihan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $data['title']     = 'Detail Tagihan';
        $data['invoice']   = $invoice;
        $data['projects']   = Project::where('status', 'WAITING_PAYMENT')->get();

        return view('page.dashboard.invoices.render.detail.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $data['title']     = 'Ubah Tagihan';
        $data['invoice']   = $invoice;
        $data['projects']   = Project::where('status', 'WAITING_PAYMENT')->get();

        return view('page.dashboard.invoices.render.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, Invoice $invoice)
    {
        $data = $request->validated();

        $this->invoiceRepository->update($invoice->id, $data);
        return redirect()->route('dashboard.transaction.invoices.edit', $invoice->id)->with('success', 'Tagihan berhasil diperbaharui');
    }

    public function destroy(Invoice $invoice)
    {
        $this->invoiceRepository->destroy($invoice->id);
        return redirect()->route('dashboard.transaction.invoices.index')->with('success', 'Tagihan berhasil dihapus');
    }

    public function getProjectData($projectId)
    {
        $project = Project::with('customer')->find($projectId);
        $totalPrice = 0;
        foreach ($project->services as $service) {
            if ($service->status == "SCHEDULED" && $service->service_type) {
                $totalPrice += $service->service_type->price;
            }
        }
        return response()->json([
            'customer' => $project->customer,
            'total_price' => $totalPrice,
        ]);
    }
}