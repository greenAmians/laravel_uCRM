<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 追加
use Inertia\Inertia;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index');
    }
    public function show($id)
    {
        // dd()
        // ララベルのデバッグ
        // 処理を止めて変数の値をみることができる
        // dd($id);
        return Inertia::render('Inertia/Show',
        [
            // 引数として入ってきた値をvue側に渡す
            'id' => $id
        ]);
    }
}
