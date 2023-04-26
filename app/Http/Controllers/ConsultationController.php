<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Faculties;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Consultations;
use App\Models\ConsultationSlots;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ConsultationController extends Controller
{
    // api to get slot availability of a faculty on a particular date  Route::get('/slot_availability/{user}/{date}', [ConsultationController::class, 'show_slot_availability_api']);
    public function show_slot_availability_api($user, $date)
    {

        // get the date of the request and get its day like Sunday, Monday
        $day = date('l', strtotime($date));

        // get the slots of the faculty from ConsultationSlots model with $user as faculty_id
        $slots = ConsultationSlots::where('faculty_id', $user)
            ->where('day_of_week', $day)
            ->where('status', 1)
            ->get();

        // format date into YYYY-MM_DD format
        $date = date('Y-m-d', strtotime($date));

        // check if the given slots has any booking on that day where slots are slot_id and date is consultation_date in YYYY-MM-DD format
        $booked_slots = Consultations::where('consultation_date', $date)
            ->where('is_approved', 'Approved')
            ->get();

        // get all the slots from booked_slots where slot_id is the slots ID and remove them from $slots
        foreach ($booked_slots as $booked_slot) {
            $slots = $slots->where('id', '!=', $booked_slot->slot_id);
        }

        // return the slots in json format
        return response()->json($slots);
    }



    /**
     * Create consultation slot page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get the consultation slots model for the logged in user.
        $consultationSlots = ConsultationSlots::where('faculty_id', auth()->user()->id)
            ->orderBy('day_of_week', 'asc')
            ->orderBy('start_time', 'asc')
            ->paginate(10);

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

    /**
     * Update consultation slot.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Get the consultation slot.
        $consultationSlot = ConsultationSlots::findOrFail($request->id);


        $status = $request->status;
        $status = $status == 'on' ? 1 : 0;

        // Update the consultation slot.
        $consultationSlot->update([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'day_of_week' => $request->day,
            'status' => $status,
        ]);

        // Redirect back to the consultation slot page.
        return redirect()->route('createConsultation')->with('success', 'Consultation slot updated successfully!');
    }

    /**
     * Delete consultation slot.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        // Get the consultation slot.
        $consultationSlot = ConsultationSlots::find($request->id);

        // Delete the consultation slot.
        $consultationSlot->delete();

        // Redirect back to the consultation slot page.
        return redirect()->route('createConsultation')->with('success', 'Consultation slot deleted successfully!');
    }

    /**
     * Create consultation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function createConsultation(Request $request)
    {
        // create consultation from the request from student side
        // Validate the request.
        // request message=Hey&studentName=Ehsanur+Rahman+Rhythm&studentId=22241163&date=2023-04-24&timeSlot=32
        $request->validate([
            'message' => 'required',
            'studentName' => 'required',
            'studentId' => 'required',
            'date' => 'required',
            'timeSlot' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $faculty_id = ConsultationSlots::where('id', $request->timeSlot)->first()->faculty_id;

        $humandate = date('d F Y', strtotime($request->date));

        // Get the consultation slot where time slot id is equal to the given time slot id.
        $consultationSlot = ConsultationSlots::find($request->timeSlot);

        // check if the consultation slot is available or not.
        if ($consultationSlot->status == 0) {
            return redirect()->back()->with('message', 'The consultation slot is not available.');
        }

        // check if the consultation slot has been taken on same day or not.
        $consultationbooked = Consultations::where('slot_id', $request->timeSlot)
            ->where('consultation_date', $request->date)
            ->first();

        if ($consultationbooked) {
            return redirect()->back()->with('message', 'The consultation slot has already been taken by someone else on this day.');
        }

        // check if the consultation slot has been taken on same day or not.
        $consultationtakenthisday = Consultations::where('student_id', $user_id)
            ->where('consultation_date', $request->date)
            ->first();

        if ($consultationtakenthisday) {

            if ($consultationtakenthisday->is_approved == 'Pending') {
                return redirect()->back()->with('message', 'You already have a pending request on ' . $humandate . '. Please wait for the approval.');
            }

            if ($consultationtakenthisday->is_approved == 'Approved') {
                return redirect()->back()->with('message', 'You already have a consultation on ' . $humandate . '.');
            }
        }

        // get the student logged in by auth
        $student = Auth::user();

        // get the consultation end time by adding the slot end time with the consultation date, it will be in DATETIME format
        $consultationEndTime = date('Y-m-d H:i:s', strtotime($consultationSlot->end_time . ' ' . $request->date));

        // generate brave talk link

        /**
         * Generates a valid room name.
         *
         */
        function generateValidRoomName()
        {
            $randomBytes = random_bytes(32);
            $base64 = str_replace(['+', '/', '='], [
                '-', '_', ''
            ], base64_encode($randomBytes));

            $roomNamePattern = '/^[A-Za-z0-9-_]{43}$/';
            while (!preg_match($roomNamePattern, $base64)) {
                $randomBytes = random_bytes(32);
                $base64 = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($randomBytes));
            }

            return $base64;
        }

        $roomName = generateValidRoomName();

        // create the consultation.
        // id	student_id faculty_id slot_id	message	consultation_date	complete_time	meeting_link is_approved
        $data = [
            'student_id' => $student->id,
            'faculty_id' => $faculty_id,
            'slot_id' => $request->timeSlot,
            'message' => $request->message,
            'consultation_date' => $request->date,
            'complete_time' => $consultationEndTime,
            'meeting_link' => $roomName,
            'is_approved' => 'Pending',
        ];

        Consultations::create($data);

        return redirect()->route('profileRedirect')->with('message', 'Consultation created successfully!');
    }

    // show all consultations
    public function index()
    {
        $user_id = Auth::user()->id;

        // check the role of the logged in user
        $role = Auth::user()->role;
        if ($role == 'student') {
            $id_query = 'student_id';
        } elseif ($role == 'faculty') {
            $id_query = 'faculty_id';
        }

        $consultations = Consultations::where($id_query, $user_id)
            ->where('is_approved', 'Approved')
            ->orderBy('complete_time', 'asc')
            ->limit(10)
            ->get();

        // show max 3 consultations
        $pendingConsultations = Consultations::where($id_query, $user_id)
            ->where('is_approved', 'Pending')
            ->orderBy('complete_time', 'asc')
            ->limit(3)
            ->get();

        $pendingHeading = 'Pending Consultations';
        $approvedHeading = 'Scheduled Consultations';

        return view('dashboard.consultation.index', [
            'pendingHeading' => $pendingHeading,
            'approvedHeading' => $approvedHeading,
            'consultations' => $consultations,
            'pendingConsultations' => $pendingConsultations,
        ]);
    }

    // reject consultation
    public function reject(Request $request)
    {

        $user = Auth::user();
        $role = $user->role;

        // if the role is student then action is Cancelled otherwise if the role is faculty then action is Rejected
        $action = $role == 'student' ? 'Cancelled' : 'Rejected';

        $consultation = Consultations::find($request->id);

        // Check if the logged in user is authorized to view this consultation
        if ($user->role == 'student' && $user->id !== $consultation->student_id) {
            return redirect()->back()->with('message', 'You are not authorized to view this consultation!');
        }

        if ($user->role == 'faculty' && $user->id !== $consultation->faculty_id) {
            return redirect()->back()->with('message', 'You are not authorized to view this consultation!');
        }


        $consultation->is_approved = $action;

        $consultation->save();

        return redirect()->back()->with('message', 'Consultation ' . $action . ' successfully!');
    }

    // approve consultation
    public function approve(Request $request)
    {

        $user = Auth::user();

        $consultation = Consultations::find($request->id);


        if ($user->role == 'faculty' && $user->id !== $consultation->faculty_id) {
            return redirect()->back()->with('message', 'You are not authorized to view this consultation!');
        }

        $consultation->is_approved = 'Approved';

        $consultation->save();


        // try {
        //     // send mail to both student and faculty
        //     $student = User::find($consultation->student_id);
        //     $faculty = User::find($consultation->faculty_id);

        //     $studentdetails = [
        //         'title' => 'Consultation Approved',
        //         'body' => 'Your consultation with ' . $faculty->name . ' has been approved. Please check your dashboard for more details.',
        //     ];

        //     $facultydetails = [
        //         'title' => 'Consultation Approved',
        //         'body' => 'You have approved the consultation with ' . $student->name . '. Please check your dashboard for more details.',
        //     ];

        //     Mail::send('emails.myTestMail', array('user' => $student, 'details' => $studentdetails), function ($message) use ($student) {
        //         $message->to($student->email, $student->name)->subject('Consultation Approved');
        //     });

        //     Mail::send('emails.myTestMail', array('user' => $faculty, 'details' => $facultydetails), function ($message) use ($faculty) {
        //         $message->to($faculty->email, $faculty->name)->subject('Consultation Approved');
        //     });
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        return redirect()->back()->with('message', 'Consultation approved successfully!');
    }

    /**
     * Show consultation details.
     *
     * @param int $id The ID of the consultation to show.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $consultation = Consultations::findOrFail($id);

        $user = Auth::user();

        // Check if the logged in user is authorized to view this consultation
        if ($user->role == 'student' && $user->id !== $consultation->student_id) {
            return redirect()->back()->with('message', 'You are not authorized to view this consultation!');
        }

        if ($user->role == 'faculty' && $user->id !== $consultation->faculty_id) {
            return redirect()->back()->with('message', 'You are not authorized to view this consultation!');
        }

        return view('dashboard.consultation.show', [
            'heading' => 'Consultation Details',
            'consultation' => $consultation,
        ]);
    }

    // change consultation slot
    public function changeSlot(Request $request)
    {
        $consultation = Consultations::find($request->id);

        $consultation->slot_id = $request->slot_id;
        $consultation->updated_at = now();

        $consultation->save();

        return redirect()->back()->with('message', 'Consultation slot changed successfully!');
    }

    // show all pending consultations
    public function pending()
    {
        $user_id = Auth::user()->id;

        // check the role of the logged in user
        $role = Auth::user()->role;
        if ($role == 'student') {
            $id_query = 'student_id';
        } elseif ($role == 'faculty') {
            $id_query = 'faculty_id';
        }

        $consultations = Consultations::where($id_query, $user_id)
            ->where('is_approved', 'Pending')
            ->orderBy('complete_time', 'asc')
            ->paginate(10);

        $heading = 'Pending Consultations';

        return view('dashboard.consultation.index_status', [
            'heading' => $heading,
            'consultations' => $consultations,
        ]);
    }

    // show all approved consultations
    public function approved()
    {
        $user_id = Auth::user()->id;

        // check the role of the logged in user
        $role = Auth::user()->role;
        if ($role == 'student') {
            $id_query = 'student_id';
        } elseif ($role == 'faculty') {
            $id_query = 'faculty_id';
        }

        $consultations = Consultations::where($id_query, $user_id)
            ->where('is_approved', 'Approved')
            ->orderBy('complete_time', 'asc')
            ->paginate(10);

        $heading = 'Approved Consultations';

        return view('dashboard.consultation.index_status', [
            'heading' => $heading,
            'consultations' => $consultations,
        ]);
    }

    // show all consultations even if they are cancelled or rejected
    public function all()
    {
        $user_id = Auth::user()->id;

        // check the role of the logged in user
        $role = Auth::user()->role;
        if ($role == 'student') {
            $id_query = 'student_id';
        } elseif ($role == 'faculty') {
            $id_query = 'faculty_id';
        }

        $consultations = Consultations::where($id_query, $user_id)
            ->orderBy('complete_time', 'asc')
            ->paginate(10);

        $heading = 'All Consultations';

        return view('dashboard.consultation.index_status', [
            'heading' => $heading,
            'consultations' => $consultations,
        ]);
    }
}
