<?php

//Test 1
//Validating that First Names and Surnames cannot contain numbers or special characters

//Invalid test data
$invalidFirstName1 = "John1";
$invalidSurname1 = "Amy!";
$invalidFirstName2 = "a";
$invalidSurname2 = "";
//Valid test data
$validFirstName1 = "Mark";
$validSurname1 = "Jefferson";
$validFirstName2 = "David";
$validSurname2 = "Jon";

//Function to run the test
function testNames($name){
    if((preg_match("/^[a-zA-Z]+$/", $name) && (strlen($name) > 2))){
        //Valid name
        return "$name + is valid";
    }

    else{
        //Invalid name
        return "$name + isn't valid";
    }
}

//Running the test
echo "<h3> Validation Test 1: First Name & Surname Format </h3>";
echo testNames($invalidFirstName1) . "<br>";
echo testNames($invalidSurname1) . "<br>";
echo testNames($invalidFirstName2) . "<br>";
echo testNames($invalidSurname2) . "<br><br>";
echo testNames($validFirstName1) . "<br>";
echo testNames($validSurname1) . "<br>";
echo testNames($validFirstName2) . "<br>";
echo testNames($validSurname2) . "<br>";


//Test 2
//Validating that an email is valid
$invalidEmail = "123@456";
$validEmail = "abc@gmail.com";

//Function to run the test
function testEmails($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Vlid email
        return "$email + is valid";
    }
    
    else {
        //Invalid email
        return "$email + isn't valid";
    }
}

//Running the test
echo "<h3> Validation Test 2: Email Format </h3>";
echo testEmails($invalidEmail) . "<br>";
echo testEmails($validEmail) . "<br>";


//Test 3
//Vlidating that a password is more than 5 characters long
$invalidPassword = "12345";
$validPassword = "123456";

//Function to run the test
function testPassword($password){
    if(strlen($password) > 5){
        //Valid password
        return "$password + is valid";
    }

    else{
        //Invalid password
        return "$password + is invalid";
    }
}

//Running the test
echo "<h3> Validation Test 3: Password length </h3>";
echo testPassword($invalidPassword) . "<br>";
echo testPassword($validPassword) . "<br>";