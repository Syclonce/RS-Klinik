<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\schedule;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Susunan Acara";
        $data = doctor::all();
        $schedule = schedule::with(['doctor'])->get();
        return view('schedule.index', compact('title','data','schedule'));
    }
    public function scheduleadd(Request $request)
    {
        $data = $request->validate([
            "dokter" => 'required',
            "hari" => 'required',
            "awal" => 'required',
            "akhir" => 'required',
            "menit" => 'required',
        ]);

        $schedule = new schedule();
        $schedule->doctor_id = $data['dokter'];
        $schedule->hari = $data['hari'];
        $schedule->awal = date("H:i", strtotime($data['awal'] ));
        $schedule->akhir = date("H:i", strtotime($data['akhir'] ));
        $schedule->menit = $data['menit'];
        $schedule->save();

        return redirect()->route('schedule')->with('success', 'schedule berhasi di tambahkan');
    }


    public function scheduledoctor($id)
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Susunan Acara";
        $data = doctor::all();
        $schedule = schedule::with(['doctor'])->where('doctor_id', $id)->get();
        $dataid = $id;
        return view('schedule.doctor', compact('title','data','schedule','dataid'));
    }

    public function scheduledoctoradd(Request $request)
    {
        $data = $request->validate([
            "dokter" => 'required',
            "hari" => 'required',
            "awal" => 'required',
            "akhir" => 'required',
            "menit" => 'required',
        ]);

        $schedule = new schedule();
        $schedule->doctor_id = $data['dokter'];
        $schedule->hari = $data['hari'];
        $schedule->awal = date("H:i", strtotime($data['awal'] ));
        $schedule->akhir = date("H:i", strtotime($data['akhir'] ));
        $schedule->menit = $data['menit'];
        $schedule->save();

        return redirect()->route('doctor.doctor',['id' => $data['dokter']])->with('success', 'schedule berhasi di tambahkan');
    }
}
