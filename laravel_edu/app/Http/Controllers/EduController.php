<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduController extends Controller
{
    public function index() {
        $arr = [
            'id' => 1
            ,'name' => '홍길동'
            ,'tel' => '01011112222'
        ];
        return view('edu')
            ->with('gender', 'asd')
            ->with('data', $arr)
            ->with('data2', []);
    }
}
