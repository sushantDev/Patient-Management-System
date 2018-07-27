<?php

namespace App\Http\Controllers;

use App\doctor;
use App\Http\Requests\StoreDoctor;
use App\Http\Requests\UpdateDoctor;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('backend.doctor.index',compact('doctors'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.doctor.create');
    }

    /**
     * @param StoreDoctor $request
     * @return mixed
     */
    public function store(StoreDoctor $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $doctor = Doctor::create($data);

            $this->uploadRequestImage($request, $doctor);
        });

        return redirect()->route('doctor.index')->withSuccess(trans('messages.create_success', ['entity' => 'Doctor']));
    }

    /**
     * @return mixed
     */
    public function datatable()
    {
        return Datatables::eloquent(Doctor::query())->make(true);
    }

    /**
     * @param doctor $doctor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Doctor $doctor)
    {
        return view('backend.doctor.edit',compact('doctor'));
    }

    /**
     * @param doctor $doctor
     * @param UpdateDoctor $request
     * @return mixed
     */
    public function update(Doctor $doctor, UpdateDoctor $request)
    {
        DB::transaction(function () use ($request, $doctor)
        {
            $data = $request->data();

            $doctor->update($data);

            $this->uploadRequestImage($request, $doctor);
        });

        return redirect()->route('doctor.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Doctor' ]));
    }

    /**
     * @param doctor $doctor
     * @return mixed
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctor.index')->withSuccess(trans('message.delete_success', [ 'entity' => 'Doctor' ]));
    }
}