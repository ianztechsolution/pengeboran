<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\PaymentChannelRepository;
use App\Repositories\ProjectServiceRepository;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Admin\Project\ProjectUpdateRequest;
use App\Models\ServiceType;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $projectRepository;
    protected $projectServiceRepository;
    protected $paymentChannelRepository;

    public function __construct(
        PaymentChannelRepository $paymentChannelRepository,
        ProjectServiceRepository $projectServiceRepository,
        ProjectRepository $projectRepository
    )
    {
        $this->projectRepository            = $projectRepository;
        $this->projectServiceRepository     = $projectServiceRepository;
        $this->paymentChannelRepository     = $paymentChannelRepository;

    }
    public function index()
    {
        $data['title']             = 'Proyek - ' . ucwords(request()->get('status') ? str_replace('_', ' ' ,request()->get('status')) : 'Semua');
        if(auth()->user()->hasRole('admin'))
        {
            $data['projects']          = $this->projectRepository->all(['status' => request()->get('status')]);

        }else if(auth()->user()->hasRole('customer'))
        {
            $data['projects']          = $this->projectRepository->all(['status' => request()->get('status'), 'customer_id' => auth()->user()->id]);
        }else if(auth()->user()->hasRole('technician'))
        {
            $data['projects']          = $this->projectRepository->all(['status' => request()->get('status'), 'technician_id' => auth()->user()->id]);
        }
        $data['payment_channels']  = $this->paymentChannelRepository->all(['status' => 'AKTIF']);
        return view('page.dashboard.projects.wrapper', $data);
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
    public function store(ProjectStoreRequest $request)
    {
        $data = $request->validated();

        $this->projectRepository->store($data);
        return redirect()->route('dashboard.transaction.projects.index')->with('success', 'Proyek berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data['title']      = 'Detail Proyek';
        $data['project']    = $project;
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('customer')){
            $data['services']   = $this->projectServiceRepository->all(['project_id' => $project->id]);
        }
        if(auth()->user()->hasRole('technician')){
            $data['services']   = $this->projectServiceRepository->all(['project_id' => $project->id, 'technician_id'=> auth()->user()->id]);
        }

        return view('page.dashboard.projects.render.detail.wrapper', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data['title']          = 'Ubah Proyek';
        $data['project']        = $project;
        $data['technicians']    = User::whereHas('roles', function($query) {
            $query->where('name', 'technician');
        })->get();
        $data['available_services']  = ServiceType::where('status', 'AKTIF')->get();
        return view('page.dashboard.projects.render.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $data = $request->validated();

        $this->projectRepository->update($project->id, $data);
        return redirect()->route('dashboard.transaction.projects.edit', $project->id)->with('success', 'Proyek berhasil diperbaharui');
    }

    public function destroy(Project $project)
    {
        $this->projectRepository->destroy($project->id);
        return redirect()->route('dashboard.transaction.projects.index')->with('success', 'Proyek berhasil dihapus');
    }
}