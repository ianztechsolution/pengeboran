<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helper\Helper;
use App\Models\Project;
use App\Models\ServiceType;
use App\Models\ProjectService;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectServiceRepository;
use App\Http\Requests\ProjectService\ProjectServiceStoreRequest;
use App\Http\Requests\ProjectService\ProjectServiceUpdateRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $projectRepository;
    protected $projectServiceRepository;

    public function __construct(
        ProjectServiceRepository $projectServiceRepository,
        ProjectRepository $projectRepository
    )
    {
        $this->projectRepository            = $projectRepository;
        $this->projectServiceRepository     = $projectServiceRepository;
    }
    public function index()
    {
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
    public function store(ProjectServiceStoreRequest $request)
    {
        $data = $request->validated();

        $this->projectServiceRepository->store($data);
        return redirect()->route('dashboard.transaction.projects.edit', $data['project_id'])->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectService $service_type)
    {
        $data['title']               = 'Detail Layanan | ' . $service_type->service_type->name . ' | Project : ' . $service_type->project->title;
        $data['available_services']  = ServiceType::where('status', 'AKTIF')->get();
        $data['projectService']      = $service_type;
        $data['technicians']        = User::whereHas('roles', function($query) {
            $query->where('name', 'technician');
        })->get();
        return view('page.dashboard.projects.render.show_service', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectService $service_type)
    {
        $data['title']               = 'Detail Layanan | ' . $service_type->service_type->name . ' | Project : ' . $service_type->project->title;
        $data['available_services']  = ServiceType::where('status', 'AKTIF')->get();
        $data['projectService']      = $service_type;
        $data['technicians']        = User::whereHas('roles', function($query) {
            $query->where('name', 'technician');
        })->get();
        return view('page.dashboard.projects.render.edit_service', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectServiceUpdateRequest $request, ProjectService $service_type)
    {
        $data = $request->validated();

        $this->projectServiceRepository->update($service_type->id, $data);
        return redirect()->route('dashboard.transaction.service-types.edit', $service_type->id)->with('success', 'Layanan berhasil diperbaharui');
    }

    public function destroy(ProjectService $service_type)
    {
        $this->projectServiceRepository->destroy($service_type->id);
        return redirect()->route('dashboard.transaction.projects.edit', $service_type->project_id)->with('success', 'Layanan berhasil dihapus');
    }
}