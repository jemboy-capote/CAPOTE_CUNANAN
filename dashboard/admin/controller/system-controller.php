<?php
include_once '../../../configuration/settings-configuration.php';
include_once __DIR__.'/../../../database/dbconfig.php';

class SystemSettings {
    private $conn;

    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }
    // update system
    public function updateSystem($system_name, $system_phone_number, $system_email, $system_copy_right) 
    {
        $stmt = $this->runQuery('UPDATE system_config SET system_name=:system_name, system_phone_number=:system_phone_number, system_email=:system_email, system_copy_right=:system_copy_right WHERE id =1');
        $exec = $stmt->execute(array(
            ":system_name"          => $system_name,
            ":system_phone_number"  => $system_phone_number,
            ":system_email"         => $system_email,
            ":system_copy_right"    => $system_copy_right
        ));

        if ($exec) {
            $_SESSION['status_title'] = 'Success!';
            $_SESSION['status'] = 'System settings successfully updated';
            $_SESSION['status_code'] = 'success';
            $_SESSION['status_timer'] = 40000;
        } else {
            $_SESSION['status_title'] = 'Oops!';
            $_SESSION['status'] = 'Something went wrong, please try again!';
            $_SESSION['status_code'] = 'error';
            $_SESSION['status_timer'] = 100000;
        }

        header('Location: ../settings');
    }
    //update logo
    public function updateLogo($system_logo)
    {
        $folder = "../../../src/img/" . basename($system_logo);
        chmod($folder, 0755);
        $stmt = $this->runQuery('UPDATE system_config SET system_logo=:system_logo WHERE id =1');
        $exec = $stmt->execute(array(
            ":system_logo"          => $system_logo,
        ));

        if ($exec && move_uploaded_file($_FILES['system_logo']['tmp_name'], $folder)) {
            $_SESSION['status_title'] = 'Success!';
            $_SESSION['status'] = 'System logo successfully updated';
            $_SESSION['status_code'] = 'success';
            $_SESSION['status_timer'] = 40000;
        } else {
            $_SESSION['status_title'] = 'Oops!';
            $_SESSION['status'] = 'Something went wrong, please try again!';
            $_SESSION['status_code'] = 'error';
            $_SESSION['status_timer'] = 100000;
        }

        header('Location: ../settings');

    }
    //update google recaptcha
    public function updateRecaptcha($site_key, $site_secret_key)
    {
        $stmt = $this->runQuery('UPDATE google_recaptcha_api SET site_key=:site_key, site_secret_key=:site_secret_key WHERE id =1');
        $exec = $stmt->execute(array(
            ":site_key"                =>$site_key,
            ":site_secret_key"         =>$site_secret_key,        
        ));

        if ($exec) {
            $_SESSION['status_title'] = 'Success!';
            $_SESSION['status'] = 'Google Recaptcha successfully updated';
            $_SESSION['status_code'] = 'success';
            $_SESSION['status_timer'] = 40000;
        } else {
            $_SESSION['status_title'] = 'Oops!';
            $_SESSION['status'] = 'Something went wrong, please try again!';
            $_SESSION['status_code'] = 'error';
            $_SESSION['status_timer'] = 100000;
        }

        header('Location: ../settings');
    }
    //update SMTP
    public function updateSMTP($email, $password)
    {
        $stmt = $this->runQuery('UPDATE email_config SET email=:email, password=:password WHERE id =1');
        $exec = $stmt->execute(array(
            ":email"                =>$email,
            ":password"             =>$password,        
        ));

        if ($exec) {
            $_SESSION['status_title'] = 'Success!';
            $_SESSION['status'] = 'System email successfully updated';
            $_SESSION['status_code'] = 'success';
            $_SESSION['status_timer'] = 40000;
        } else {
            $_SESSION['status_title'] = 'Oops!';
            $_SESSION['status'] = 'Something went wrong, please try again!';
            $_SESSION['status_code'] = 'error';
            $_SESSION['status_timer'] = 100000;
        }

        header('Location: ../settings');
    }
    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
}

// Check if the form has been submitted for updating the system
if (isset($_POST['btn-update-system'])) {
    $system_name            = trim($_POST['system_name']);
    $system_phone_number    = trim($_POST['system_phone_number']);
    $system_email           = trim($_POST['system_email']);
    $system_copy_right      = trim($_POST['system_copy_right']);

    $systemSettings = new SystemSettings();
    $systemSettings->updateSystem($system_name, $system_phone_number, $system_email, $system_copy_right);
}

if (isset($_POST['btn-update-logo'])) {
    $system_logo = $_FILES['system_logo']['name'];

    $systemSettings = new SystemSettings();
    $systemSettings->updateLogo($system_logo);
}

if (isset($_POST['btn-update-recaptcha'])) {
    $site_key           = trim($_POST['site_key']);
    $site_secret_key    = trim($_POST['site_secret_key']);

    $systemSettings = new SystemSettings();
    $systemSettings->updateRecaptcha($site_key, $site_secret_key);
}

if (isset($_POST['btn-update-smtp'])) {
    $email       = trim($_POST['email']);
    $password    = trim($_POST['password']);

    $systemSettings = new SystemSettings();
    $systemSettings->updateSMTP($email, $password);
}
?>
