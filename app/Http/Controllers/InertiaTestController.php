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
        //第二引数は連想配列でkeyとvalueを渡す
        return Inertia::render('Inertia/Index',[
            'blogs'=>InertiaTest::all()
        ]);
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
            'id' => $id,
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }
    // Linkコンポーネントでstore保存処理
    public function store(Request $request)
    {
        // 連想配列でかいていく
        $request->validate([
            'title' => ['required','max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        // DBに保存
        $inertiaTest->save();
        //laravel9の機能
        //リダイレクトに続けてwithをつけ、セッションメッセージを渡すことができる
        return to_route('inertia.index')
        ->with([
            'message' => '登録しました'
        ]);
    }


    // 削除処理
    public function delete($id)
    {
        $book = InertiaTest::findOrFail($id);
        // 削除完了
        $book->delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました'
        ]);
    }
}
