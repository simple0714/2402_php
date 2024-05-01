<?php
namespace model;

class UsersModel extends Model {
    //특정 유저를 조회하는 메소드
    public function getUserInfo($paramArr) {
        try{
            $sql = " SELECT * "
            ." FROM users "
            ." WHERE ";
        
            //WHERE절 동적 생성
            $arrWhere = [];
            foreach($paramArr as $Key => $val) {
                $arrWhere[] = $Key. " = :".$Key;
            }

            //WHERE절 추가
            $sql .= implode(" and ", $arrWhere);


            //데이터 획득
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            $result = $stmt->fetchAll();

            return count($result) >0 ? $result[0] : $result;
        } catch (\Throwable $th) {
            echo "UsersModel -> getUserInfo(), ".$th->getMessage();
            exit;
        }
    }
}

// $opj = new UserModel();
// $obj->getUserInfo([]);