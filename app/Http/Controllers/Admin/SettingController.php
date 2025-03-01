<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmSetting\AdmSettingUpdateReqest;
use App\Repositories\AdmSettingRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $admSettingRepo;
    public function __construct(AdmSettingRepo $admSettingRepo)
    {
        $this->admSettingRepo = $admSettingRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Setting';
        $data['setting'] = $this->admSettingRepo->first();
        return view('page.dashboard.setting.wrapper',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $html = view('page.dashboard.setting.render.create')->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, admSettingRepo $admSettingRepo)
    {
        $data = $request->all();
    
        try {
            DB::beginTransaction();
            if ($request->hasFile('business_icon')) {
                $path = Helper::uploadFile($request->file('business_icon'), 'admin/setting/business_icon');
                $data['business_icon'] = $path;
            }
            if ($request->hasFile('business_logo')) {
                $path = Helper::uploadFile($request->file('business_logo'), 'admin/setting/business_logo');
                $data['business_logo'] = $path;
            }
            $setting = $this->admSettingRepo->store($data);
            DB::commit();
            return Helper::resJson('Setting saved successfully', $setting, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('Error saat menyimpan Setting: ' . $th->getMessage());
            return Helper::resJson($th->getMessage(), [], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdmSettingUpdateReqest $request, string $id)
    {
        $data = $request->all();
        $setting = $this->admSettingRepo->find($id);
        try {
            if ($request->hasFile('business_icon')) {
                Helper::deleteFile($setting->business_icon);
                $data['business_icon'] = Helper::uploadFile($request->file('business_icon'), 'admin/setting/business_icon');
            }
            if ($request->hasFile('business_logo')) {
                Helper::deleteFile($setting->business_logo);
                $data['business_logo'] = Helper::uploadFile($request->file('business_logo'), 'admin/setting/business_logo');
            }
            DB::beginTransaction();
            $save = $this->admSettingRepo->update($id, $data);
            DB::commit();
            return Helper::resJson('Admin setting updated successfully', $save, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return Helper::resJson($th->getMessage(), $th, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
