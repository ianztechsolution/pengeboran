<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceType;
use App\Http\Controllers\Controller;
use App\Repositories\ServiceTypeRepository;
use App\Http\Requests\ServiceType\ServiceTypeStoreRequest;
use App\Http\Requests\ServiceType\ServiceTypeUpdateRequest;

class ServiceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $serviceTypeRepository;

    public function __construct(
        ServiceTypeRepository $serviceTypeRepository
    )
    {
        $this->serviceTypeRepository            = $serviceTypeRepository;
    }
    public function index()
    {
        $data['title']                  = 'Jenis Layanan';
        $data['service_types']          = $this->serviceTypeRepository->all(['status' => request()->get('status')]);
        return view('page.dashboard.service_types.wrapper', $data);
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
    public function store(ServiceTypeStoreRequest $request)
    {
        $data = $request->validated();

        $this->serviceTypeRepository->store($data);
        return redirect()->route('dashboard.master-data.service-types.index')->with('success', 'Jenis Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceType $service_type)
    {
        $data['title']          = 'Detail Jenis Layanan';
        $data['service_type']   = $service_type;
        return view('page.dashboard.service_types.render.detail.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceType $service_type)
    {
        $data['title']          = 'Ubah Jenis Layanan';
        $data['service_type']   = $service_type;
        return view('page.dashboard.service_types.render.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceTypeUpdateRequest $request, ServiceType $service_type)
    {
        $data = $request->validated();

        $this->serviceTypeRepository->update($service_type->id, $data);
        return redirect()->route('dashboard.master-data.service-types.edit', $service_type->id)->with('success', 'Jenis Layanan berhasil diperbaharui');
    }

    public function destroy(ServiceType $service_type)
    {
        $this->serviceTypeRepository->destroy($service_type->id);
        return redirect()->route('dashboard.master-data.service-types.index')->with('success', 'Jenis Layanan berhasil dihapus');
    }
}