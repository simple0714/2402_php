<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use MyUserValidate;
use MyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request) {
        Log::debug('Start Login', $request->all());

        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
            ,'password_chk' => $request->password_chk
            ,'name' => $request->name
            ,'gender' => $request->gender
            ,'profile' => $request->profile
        ];

        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);

        // 유효성 검사 실패 처리
        if($resultValidate->fails()) {
            Log::debug('login Valridation Error', $resultValidate->errors()->all());
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)
                                    ->withCount('boards')
                                    ->first();

        // 미등록 유저 체크
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');
        }

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);

        // reponse Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        return response()->json($responseData, 200);
    }
    /**
     * 로그아웃
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     */
    public function logout(Request $request) {
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');

        $userInfo = User::find($id);

        MyToken::removeRefreshToken($userInfo);

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $userInfo
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 토큰 재발급
     * 
     * @param Illuminate\Http\Request $requset
     * 
     * @return response() json
     */
    public function reissue(Request $request) {
        Log::debug('***************** 토큰 재발급 시작 *****************');
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        Log::debug('베어러 토큰 : '.$request->bearerToken());
        Log::debug('유저 PK : '.$id);

        // 유저 정보 획득
        // DB::select(('select * from users where id = ?'), $id);
        $resultUserInfo = User::find($id);
        Log::debug('유저 정보 : ', $resultUserInfo->toArray());

        // 유효한 유저 확인
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }
        Log::debug('유효한 유저 확인 완료');

        // 리프래시 토큰 체크
        if($request->bearerToken() !== $resultUserInfo->refresh_token) {
            throw new MyAuthException('E23');
        }
        Log::debug('리프래시 토큰 체크 완료');

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);
        Log::debug('토큰 발행 완료');
         
        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
        Log::debug('토큰 저장 완료');
 
        // reponse Data
        $responseData = [
             'code' => '0'
             ,'msg' => '인증 완료'
             ,'accessToken' => $accessToken
             ,'refreshToken' => $refreshToken
             ,'data' => $resultUserInfo
        ];
         
        Log::debug('***************** 토큰 재발급 완료 *****************');
        
        return response()->json($responseData, 200);


    }

    public function register(Request $request) {
        Log::debug('Start Registration', $request->all());
        
        $requestData = [
            'account' => $request->account,
            'name' => $request->name,
            'gender' => $request->gender,
        ];
    
        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);
    
        // 유효성 검사 실패 처리
        if($resultValidate->fails()) {
            Log::debug('Registration Validation Error', $resultValidate->errors()->all());
            return response()->json(['code' => 'E01', 'msg' => 'Validation Error', 'errors' => $resultValidate->errors()], 400);
        }
    
        // 중복 사용자 체크
        $existingUser = User::where('account', $request->account)->first();
        if ($existingUser) {
            Log::debug('User already exists', ['account' => $request->account]);
            return response()->json(['code' => 'E22', 'msg' => 'User already exists'], 400);
        }
    
        // 비밀번호 해싱
        $hashedPassword = Hash::make($request->password);
    
        // 파일 업로드 처리
        $profilePath = null;
        if ($request->hasFile('profile')) {
            try {
                $profilePath = $request->file('profile')->store('profiles', 'public');
            } catch (\Exception $e) {
                Log::error('Profile upload error: ', ['exception' => $e]);
                return response()->json(['code' => 'E23', 'msg' => 'Profile upload failed'], 500);
            }
        }
    
        // 사용자 저장
        try {
            $newUser = User::create([
                'account' => $request->account,
                'name' => $request->name,
                'password' => $hashedPassword,
                'profile' => $profilePath
            ]);
        } catch (\Exception $e) {
            Log::error('User registration error: ', ['exception' => $e]);
            return response()->json(['code' => 'E24', 'msg' => 'User registration failed'], 500);
        }
    
        // 토큰 발행
        try {
            list($accessToken, $refreshToken) = MyToken::createTokens($newUser);
            MyToken::updateRefreshToken($newUser, $refreshToken);
        } catch (\Exception $e) {
            Log::error('Token creation error: ', ['exception' => $e]);
            return response()->json(['code' => 'E25', 'msg' => 'Token creation failed'], 500);
        }
    
        // 응답 데이터
        $responseData = [
            'code' => '0',
            'msg' => '회원가입 완료',
            'accessToken' => $accessToken,
            'refreshToken' => $refreshToken,
            'data' => $newUser
        ];
        return response()->json($responseData, 201); // 201 Created
    }

}
