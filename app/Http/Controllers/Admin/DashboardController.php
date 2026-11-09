<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik konten
        $stats = [
            'products' => $this->countTable('products'),
            'gallery' => $this->countTable('galleries'),
            'clients' => $this->countTable('clients'),
            'sections' => $this->countActiveSections(),
        ];

        // Data Hero
        $hero = Hero::first();

        // Status website
        $websiteStatus = 'Online';

        // Statistik user khusus Super Admin
        $totalAdmins = null;

        if (auth()->user()->role === 'super_admin') {
            $totalAdmins = $this->countAdmins();
        }

        // Aktivitas terbaru (sementara kosong)
        $activities = collect();

        return view('admin.dashboard', compact(
            'stats',
            'hero',
            'websiteStatus',
            'totalAdmins',
            'activities'
        ));
    }

    private function countTable(string $table): int
    {
        if (!Schema::hasTable($table)) {
            return 0;
        }

        return DB::table($table)->count();
    }

    private function countActiveSections(): array
    {
        if (!Schema::hasTable('sections')) {
            return [
                'active' => 0,
                'inactive' => 0,
                'total' => 0,
            ];
        }

        $active = DB::table('sections')
            ->where('is_active', true)
            ->count();

        $total = DB::table('sections')->count();

        return [
            'active' => $active,
            'inactive' => $total - $active,
            'total' => $total,
        ];
    }

    private function countAdmins(): int
    {
        if (!Schema::hasTable('users')) {
            return 0;
        }

        return DB::table('users')
            ->where('role', 'admin')
            ->count();
    }
}
