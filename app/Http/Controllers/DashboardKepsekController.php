<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use Illuminate\Http\Request;

class DashboardKepsekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monthlyAttendanceCount = Absen::where('status', 'hadir')
        ->whereMonth('tanggal', Carbon::now()->month)
        ->count();

    // Data mingguan untuk grafik kehadiran
    $weekLabels = [];
    $weeklyAttendanceData = [];

    // Loop untuk setiap hari dalam seminggu ini
    for ($i = 0; $i < 7; $i++) {
        $date = Carbon::now()->startOfWeek()->addDays($i);
        $weekLabels[] = $date->format('l');

        // Hitung kehadiran untuk hari tersebut
        $dailyAttendanceCount = Absen::where('status', 'hadir')
            ->whereDate('tanggal', $date)
            ->count();
        $weeklyAttendanceData[] = $dailyAttendanceCount;
    }

    // Total sakit dan izin dalam minggu ini
    $weeklySickCount = Absen::where('status', 'sakit')
        ->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

    $weeklyLeaveCount = Absen::where('status', 'izin')
        ->whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

    return view('kepsek.dashboard', [
        'monthlyAttendanceCount' => $monthlyAttendanceCount,
        'weekLabels' => $weekLabels,
        'weeklyAttendanceData' => $weeklyAttendanceData,
        'weeklySickCount' => $weeklySickCount,
        'weeklyLeaveCount' => $weeklyLeaveCount,
    ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
