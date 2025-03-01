<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Repositories\SubscriptionRepo;
use App\Repositories\HotelSettingRepo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscriptionStoreRequest;
use App\Models\Hotel;
use App\Models\HotelSetting;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    protected $subscriptionRepo;
    protected $HotelSettingRepo;
    public function __construct(SubscriptionRepo $subscriptionRepo, HotelSettingRepo $HotelSettingRepo)
    {
        $this->subscriptionRepo = $subscriptionRepo;
        $this->HotelSettingRepo = $HotelSettingRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Subscription';
        $data['subscription'] = $this->subscriptionRepo->all(request()->all());
        return view('page.dashboard.subscription.wrapper',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['hotel'] =HotelSetting::all();
        $html = view('page.dashboard.subscription.render.create', $data)->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionStoreRequest $request)
    {
        $data = $request->all();
        try {
            $store = $this->subscriptionRepo->store($data);
            return Helper::resJson('success', $store, 200);
        } catch (\Throwable $th) {
            return Helper::resJson($th->getMessage(), $th, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        $data['subscription'] = $subscription;
        $data['lang'] = config('app.locale');
        $html = view('page.dashboard.subscription.render.detail.wrapper', $data)->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        $data['subscription'] = $subscription;
        $html = view('page.dashboard.subscription.render.edit', $data)->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionStoreRequest $request, string $id)
    {
        $data = $request->all();
        try {
            $update = $this->subscriptionRepo->update($id, $data);
            return Helper::resJson('success', $update, 200);
        } catch (\Throwable $th) {
            return Helper::resJson($th->getMessage(), $th, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Subscription $subscription)
    {
        $data['subscription'] = $subscription;
        $html = view('page.dashboard.subscription.render.delete', $data)->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $this->subscriptionRepo->destroy($id);

            DB::commit();
            return Helper::resJson('Subcription deleted successfully', null, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return Helper::resJson($th->getMessage(), $th, 500);
        }
    }
}
