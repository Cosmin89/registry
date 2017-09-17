<?php

namespace App\Http\Controllers;

use App\WorkHour;
use App\FreeDay;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\WorkHourFormRequest;
use App\Http\Requests\FreeDayFormRequest;
use Carbon\Carbon;

class WorkerController extends Controller
{
    
    public function index() {

        return view('worker.index');
    }

    public function logWorkHours(WorkHourFormRequest $request){

        $user = Auth::user();

        $dt = Carbon::parse($request->workdate)->toRssString();

        $month = explode(' ', $dt)[2];

        $workhour = new WorkHour([
            'hours' => $request->hours,
            'workdate' => $request->workdate,
            'month' => strtolower($month),
        ]);

        $workhour->user()->associate($user);

        if(Carbon::parse($request->workdate) == Carbon::today()) {
            $workhour->save();

            return redirect()->route('worker')->with('status', 'Worked hours added.');
        } else {
            return redirect()->route('worker')->with('error', 'Date is not today.');
        }

    }

    public function logFreeDays(FreeDayFormRequest $request) {
        $user = Auth::user();

        $dt = Carbon::parse($request->start_date)->toRssString();

        $start_date =  Carbon::parse($request->start_date);

        $end_date =  Carbon::parse($request->end_date);

        $total_free_days = $end_date->diffInDays($start_date);

        $month = explode(' ', $dt)[2];

        $freeday = new FreeDay([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_free_days' => $total_free_days,
            'month' => strtolower($month)
        ]);

        $freeday->user()->associate($user);

        if(Carbon::parse($request->start_date) != Carbon::today()) {
            $freeday->save();

            return redirect()->route('worker')->with('status', 'Free day added.');
        } else {
            return redirect()->route('worker')->with('error', 'Date must be set in the past or the future.');
        }
    }
}
