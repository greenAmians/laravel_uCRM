<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 追加
use Inertia\Inertia;
// Linkコンポーネントでstore保存
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index');
    }

    //フォーム(create) 一般的にはindexメソッドの下に書くことがおおい
    public function create()
    {
        return Inertia::render('Inertia/Create'); //コンポーネント
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
    // Linkコンポーネントでstore保存
    public function store(Request $request)
    {
        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        // DBに保存
        $inertiaTest->save();
        //laravel9の機能
        return to_route('inertia.index');
    }
}
