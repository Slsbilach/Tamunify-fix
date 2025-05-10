<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Exports\VisitorExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\VisitorConfirmationMail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\ConfirmationNotification;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $visitors = Visitor::query()->with(['general', 'internship', 'recurring']);

            if ($request->has('status') && $request->input('status') != 'All' && $request->input('status') != NULL) {
                $status = $request->input('status');
                $visitors->where('status', $status);
            }
            if ($request->has('type') && $request->input('type') != 'All' && $request->input('type') != NULL) {
                $type = $request->input('type');
                $visitors->where('type', $type);
            }


            return DataTables::of($visitors)->make();
        }

        return view('dashboard.visitor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        if ($visitor->photo) {
            Storage::delete('visitor/photo/' . $visitor->photo);
        }
        $visitor?->general?->delete();
        $visitor?->internship?->delete();
        $visitor?->recurring?->delete();
        Visitor::destroy($visitor->id);

        return redirect('/dashboard')->with('success', 'Tamu Berhasil Dihapus!');
    }

    public function export(Request $request)
    {
        $status = $request->statusExport;
        $type = $request->typeExport;
        return Excel::download(new VisitorExport($status, $type), 'Data Tamu.xlsx');

    }

    public function updateStatus(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->status = $request->status;
        $visitor->save();

        $users = User::all();

        if ($visitor->type->value != 'Tamu Umum') {
            if ($visitor->status != 'Pending' || $visitor->status != 'Inactive') {
                foreach ($users as $user) {
                    $user->notify(new ConfirmationNotification($visitor));
                }
                Mail::to($visitor->email)->send(new VisitorConfirmationMail($visitor));
            }
        }


        return response()->json(['success' => true]);
    }

    public function getVisitor($id)
    {
        $visitor = Visitor::with(['general', 'internship', 'recurring'])->findOrFail($id);

        $html = view('dashboard.partials.visitor-detail', compact('visitor'))->render();

        return response()->json([
            'html' => $html
        ]);
    }


}