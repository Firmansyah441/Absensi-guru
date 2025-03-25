<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absen;
use App\Models\Admin;
use App\Models\Kepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardConroller extends Controller
{
    public function index()
    {
        $totalAdmin = Admin::count();
        $totalGuru = Guru::count();
        $totalKepsek = Kepsek::count();

        $totalAbsen = Absen::count();
        $hadirCount = Absen::where('status', 'hadir')->count();
        $sakitCount = Absen::where('status', 'sakit')->count();
        $izinCount = Absen::where('status', 'izin')->count();
        $alfaCount = Absen::where('status', 'alfa')->count();

        // Calculate total count to compute percentages
        $totalCount = $totalAdmin + $totalGuru + $totalKepsek;

        $totalCount = $totalCount > 0 ? $totalCount : 1;

        // Calculate percentages
        $totalAdminPercentage = ($totalAdmin / $totalCount) * 100;
        $totalGuruPercentage = ($totalGuru / $totalCount) * 100;
        $totalKepsekPercentage = ($totalKepsek / $totalCount) * 100;
        $totalAbsenPercentage = ($totalAbsen / $totalCount) * 100;

        return view('admin.dashboard', compact('totalAdmin', 'totalGuru', 'totalKepsek', 'totalAbsen', 'totalAdminPercentage', 'totalGuruPercentage', 'totalKepsekPercentage', 'totalAbsenPercentage', 'hadirCount', 'sakitCount', 'izinCount', 'alfaCount'));
    }

}
