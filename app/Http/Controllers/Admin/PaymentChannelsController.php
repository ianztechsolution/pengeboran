<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentChannel;
use App\Http\Controllers\Controller;
use App\Repositories\PaymentChannelRepository;
use App\Http\Requests\PaymentChannel\PaymentChannelStoreRequest;
use App\Http\Requests\PaymentChannel\PaymentChannelUpdateRequest;

class PaymentChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $paymentChannelRepository;

    public function __construct(
        PaymentChannelRepository $paymentChannelRepository
    )
    {
        $this->paymentChannelRepository            = $paymentChannelRepository;
    }
    public function index()
    {
        $data['title']                  = 'Metode Pembayaran';
        $data['payment_channels']          = $this->paymentChannelRepository->all(['status' => request()->get('status')]);
        return view('page.dashboard.payment_channels.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentChannelStoreRequest $request)
    {
        $data = $request->validated();

        $this->paymentChannelRepository->store($data);
        return redirect()->route('dashboard.master-data.payment-channels.index')->with('success', 'Metode pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentChannel $payment_channel)
    {
        $data['title']              = 'Detail Metode Pembayaran';
        $data['payment_channel']    = $payment_channel;
        return view('page.dashboard.payment_channels.render.detail.wrapper', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentChannel $payment_channel)
    {
        $data['title']          = 'Ubah Metode Pembayaran';
        $data['payment_channel']   = $payment_channel;
        return view('page.dashboard.payment_channels.render.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentChannelUpdateRequest $request, PaymentChannel $payment_channel)
    {
        $data = $request->validated();

        $this->paymentChannelRepository->update($payment_channel->id, $data);
        return redirect()->route('dashboard.master-data.payment-channels.edit', $payment_channel->id)->with('success', 'Metode Pembayaran berhasil diperbaharui');
    }

    public function destroy(PaymentChannel $payment_channel)
    {
        $this->paymentChannelRepository->destroy($payment_channel->id);
        return redirect()->route('dashboard.master-data.payment-channels.index')->with('success', 'Metode Pembayaran berhasil dihapus');
    }
}