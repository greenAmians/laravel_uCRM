<?php

namespace App\Http\Controllers;

// namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function index()
    {
        $startDate = '2022-08-01';
        $endDate = '2022-08-31';

        // 日別 
        $subQuery = Order::betweenDate($startDate, $endDate)
            ->where('status', true)->groupBy('id')
            ->selectRaw('id, SUM(subtotal) as totalPerPurchase, 
                DATE_FORMAT(created_at, "%Y%m%d") as date');
        // dd($period);

        $data = DB::table($subQuery)
            ->groupBy('date')
            ->selectRaw('date, sum(totalPerPurchase) as total')
            ->get();

        return Inertia::render('Analysis');
    }
}
