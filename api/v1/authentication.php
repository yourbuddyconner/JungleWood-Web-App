<?php 
$app->get('/session', function() {
    $db = new DbHandler();
    $session = $db->getSession();
    $response["id"] = $session['id'];
    $response["email"] = $session['email'];
    $response["name"] = $session['name'];
    echoResponse(200, $session);
});

$app->post('/login', function() use ($app) {
    require_once 'passwordHash.php';
    //grab the response
    $r = json_decode($app->request->getBody());
    //validate
    verifyRequiredParams(array('email', 'password'),$r->user);
    $db = new DbHandler();

    //build response
    $response = array();
    $password = $r->user->password;
    $email = $r->user->email;
    $user = $db->getOneRecord("select id,first_name,last_name,username,password,email from web_users where email='$email'");
    //if there's a user in the session
    if ($user != NULL) {
        if(passwordHash::check_password($user['password'],$password)){
        $response['status'] = "success";
        $response['message'] = 'Logged in successfully.';
        $response['name'] = $user['name'];
        $response['id'] = $user['id'];
        $response['email'] = $user['email'];
        $response['first_name'] = $user['first_name'];
        $response['last_name'] = $user['last_name'];
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $user['name'];
        } else {
            $response['status'] = "error";
            $response['message'] = 'Login failed. Incorrect credentials';
        }
    //no user = no access
    }else {
            $response['status'] = "error";
            $response['message'] = 'No such user is registered';
        }
    echoResponse(200, $response);
});
$app->post('/signUp', function() use ($app) {
    //grab the response
    $r = json_decode($app->request->getBody());
    //verify everything's there
    verifyRequiredParams(array('first_name', 'last_name', 'username','email', 'password'),$r->user);
    require_once 'passwordHash.php';
    $db = new DbHandler();

    //prepare response
    $response = array();
    $first_name = $r->user->first_name;
    $last_name = $r->user->last_name;
    $username = $r->user->username;
    $email = $r->user->email;
    $password = $r->user->password;
    $isUserExists = $db->getOneRecord("select 1 from web_users where email='$email' or username='$username'");
    //if the user doesn't already exist
    if(!$isUserExists){
        //hash the password
        $r->user->password = passwordHash::hash($password);
        $table_name = "web_users";
        $column_names = array('first_name', 'last_name', 'email', 'username', 'password');
        //insert that ish
        $result = $db->insertIntoTable($r->user, $column_names, $table_name);
        if ($result != NULL) {
            //let the app know it's done
            $response["status"] = "success";
            $response["message"] = "User account created successfully";
            $response["id"] = $result;
            if (!isset($_SESSION)) {
                session_start();
            }
            //start the session on this end
            $_SESSION['id'] = $response["id"];
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            echoResponse(200, $response);
        } else {
            //let the app know what's up
            $response["status"] = "error";
            $response["message"] = "Failed to create user. Please try again";
            echoResponse(201, $response);
        }         
    //you can't create two of the same user, dummy...   
    }else{
        $response["status"] = "error";
        $response["message"] = "A user with the provided email already exists!";
        echoResponse(201, $response);
        echo var_dump($isUserExists);
    }
});
$app->get('/logout', function() {
    $db = new DbHandler();
    $session = $db->destroySession();
    $response["status"] = "info";
    $response["message"] = "Logged out successfully";
    echoResponse(200, $response);
});
?>