<?php

class Login extends Dbh{
    public function getUser($username, $password){
        $con = $this->connect();
        $stmt = "SELECT `password` FROM user WHERE `username` = ?;";
        $stmt2 = $con->prepare($stmt);

        if(!$stmt2->execute([$username])){ // dire na nag decision validation kung ano himuon if nag error to sa piyak, dire gin execute or gin sudlan ang mga values sa sql statement nga gin prepare.
            $stmt2 = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }
        if($stmt2->rowCount() == 0){ // dire gin lantaw kung nag exist or wala 
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }
            // nag set up sang variables para gamiton karon sa query
            $pwdHashed = $stmt2->fetchAll(PDO::FETCH_ASSOC); //gin grab ang data sa database as associative array
            $checkPwd = password_verify($password, $pwdHashed[0]["password"]);
            if($checkPwd == false){
                $stmt2 = null;
                header("location: ../login.php?error=stmtFailed");
                exit();
            }elseif($checkPwd == true){ // the password is the same
                
                $stmt2 = $this->connect()->prepare('SELECT * FROM user WHERE `username` = ?;'); // nag prepare liwat kag nag select username or email and password.
                if(!$stmt2->execute([$username])){ //gin check ang email, uid, kag password (same $uid kay amuna ang variable nga gin construct para mag grab sang data sa form nga naga kwa sang uid).
                    $stmt2 = null;
                    header("location: ../login.php?error=stmtfailed");
                    exit();
                }
                if($stmt2->rowCount() == 0){ // dire nag rowcount kung may user or wala
                    $stmt2 = null;
                    header("location: ../login.php?error=noUser");
                    exit();
                }

                $user = $stmt2->fetchAll(PDO::FETCH_ASSOC); // ari di halin ang user nga variable nga ang sulod ya is ang sa database nga gin fetch nga data

                session_start();    // if successfull ma start ang session
                $_SESSION["stat"] = $user[0]["status"];         // dire nag assign sang session name kag gin assign sa variable
                $stmt2 = null;
            }

        
    
    }
}