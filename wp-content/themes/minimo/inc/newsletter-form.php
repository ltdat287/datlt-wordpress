<?php
require_once( '../../../../wp-load.php' );

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) 
{
    // get the form data
    $email = filter_var( trim( $_POST['newsemail'] ), FILTER_SANITIZE_EMAIL);
    
    // check that data was sent to the mailer
    if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ))
    {
        header("HTTP/1.0 403 Forbidden");
        echo "Sorry, an error occured during your sign up. Please try later.";
        exit;
    }

    // set the recipient email address
    $recipient = $_POST["recipient"];

    // set the email subject
    $subject = "Newsletter Sign Up";

    // build the email content
    $email_content .= "$email signed up to your newsletter.";

    // build the email headers
    $email_headers = "From: $name <$email>";

    // send the email
    if ( wp_mail( $recipient, $subject, $email_content, $email_headers ) ) 
    {
        header("HTTP/1.0 200 OK");
        echo "Thanks for your interest!";
    } 
    else 
    {
        header("HTTP/1.0 500 Internal Server Error");
        echo "Sorry, an error occured during your sign up. Please try later.";
    }
} 
else 
{
    header("HTTP/1.0 403 Forbidden");
    echo "Sorry, an error occured during your sign up. Please try later.";
}