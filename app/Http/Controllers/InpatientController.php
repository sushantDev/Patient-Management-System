<?php

namespace App\Http\Controllers;

use App\doctor;
use App\Http\Requests\StoreInpatient;
use App\Http\Requests\UpdateInpatient;
use App\inpatient;
use App\staff;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InpatientController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $inpatients = Inpatient::all();

        return view('backend.inpatient.index',compact('inpatients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $doctors = Doctor::all()->pluck('name', 'id');
        $staffs = Staff::all()->pluck('name', 'id');

        return view('backend.inpatient.create', compact('doctors','staffs'));
    }

    /**
     * @param StoreInpatient $request
     * @return mixed
     */
    public function store(StoreInpatient $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $inpatient = Inpatient::create($data);

            $this->uploadRequestImage($request, $inpatient);
        });

        return redirect()->route('inpatient.index')->withSuccess(trans('messages.create_success', ['entity' => 'Inpatient']));
    }

    /**
     * @return mixed
     */
    public function datatable()
    {
        return Datatables::eloquent(Inpatient::query())->make(true);
    }

    /**
     * @param inpatient $inpatient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Inpatient $inpatient)
    {
        return view('backend.inpatient.edit',compact('inpatient'));
    }

    /**
     * @param inpatient $inpatient
     * @param UpdateInpatient $request
     * @return mixed
     */
    public function update(Inpatient $inpatient, UpdateInpatient $request)
    {
        DB::transaction(function () use ($request, $inpatient)
        {
            $data = $request->data();

            $inpatient->update($data);

            $this->uploadRequestImage($request, $inpatient);
        });

        return redirect()->route('inpatient.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Inpatient' ]));
    }

    /**
     * @param inpatient $inpatient
     * @return mixed
     */
    public function destroy(Inpatient $inpatient)
    {
        $inpatient->delete();

        return redirect()->route('inpatient.index')->withSuccess(trans('message.delete_success', [ 'entity' => 'Inpatient' ]));
    }
}