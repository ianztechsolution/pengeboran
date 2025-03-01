<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Hotel;
use App\Helper\Helper;
use App\Repositories\HotelRepo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmHotel\HotelStoreRequest;
use App\Http\Requests\AdmHotel\HotelUpdateRequest;

class HotelController extends Controller
{
    protected $hotelRepo;

    public function __construct(HotelRepo $hotelRepo)
    {
        $this->hotelRepo = $hotelRepo;
    }

    public function index()
    {
        $data['title'] = 'Hotel';
        $data['hotels'] = $this->hotelRepo->all();
        return view('page.dashboard.hotel.wrapper', $data);
    }

    public function create()
    {
        $html = view('page.dashboard.hotel.render.create')->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    public function store(HotelStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $hotel = $this->hotelRepo->store($request->all());
            DB::commit();
            return Helper::resJson('Hotel created successfully', ['hotel' => $hotel], 201);
        } catch (Throwable $e) {
            DB::rollback();
            return Helper::resJson('Failed to create hotel', ['error' => $e->getMessage()], 500);
        }
    }

    public function show(Hotel $hotel)
    {
        $data['hotel'] = $hotel;
        $data['lang'] = config('app.locale');
        $html = view('page.dashboard.hotel.render.detail.wrapper', $data)->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $data['hotel'] = $hotel;
        $html = view('page.dashboard.hotel.render.edit', $data)->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    public function update(HotelUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $hotel = $this->hotelRepo->update($id, $request->all());
            DB::commit();
            return Helper::resJson('Hotel updated successfully', ['hotel' => $hotel], 200);
        } catch (Throwable $e) {
            DB::rollback();
            return Helper::resJson('Failed to update hotel', ['error' => $e->getMessage()], 500);
        }
    }

    public function delete(Hotel $hotel)
    {
        $data['hotel'] = $hotel;
        $html = view('page.dashboard.hotel.render.delete', $data)->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->hotelRepo->destroy($id);
            DB::commit();
            return Helper::resJson('Hotel deleted successfully', null, 200);
        } catch (Throwable $e) {
            DB::rollback();
            return Helper::resJson('Failed to delete hotel', ['error' => $e->getMessage()], 500);
        }
    }
}
