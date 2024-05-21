<?php
namespace App\Exceptions;

use Exception;

class MyAuthException extends Exception {
    /**
     * 에러 메세지 리스트
     * 
     * @return Array 에러메세지 배열
     */
    public function context() {
        return [
            'E20' => ['status' => 401, 'msg' => '존재하지 않는 유저입니다.'],
            'E21' => ['status' => 401, 'msg' => '비밀번호가 올바르지 않습니다.'],
            'E22' => ['status' => 401, 'msg' => '리프래시 토큰 저장 에러.']
        ];
    }
}