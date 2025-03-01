<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectServiceRepository;

class ReportController extends Controller
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
        $periode = '';
        if(request()->get('start_date') && request()->get('end_date'))
        {
            $periode = request()->get('start_date') . ' s/d '. request()->get('end_date');
            if(auth()->user()->hasRole('admin'))
            {
                $data['projects']          = $this->projectRepository->all(['start_date' => request()->get('start_date'), 'end_date' => request()->get('end_date')]);

            }else if(auth()->user()->hasRole('technician'))
            {
                $data['projects']          = $this->projectRepository->all(['start_date' => request()->get('start_date'), 'end_date' => request()->get('end_date'), 'technician_id' => auth()->user()->id]);
            }
        } else {
            $periode = 'Semua';
            if(auth()->user()->hasRole('admin'))
            {
                $data['projects']          = $this->projectRepository->all();

            }else if(auth()->user()->hasRole('technician'))
            {
                $data['projects']          = $this->projectRepository->all(['technician_id' => auth()->user()->id]);
            }
        }
        
        $data['title']     = 'Laporan Proyek : ' . $periode;
        return view('page.dashboard.reports.wrapper', $data);
    }
}