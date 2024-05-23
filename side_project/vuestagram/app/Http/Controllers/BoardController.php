<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use MyToken;
use MyBoardValidate;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * 초기 보드리스트 획득
     * 
     * @param string $id 마지막 게시글 pk
     * 
     * @return response() json
     */
    public function index($id) {
        $requestData = [
            'id' => $id
        ];

        //유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        //유효성 검사 실패시 처리
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }

        // 게시글 정보 획득 
        //  -$id == 0 일경우, 최초 게시글 습득
        //  -$id != 0 일경우, 해당 id까지의 모든 데이터 습득
        $boardList = Board::join('users', 'boards.user_id', '=', 'users.id')
                ->select('boards.*', 'users.name')
                ->orderBy('boards.id', 'DESC')
                ->when($id, function($query, $id) {
                    return $query->where('boards.id','>=', $id);
                })
                ->unless($id, function($query, $id) {
                    return $query->limit(20);
                })
                // ->limit(20)
                ->get();

        // id != 0
        // Board::join('users', 'board.user_id', '=', 'users.id')
        //         ->select('boards.*', 'users.name')
        //         ->orderBy('id', 'DESC')
        //         ->where('id', '>=', $id)
        //         ->get();

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $boardList->toArray()
        ];

        return response()->json($responseData, 200);
    }
    /**
     * 추가 보드리스트 획득
     * 
     * @param string $id 마지막 게시글 pk
     * 
     * @return response() json
     */
    public function addIndex($id) {
        $requestData = [
            'id' => $id
        ];

        //유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        //유효성 검사 실패시 처리
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }

        // 게시글 정보 획득 
        $boardList = Board::join('users', 'boards.user_id', '=', 'users.id')
                            ->select('boards.*', 'users.name')
                            ->orderBy('boards.id', 'DESC')
                            ->where('boards.id', '<', $id)
                            ->limit(20)
                            ->get();

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $boardList->toArray()
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 글 작성
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return string json
     */
    public function store(Request $request) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'content' => $request->content
            ,'img' => $request->img
        ];

        //유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        //유효성 검사 실패시 처리
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }

        // insert 데이터 생성
        $insertData = $request->only('content');
        $insertData['user_id'] = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        $filePath = $request->file('img')->store('img');
        $insertData['img'] ='/'.$filePath;
        $insertData['like'] = 0;

        // insert 처리
        $BoardInfo = Board::create($insertData);

        // response 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $BoardInfo
        ];

        return response()->json($responseData, 200);
    }
}
