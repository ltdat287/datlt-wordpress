<?php
require_once( '../../../../wp-load.php' );

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // get the form date and remove whitespace.
    $firstname = strip_tags( trim ( $_POST["firstname"] ) );
    $firstname = str_replace( array( "\r","\n" ), array( " "," " ), $firstname );
    
    $lastname  = strip_tags( trim ( $_POST["lastname"] ) );
    $lastname  = str_replace( array( "\r","\n" ), array( " "," " ), $lastname );
    
    $email     = filter_var( trim( $_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone     = trim( $_POST["phone"] );
    
    $message   = trim( $_POST["message"] );
    
    // check that data was sent to the mailer
    if ( empty( $firstname ) OR empty( $lastname ) OR empty( $phone ) OR empty( $message ) OR ! filter_var( $email, FILTER_VALIDATE_EMAIL ))
    {
        header("HTTP/1.0 400 Bad Request");
        echo "An error occurred and your message could not be sent.";
        exit;
    }

    // set the recipient email address
    $recipient = $_POST["recipient"];

    // set the email subject.
    $subject = $_POST["subject"];

    // build the email content
    $email_content  = "Name: $firstname $lastname\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // build the email headers
    $email_headers = "From: $name <$email>";

    // send the email
    if ( wp_mail( $recipient, $subject, $email_content, $email_headers ) ) 
    {
        header("HTTP/1.0 200 OK");
        echo "Thanks! Your message has been sent, we'll get back to you shortly.";
    } 
    else 
    {
        header("HTTP/1.0 500 Internal Server Error");
        echo "An error occurred and your message could not be sent.";
    }
} 
else 
{
    header("HTTP/1.0 403 Forbidden");
    echo "An error occurred and your message could not be sent.";
}