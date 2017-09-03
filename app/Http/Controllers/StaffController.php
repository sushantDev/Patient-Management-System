<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaff;
use App\Http\Requests\UpdateStaff;
use App\staff;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $staffs = Staff::all();

        return view('backend.staff.index',compact('staffs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.staff.create');
    }

    /**
     * @param StoreStaff $request
     * @return mixed
     */
    public function store(StoreStaff $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $staff = Staff::create($data);

            $this->uploadRequestImage($request, $staff);
        });

        return redirect()->route('staff.index')->withSuccess(trans('messages.create_success', ['entity' => 'Staff']));
    }

    /**
     * @return mixed
     */
    public function datatable()
    {
        return Datatables::eloquent(Staff::query())->make(true);
    }

    /**
     * @param staff $staff
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Staff $staff)
    {
        return view('backend.staff.edit',compact('staff'));
    }

    /**
     * @param staff $staff
     * @param UpdateStaff $request
     * @return mixed
     */
    public function update(Staff $staff, UpdateStaff $request)
    {
        DB::transaction(function () use ($request, $staff)
        {
            $data = $request->data();

            $staff->update($data);

            $this->uploadRequestImage($request, $staff);
        });

        return redirect()->route('staff.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Staff' ]));
    }

    /**
     * @param staff $staff
     * @return mixed
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->withSuccess(trans('message.delete_success', [ 'entity' => 'Staff' ]));
    }
}