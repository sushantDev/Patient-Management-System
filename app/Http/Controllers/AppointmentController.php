<?php

namespace App\Http\Controllers;
use App\appointment;
use App\doctor;
use App\Http\Requests\StoreAppointment;
use App\Http\Requests\UpdateAppointment;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class AppointmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $appointments = Appointment::all();

        return view('backend.appointment.index',compact('appointments'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $doctors = Doctor::pluck('name', 'id')->map(function ($item)
        {
            return ucwords($item);
        });

        return view('backend.appointment.create',compact('doctors'));
    }

    /**
     * @param StoreAppointment $request
     * @return mixed
     */
    public function store(StoreAppointment $request)
    {
        $email = Doctor::pluck('email', 'id')->map(function ($item)
        {
            return ucwords($item);
        });

        $inputs = $request->except('_token');

        Mail::to($email)->send(new AppointmentMail($inputs));

        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $appointment = Appointment::create($data);

            $this->uploadRequestImage($request, $appointment);
        });

        return redirect()->route('appointment.index')->withSuccess(trans('messages.create_success', ['entity' => 'Appointment']));
    }

    /**
     * @return mixed
     */
    public function datatable()
    {
        return Datatables::eloquent(Appointment::query())->make(true);
    }

    /**
     * @param appointment $appointment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Appointment $appointment)
    {
        $doctors = Doctor::pluck('name', 'id')->map(function ($item)
        {
            return ucwords($item);
        });

        return view('backend.appointment.edit',compact('appointment','doctors'));
    }

    /**
     * @param appointment $appointment
     * @param UpdateAppointment $request
     * @return mixed
     */
    public function update(Appointment $appointment, UpdateAppointment $request)
    {
        DB::transaction(function () use ($request, $appointment)
        {
            $data = $request->data();

            $appointment->update($data);

            $this->uploadRequestImage($request, $appointment);
        });

        return redirect()->route('appointment.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Appointment' ]));
    }

    /**
     * @param appointment $appointment
     * @return mixed
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointment.index')->withSuccess(trans('message.delete_success', [ 'entity' => 'Appointment' ]));
    }
}