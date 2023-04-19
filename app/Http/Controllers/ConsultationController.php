<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\ConsultationSlots;

class ConsultationController extends Controller
{
    /**
     * Create consultation slot page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get the consultation slots model for the logged in user.
        $consultationSlots = ConsultationSlots::where('faculty_id', auth()->user()->id)->get();

        // Return the create consultation slot page with the necessary data.
        return view('dashboard.consultation.create', [
            'heading' => 'Consultation Slots',
            'consultationSlots' => $consultationSlots,
        ]);
    }

    /**
     * Store consultation slot.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // mode=on&start_time=11%3A30&end_time=13%3A30&total_slots=4&day=Sunday&status=on
        // if the mode is on, then the consultation is mass mode
        // if the mode is off, then the consultation is solo mode
        if ($request->mode == 'on') {
            // Validate the request.
            $request->validate([
                'start_time' => 'required',
                'end_time' => 'required',
                'total_slots' => 'required',
                'day' => 'required',
            ]);

            // Get the start time and end time.
            $startTime = $request->start_time;
            $endTime = $request->end_time;

            // check in database if the given time overlaps with any other consultation slot of that same faculty.
            $consultationSlots = ConsultationSlots::where('faculty_id', auth()->user()->id)
                ->where('day_of_week', $request->day)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('start_time', [$startTime, $endTime])
                        ->orWhereBetween('end_time', [$startTime, $endTime]);
                })
                ->get();

            if (!$consultationSlots->isEmpty()) {
                return redirect()->back()->with('message', 'The given time overlaps with another consultation slot.');
            }

            // format the start time and end time and get the difference in minutes.
            $startTime = strtotime($startTime);
            $endTime = strtotime($endTime);
            $difference = ($endTime - $startTime) / 60;

            // Get the total slots.
            $totalSlots = $request->total_slots;

            // Get the day.
            $day = $request->day;

            // Get the status.
            $status = $request->status;
            $status = $status == 'on' ? 1 : 0;

            // now we need to divide the difference by the total slots to get each slot time in minute and the time must be rounded to the nearest 5 minutes always take lesser one.
            $slotTime = round($difference / $totalSlots / 5) * 5;

            // now we need to create an array of slots.
            $slots = [];

            // get the start time and add the slot time to it and push it to the slots array.
            for ($i = 0; $i < $totalSlots; $i++) {
                $startTime = date('H:i', $startTime);
                $slots[] = $startTime;
                $startTime = strtotime($startTime);
                $startTime = $startTime + ($slotTime * 60);
            }
            foreach ($slots as $slot) {
                $start_time = (string) $slot;
                $end_time = date('H:i', strtotime($slot) + ($slotTime * 60));
                $end_time = (string) $end_time;
                $data = [
                    'faculty_id' => auth()->user()->id,
                    'day_of_week' => $day,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'status' => $status,
                ];
                ConsultationSlots::create($data);
            }
        } else {
            // Validate the request.
            $request->validate([
                'start_time' => 'required',
                'end_time' => 'required',
                'day' => 'required',
            ]);

            // check in database if the given time overlaps with any other consultation slot of that same faculty.
            $consultationSlots = ConsultationSlots::where('faculty_id', auth()->user()->id)
                ->where('day_of_week', $request->day)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                        ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
                })
                ->get();

            if (!$consultationSlots->isEmpty()) {
                return redirect()->back()->with('message', 'The given time overlaps with another consultation slot.');
            }

            $day_of_week = $request->day;


            // Get the status.
            $status = $request->status;
            $status = $status == 'on' ? 1 : 0;

            // Create the consultation slot.
            ConsultationSlots::create([
                'faculty_id' => auth()->user()->id,
                'day_of_week' => $day_of_week,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'status' => $status,
            ]);
        }

        // Redirect back to the consultation slot page.
        return redirect()->route('createConsultation')->with('success', 'Consultation slot created successfully!');
    }
}
