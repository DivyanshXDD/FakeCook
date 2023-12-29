<?php
function check_usernme_email_form_user_table($colum_name, $column_value, $conn)
{
    $data = [];
    $data['error'] = false;
    $sql = "SELECT * FROM user WHERE $colum_name = '$column_value'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        if ($colum_name == 'email') {
            $data['error'] = true;
            $data['error_type'] = 'EmailExistError';
        } elseif ($colum_name == 'username') {
            $data['error'] = true;
            $data['error_type'] = 'userNameExistError';
        }
    }
    return $data;
}

function check_if_user_logged_in( $session_data ){
    if ( !isset($session_data["id"] ) OR empty( $session_data['id'])  ) {
        header("location:login.php");
    }
}


function check_username_exist ( $username ,$user_id,  $conn ){
    $error= [];
    $error['error']= false;
    $sql = 'SELECT username FROM user WHERE username = "'.$username .'"  AND id != "'. $user_id  .'"';
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $error['error'] = true;
        $error['error_type'] = 'userNameExistError';
    }
    return $error;
}

