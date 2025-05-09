<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use App\Enums\VisitorType;
use Illuminate\Http\Request;
use App\Models\VisitorGeneral;
use App\Models\VisitorInternship;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitorRegisteredUserMail;
use Illuminate\Support\Facades\Storage;
use App\Notifications\RegisterNotification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegisterVisitorController extends Controller
{
    public function registerOneTime()
    {
        return view('register.one-time');
    }

    public function registerRecurring()
    {
        return view('register.recurring');
    }

    public function registerInternship()
    {
        return view('register.internship');
    }

    public function storeOneTime(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:70',
            'identity_number' => 'required|string|max:50',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:70',
            'purpose' => 'required|string',
            'person_to_meet' => 'required|string|max:70',
            'department' => 'required|string',
            'visit_date' => 'required|date',
            'exit_date' => 'required|date|after_or_equal:visit_date',
            'visit_time' => 'required',
            'exit_time' => 'required',
            'vehicle_number' => 'nullable|string|max:50',
            'additional_info' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $validated['status'] = 'Pending';
        $validated['type'] = VisitorType::UMUM;


        $fileFilename = null;
        if ($request->hasFile('photo')) {
            $fileFilename = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('visitor/photo', $fileFilename);
        }

        $visitor = Visitor::create([
            'name' => $validated['name'],
            'identity_number' => $validated['identity_number'],
            'photo' => $fileFilename,
            'phone' => $validated['phone'],
            'status' => $validated['status'],
            'type' => $validated['type'],
            'email' => $validated['email'],
        ]);

        $qrImageName = 'qr_' . $visitor->id . '.png';
        QrCode::format('png')->size(100)->color(21, 128, 61)->generate($visitor->uuid, Storage::path('qrcodes/' . $qrImageName));
        $qrCode = QrCode::size(100)->color(21, 128, 61)->generate($visitor->uuid);



        // Simpan ke database
        VisitorGeneral::create([
            'visitor_id' => $visitor->id,
            'company' => $validated['company'],
            'purpose' => $validated['purpose'],
            'person_to_meet' => $validated['person_to_meet'],
            'department' => $validated['department'],
            'visit_date' => $validated['visit_date'],
            'exit_date' => $validated['exit_date'],
            'visit_time' => $validated['visit_time'],
            'exit_time' => $validated['exit_time'],
            'vehicle_number' => $validated['vehicle_number'],
            'additional_info' => $validated['additional_info'],
        ]);
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new RegisterNotification($visitor));
        }
        Mail::to($visitor->email)->send(new VisitorRegisteredUserMail($visitor, $qrCode));

        return redirect('/one-time/success')->with('data', [
            'qrCode' => $qrCode,
            'visitor' => $visitor,
            'qrCodePath' => asset('storage/qrcodes/' . $qrImageName),
        ]);
    }

    public function storeInternship(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:70',
            'identity_number' => 'required|string|max:50',
            'institution' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:70',
            'supervisor' => 'nullable|string|max:70',
            'emergency_contact_name' => 'required|string|max:70',
            'emergency_contact_phone' => 'required|string|max:20',
            'emergency_contact_relation' => 'required|string',
            'department' => 'required|string',
            'internship_start' => 'required|date',
            'internship_end' => 'required|date|after_or_equal:internship_start',
            'additional_info' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'referral_letter' => 'required|mimes:pdf|max:4096',
        ]);

        $validated['status'] = 'Pending';
        $validated['type'] = VisitorType::MAGANG;


        $fileFilename = null;
        if ($request->hasFile('photo')) {
            $fileFilename = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('visitor/photo', $fileFilename);
        }

        $suratPengantar = null;
        if ($request->hasFile('referral_letter')) {
            $suratPengantar = time() . '.' . $request->file('referral_letter')->getClientOriginalExtension();
            $request->file('referral_letter')->storeAs('visitor/referral_letter', $fileFilename);
        }

        $visitor = Visitor::create([
            'name' => $validated['name'],
            'identity_number' => $validated['identity_number'],
            'photo' => $fileFilename,
            'phone' => $validated['phone'],
            'status' => $validated['status'],
            'type' => $validated['type'],
            'email' => $validated['email'],
        ]);


        // Simpan ke database
        VisitorInternship::create([
            'visitor_id' => $visitor->id,
            'institution' => $validated['institution'],
            'supervisor' => $validated['supervisor'],
            'emergency_contact_name' => $validated['emergency_contact_name'],
            'emergency_contact_phone' => $validated['emergency_contact_phone'],
            'emergency_contact_relation' => $validated['emergency_contact_relation'],
            'department' => $validated['department'],
            'internship_start' => $validated['internship_start'],
            'internship_end' => $validated['internship_end'],
            'referral_letter' => $suratPengantar,
            'additional_info' => $validated['additional_info'],
        ]);
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new RegisterNotification($visitor));
        }
        Mail::to($visitor->email)->send(new VisitorRegisteredUserMail($visitor, '-'));

        return redirect('/internship/success')->with('data', [
            'visitor' => $visitor,
        ]);
    }

    public function successOneTime()
    {
        return view('register.success.one-time');
    }

    public function successInternship()
    {
        return view('register.success.internship');
    }
}