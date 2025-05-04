<?php
//Name cannot be less than 2 characters or have numbers or special characters in them
function testNames($name){
    if((preg_match("/^[a-zA-Z]+$/", $name) && (strlen($name) > 2))){
        //Valid name
        return true;
    }

    else{
        //Invalid name
        return false;
    }
}

//Testing for a valid email
function testEmails($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Vlid email
        return true;
    }
    
    else {
        //Invalid email
        return false;
    }
}

//Making sure a password is greater than 5 characters
function testPassword($password){
    if(strlen($password) > 5){
        //Valid password
        return true;
    }

    else{
        //Invalid password
        return false;
    }
}