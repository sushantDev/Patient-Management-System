<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatient;
use App\Http\Requests\UpdatePatient;
use App\patient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $patients = Patient::all();

        return view('backend.patient.index',compact('patients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.patient.create');
    }

    /**
     * @param StorePatient $request
     * @return mixed
     */
    public function store(StorePatient $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $patient = Patient::create($data);

            $this->uploadRequestImage($request, $patient);
        });

        return redirect()->route('patient.index')->withSuccess(trans('messages.create_success', ['entity' => 'Patient']));
    }

    /**
     * @param patient $patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Patient $patient)
    {
        return view('backend.patient.edit',compact('patient'));
    }

    /**
     * @param patient $patient
     * @param UpdatePatient $request
     * @return mixed
     */
    public function update(Patient $patient, UpdatePatient $request)
    {
        DB::transaction(function () use ($request, $patient)
        {
            $data = $request->data();

            $patient->update($data);

            $this->uploadRequestImage($request, $patient);
        });

        return redirect()->route('patient.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Patient' ]));
    }

    /**
     * @param patient $patient
     * @return mixed
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patient.index')->withSuccess(trans('message.delete_success', [ 'entity' => 'Patient' ]));
    }
}