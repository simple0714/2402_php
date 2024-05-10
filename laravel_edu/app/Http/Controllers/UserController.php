<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        // --------------------
        // 쿼리 빌더
        // --------------------
        //$result = DB::select('select * from users');
        // $result = DB::select(
        //     "SELECT * FROM users WHERE name = :name"
        //     ,['name' => '홍갑동']
        // );
        // $result = DB::select(
        //     "SELECT * FROM users WHERE name = ? or name = ?"
        //     ,['홍갑동', '홍갑순']
        // );

        // $result = DB::select(
        //     "SELECT * FROM users WHERE deleted_at is not null"
        // );

        //insert
        // $sql = 'INSERT INTO users(name, email, password) VALUES(?,?,?)';
        // $data = ['김철수', 'admin4@admin.com', Hash::make('qwer1234!')];
        // DB::beginTransaction(); //트랜잭션 시작
        // $result = DB::insert($sql, $data);
        
        // if(!$result){
        //     DB::rollBack(); //롤백    
        // } else {
        //     DB::commit(); //커밋
        // }

        //update
        // $sql = 'UPDATE users SET deleted_at = null WHERE id=?';
        // $data =[5];
        // $result = DB::update($sql, $data);

        //delete
        // $sql = 'DELETE FROM users where id = ?';
        // $data = [10];
        // $result = DB::delete($sql, $data);

        //--------------------------------------------------------
        // 쿼리 빌더 체이닝
        //--------------------------------------------------------
        // users 테이블 모든 데이터 조회
        // $result = DB::table('users')->get();
        
        // 이름이 홍길동인 유저만 조회
        // $result = DB::table('users')->where('name', '홍길동')->get();
        // where절 안의 $operator ‘=’은 생략 가능

        //select * from users where id = ? or = ?; [3, 4]
        // $result = DB::table('users')
        //             ->where('id', 3)
        //             ->orWhere('id', 4)
        //             ->get();
        
        //select * from users where name = ? and id =?; ['홍길동', 3]
        // $result = DB::table('users')
        //                 ->where('name', '홍길동')
        //                 ->where('id', 4)
        //                 ->get();

        //select name from users order by name ASC;
        // $result = DB::table('users')
        //                 ->select('name')
        //                 ->orderBy('name', 'asc')
        //                 //asc면 안 적어도 됨
        //                 ->get();

        //select * from users where id in (?,?); [2,5]
        $result = DB::table('users')
                    ->whereIn('id',[2,5])
                    ->get();
        
        //select * from users where deleted_at is null;
        $result = DB::table('users')
                    ->whereNull('deleted_at')
                    ->get();

        //2023년에 가입한 사람만 출력
        $result = DB::table('users')
                    ->whereYear('created_at','2023')
                    ->get();
                //select * from users where year(created_at) = ? <<- 라라벨의 쿼리, 속도 이슈가 있을 시 밑으로 변환
                //select * from users created_at beetween 20230101000000 and 20231231235959

        //성별 회원의 수를 구하자
        // 
        $result = DB::table('users')
                    ->select('gender', DB::raw('COUNT(gender) cnt'))
                    ->groupBy('gender')
                    ->having('gender', '=', 'M')
                    ->get();


        //select id, name from users order by id limit ? offset ?; [1, 2]
        $result = DB::table('users')
                    ->select('id', 'name')
                    ->orderBy('id')
                    ->limit(1)
                    ->offset(2)
                    ->get();
        // $reqData = 1; //유저가 1또는 빈 값인 데이터 전달
        // $result = DB::table('users')
        //             ->when($reqData, function($query, $reqData) {
        //                 $query->where('id', $reqData);
        //             })
        //             ->dd();    

        //first() : 쿼리 결과에서 가장 첫번째 레코드만 반환
        // $result = DB::table('users')->first();
        //count() : 쿼리 결과의 레코드 수를 반환
        // $result = DB::table('users')->count();
        //find($id) : 지정된 기본키에 해당하는 레코드를 반환
        // $result = DB::table('users')->find(3);

        //insert
        // $result = DB::table('users')->insert([
        //     'name' => '김영희'
        //     ,'email' => 'kim@admin.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     , 'gender' => 'F'
        // ]);
        
        //update
        // $result = DB:: table('users')
        //         ->where('id', 11)
        //         ->update([
        //     'email' => 'kin@naver.com'
        // ]);

        //delete
        // $result = DB::table('users')
        //             ->where('id', 11)
        //             ->delete();

        //-------------------------------------------
        //Eloquent Model
        //-------------------------------------------
        $result = User::all();
        // $result = User::find(3);

        //upsert
        // $data = [
        //     'name' => '김영희'
        //     ,'email' => 'kim@naver.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
        // ];

        // $result = User::create($data);
        // DB::beginTransaction();
        // $target = User::find(13);
        // $target->gender = 'M';
        // $target = $target->save();
        // DB::comit();

        //delete
        // $result = User::destroy(13);
    
        //소프트 딜리트 된 데이터 조회
        $result = User::withTrashed()->get(); //소프트 딜리트 포함
        $result = User::onlyTrashed()->get(); //소프트 딜리트만

        //소프트 딜르트 된 데이터 복원
        $result = User::where('id', 13) ->restore();

        return var_dump($result);
    }
}
