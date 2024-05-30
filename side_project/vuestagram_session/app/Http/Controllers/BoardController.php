<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    // 최초 게시글
    public function index() {
        $user = Auth::user();

        $boardData = Board::select('boards.*', 'users.name')
                            ->join('users', 'users.id', '=', 'boards.user_id')
                            ->where('boards.user_id', '=', $user->id)
                            ->orderBy('id', 'DESC')
                            ->limit(20)
                            ->get();

        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];
          
        return response()->json($responseData, 200);
    }

    // 추가 게시글 획득
    public function moreIndex($id) {
        $boardData = Board::select('boards.*', 'users.name')
                            ->join('users', 'users.id','=','boards.user_id')
                            ->where('boards.id', '<', $id)
                            ->orderBy('boards.id', 'DESC')
                            ->limit(20)
                            ->get();


        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];
            
        return response()->json($responseData, 200);
    }

     // 게시글 작성
     public function insertBoard(Request $request) {
        $validator = Validator::make(
            $request->only('content', 'img')
            ,[
                'content'=> ['required', 'min:1', 'max:200']
                ,'img' => ['required', 'image']
            ]
        );
        // 유효성 검사 실패 체크
        if($validator->fails()) {
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }
        // 이미지 파일 저장
        $path = $request->file('img')->store('img');
        // 인서트 처리
        // $boardModel = Board::select('boards.*', 'users.name')
        //                         ->join('users', 'users.id', '=', 'boards.id')
        //                         ->where('users.id', Auth::id())
        //                         ->first();

        $boardModel = new Board();

        $boardModel->content = $request->content;
        $boardModel->img = $path;
        $boardModel->user_id = Auth::id();
        $boardModel->save();
        // 레스폰스 처리
        $responseData = [
            'code' => '0'
            ,'msg' => '글 작성 완료'
            ,'data' => $boardModel->toArray()
        ];
        return response()->json($responseData, 200);

        // 내가 한 거
        // $user = Auth::user();        
        // $insertData = [
        //     'content' => $request->content
        //     ,'img' => $request->img
        // ];

        // // insert 데이터 생성
        // $insertData = $request->all();
        // $filePath = $request->file('img')->store('img');
        // $insertData['img'] ='/'.$filePath;
        // // $insertData['like'] = 0;
        // $insertData['user_id'] = $user->id;

        // // insert 처리
        // $BoardInfo = Board::create($insertData);

        // // response 데이터 생성
        // $responseData = [
        //     'code' => '0'
        //     ,'msg' => ''
        //     ,'data' => $BoardInfo
        // ];

        // return response()->json($responseData, 200);
    }
        
    //게시글 삭제 처리
    public function deleteBoard($id) {
        Board::destroy($id);

        $responseData = [
            'code' => '0'
            ,'msg' => '글 삭제 완료'
            ,'data' => $id
        ];
        return response()->json($responseData);
    }

}
