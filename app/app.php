<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";
    require_once __DIR__."/../src/Contact.php";
    $app = new Silex\Application();

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                <title></title>
            </head>
            <body>
                <div class='container'>
                    <h1>Enter information about Job Opening</h1>
                    <form action='/view_job_post'>
                        <div class='form-group'>
                            <label for='job_title'>Job Title:</label>
                            <input id='job_title' name='job_title' class='form-control' type='text'>
                        </div>
                        <div class='form-group'>
                            <label for='job_description'>Job Description:</label>
                            <input id='job_description' name='job_description' class='form-control' type='text'>
                        </div>
                        <h2>Contact Information</h2>
                        <div class='form-group'>
                            <label for='contact_name'>Name:</label>
                            <input id='contact_name' name='contact_name' class='form-control' type='text'>
                        </div>
                        <div class='form-group'>
                            <label for='contact_email'>Email:</label>
                            <input id='contact_email' name='contact_email' class='form-control' type='text'>
                        </div>
                        <div class='form-group'>
                            <label for='contact_phone'>Phone Number:</label>
                            <input id='contact_phone' name='contact_phone' class='form-control' type='text'>
                        </div>
                        <button type='submit' class='btn'>Go!</button>
                    </form>
                </div>
            </body>
        </html>
        "
        ;
    });
    $app->get("/view_job_post", function(){
            $contact_info = new Contact($_GET["contact_name"], $_GET["contact_email"], $_GET["contact_phone"]);
            $job_post = new JobOpening($_GET["job_title"], $_GET["job_description"], $contact_info);
            $output = '';
            if($contact_info->checkNumber()) {
                $output .= "<h1>". $job_post->getTitle() . "</h1> \n";
                $output .= "<h2>" . $job_post->getDescription() . "</h2> \n";
                $output .= "\n <h2>Contact Information</h2> \n";
                $output .= "<h3>" . $job_post->getContact()->getName() . "</h3> \n";
                $output .= "<h3>" . $job_post->getContact()->getEmail() . "</h3> \n";
                $output .= "<h3>" . $job_post->getContact()->getPhone() . "</h3> \n";
            } else {
                $output .= "<h1>Invalid Phone Number, Try Again!</h1>";
            }
            return $output;
    });
    return $app;
?>
