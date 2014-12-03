<?php
    // // get mysql login info
    require_once("config.php");
    require_once 'dbConnect.php';
    // opening db connection
    $db = new dbConnect();
    $mysqli = $db->connect();

    // Create the users table
    $create_users = "CREATE TABLE `web_users` (".
                        "`id` int(11) NOT NULL AUTO_INCREMENT,".
                        "`username` varchar(255) NOT NULL,".
                        "`password` varchar(255) NOT NULL,".
                        "`first_name` varchar(255) NOT NULL,".
                        "`last_name` varchar(255) NOT NULL,".
                        "`email` varchar(255) NOT NULL,".
                        "`character_id` int(11) NULL,".
                        "`status` varchar(255) NOT NULL,".
                        "PRIMARY KEY (`id`),".
                        "UNIQUE KEY `username` (`username`),".
                        "UNIQUE KEY `email` (`email`)".
                    ") ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

    // Create my user
    $create_conner = "INSERT  INTO `web_users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `character_id`, `status`)".
                        "VALUES (NULL, 'thisdood', 'conner', 'Conner', 'Swann', 'cts64@nau.edu', '9',  'Offline')";
    // Create the evaluation user
    $create_david = "INSERT  INTO `web_users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `character_id`, `status`)".
                        "VALUES (NULL, 'soverer', 'php_sucks', 'David', 'Anderson', 'dja52@nau.edu', '8', 'Offline')";
                        
    $result = $mysqli->query($create_users);
    if (!$result){
        echo "<p>Couldn't make users table.</p>";
        echo "-> ".$mysqli->error;
    }
    else {
        echo "<p>Successfully created users table.</p>";
    }

    // $result = $mysqli->query($create_conner);
    // if (!$result){
    //     echo "<p>Couldn't create Conner's User.</p>";
    //     echo "-> ".$mysqli->error;
    // }
    // else {
    //     echo "<p>Successfully created Conner's User.</p>";
    // }
    // $result = $mysqli->query($create_david);
    // if (!$result){
    //     echo "<p>Couldn't create David's User.</p>";
    //     echo "-> ".$mysqli->error;
    // }
    // else {
    //     echo "<p>Successfully created David's User.</p>";
    // }

?>