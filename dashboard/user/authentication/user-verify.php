<?php
require_once 'user-class.php';
$user = new USER();

if (empty($_GET['id']) || empty($_GET['code'])) {
    $user->redirect('');
}

if (isset($_GET['id']) && isset($_GET['code'])) {
    $id = base64_decode($_GET['id']);
    $code = $_GET['code'];
    
    $status_Y = "Y";
    $status_N = "N";
    
    $stmt = $user->runQuery("SELECT id, status FROM users WHERE id = :id AND tokencode = :tokencode LIMIT 100");
    $stmt->execute(array(":id" => $id, ":tokencode" => $code));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($stmt->rowCount() > 0) {
        if ($row['status'] == $status_N) {
            $stmt = $user->runQuery("UPDATE users SET status = :status WHERE id = :id");
            $stmt->bindparam(":status", $status_Y);
            $stmt->bindparam(":id", $id);
            $stmt->execute(); 
            
            $msg = "
                <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
                <strong>Welcome!</strong> Your account is now activated.
                </div>
                <a href='./' style='text-decoration:none; display: flex; justify-content: right; font-size: 1.2rem; color:#000000; font-weight:600;'>Signin here <img src='../../src/img/caret-right-fill.svg' style='margin-top: .5rem; margin-left: 5px;' width='15' height='15' alt='Arrow right'></a>";
        } else {
            $msg = "
                <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
                <strong>Hey!</strong> Your account is already activated.
                </div>
                <a href='./' style='text-decoration:none; display: flex; justify-content: right; font-size: 1.2rem; color:#000000; font-weight:600;'>Signin here <img src='../../src/img/caret-right-fill.svg' style='margin-top: .5rem; margin-left: 5px;' width='15' height='15' alt='Arrow right'></a>";
        }
    } else {
        $msg = "
            <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
            <strong>Warning!</strong> No account found.
            </div>";
    } 
}
?>