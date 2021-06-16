<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    ob_start();
    session_start();
}

// Flash message helper and sessions
// EXAMPLE - flash('register_success', 'You are now registered');
function flash($name = '', $message = '', $class = 'text-center alert alert-success alert-dismissible fade show'){

    if(!empty($name)){
       if(!empty($message) and empty($_SESSION[$name])){
           if(!empty($_SESSION[$name])){
               unset($_SESSION[$name]);
           }

           if(!empty($_SESSION[$name . '_class'])){
               unset($_SESSION[$name . '_class']);
           }

           $_SESSION[$name] = $message;
           $_SESSION[$name . '_class'] = $class;

       } elseif (empty($message) and !empty($_SESSION[$name])){
           $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name . '_class'] : '';

           echo '<div class="'.$class.'" id="msg-flash"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">&times;</span></button>' . $_SESSION[$name] . '</div>';
           unset($_SESSION[$name]);
           unset($_SESSION[$name. '_class']);
       }
    }
}

/// Error messages
function flash_error($name = '', $message = '', $class = 'text-center alert alert-danger alert-dismissible fade show'){

    if(!empty($name)){
        if(!empty($message) and empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }

            if(!empty($_SESSION[$name . '_class'])){
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;

        } elseif (empty($message) and !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name . '_class'] : '';

            echo '<div class="'.$class.'" id="msg-flash"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }
}

//// Check if a user is logged in
function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    } else {
        return false;
    }
}

//// Check for admin ownership
function adminAut(){
    if($_SESSION['has_access'] === 'is_admin'){
        return true;
    } else {
        return false;
    }
}

//// Check for teacher ownership
function teacherAut(){
    if($_SESSION['has_access'] === 'is_teacher'){
        return true;
    } else {
        return false;
    }
}
//// Check for user ownership
function userAut(){
    if($_SESSION['userHasReport'] == $_SESSION['user_id']){
        return true;
    } else {
        return false;
    }
}

function userUrls(){
    $slug =  $_SESSION['slug'];
    $prettyUser = str_replace(" ", "-", strtolower($_SESSION['user_name']));
    $urlUser = URLROOT . '/reports/show/' . $slug . '/' .  $prettyUser;

        return $urlUser;
}

function nameToUpper(){
    $UserUpper = $_SESSION['user_name'];
    $userToUpper = ucwords($UserUpper);

    return $userToUpper;
}

// Load links based on user status
function checkAccessLinks(){

    switch ($_SESSION['has_access']) {
        case "is_admin":
            include APPROOT . '/views/admins/inc/adminLinks.php';
            break;
        case "is_client":
            include APPROOT . '/views/clients/inc/clientLinks.php';
            break;
    }
}


// Load links based on user status
function checkAccessSideLinks(){

    switch ($_SESSION['has_access']) {
        case "is_admin":
            include APPROOT . '/views/admins/inc/adminSideLinks.php';
            break;
        case "is_client":
            include APPROOT . '/views/clients/inc/clientSideLinks.php';
            break;
    }
}


/// Load avatar based on user status
function userAvatar(){

    switch ($_SESSION['has_access']) {
        case "is_admin":
            $setImg = "admin.png";
            break;
        case "is_client":
            $setImg = "student.png";
            break;
    }
    return $setImg;
}


