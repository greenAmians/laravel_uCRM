<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class AnalysisService
{
    /**
     * 日別
     *
     * @param [type] $subQuery
     * @return void
     */
    public static function perDay($subQuery)
    {
        $query = $subQuery->where('status', true)->groupBy('id')->selectRaw('SUM(subtotal) AS 
        totalPerPurchase, DATE_FORMAT(created_at, "%Y%m%d") AS date')->groupBy('date');
        $data = DB::table($query)
            ->groupBy('date')
            ->selectRaw('date, sum(totalPerPurchase) as total')
            ->get();

        //日別売り上げのグラフ表示
        $labels = $data->pluck('date');
        $totals = $data->pluck('total');

        return [$data, $labels, $totals];
    }

    /**
     * 月別
     *
     * @param [type] $subQuery
     * @return void
     */
    public static function perMonth($subQuery)
    {
        $query = $subQuery->where('status', true)->groupBy('id')->selectRaw('SUM(subtotal) AS 
        totalPerPurchase, DATE_FORMAT(created_at, "%Y%m") AS date')->groupBy('date');
        
        $data = DB::table($query)
            ->groupBy('date')
            ->selectRaw('date, sum(totalPerPurchase) as total')
            ->get();

        //日別売り上げのグラフ表示
        $labels = $data->pluck('date');
        $totals = $data->pluck('total');

        return [$data, $labels, $totals];
    }
    
    /**
     * 年ごと
     *
     * @param [type] $subQuery
     * @return void
     */
    public static function perYear($subQuery)
    {
        $query = $subQuery->where('status', true)->groupBy('id')->selectRaw('SUM(subtotal) AS 
        totalPerPurchase, DATE_FORMAT(created_at, "%Y") AS date')->groupBy('date');
        $data = DB::table($query)
            ->groupBy('date')
            ->selectRaw('date, sum(totalPerPurchase) as total')
            ->get();

        //日別売り上げのグラフ表示
        $labels = $data->pluck('date');
        $totals = $data->pluck('total');

        return [$data, $labels, $totals];
    }
}
