<?php
    function checkUser($name,$pass){
        $con=connect();
        $stmt=$con->prepare("select *from account where ten_dn='$name' and mat_khau='$pass' and quen='Khách hàng");
        $stmt->execute();
        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->FetchAll();
        if(count($kq)>0){
            return $kg[0]['quen'];
        }
    }
    function getUserInfor($name,$pass){
        $con=connect();
        $stmt=$con->prepare("select *from account where ten_dn='$name' and mat_khau='$pass' and quen='Khách hàng");
        $stmt->execute();
        $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->FetchAll();
        return $kq;
    }
?>
