<?php
session_start();
$form = ["username" => "", "email" => "", "issue" => "", "comment" => ""];
$_SESSION["form"] = &$form;
$message = "";

function getAndSanitizeValue()
{
    global $form;
    foreach (array_keys($form) as $type) {
        $form[$type] = filter_var($_POST[$type], FILTER_SANITIZE_STRING);
        if ($type !== "comment") {
            $form[$type] = preg_replace("/\s+/", "", $form[$type]);
        }
    }
    return $form;
}

function validateValue()
{
    global $form, $message;
    if (filter_var($form["email"], FILTER_VALIDATE_EMAIL)) {
        header("Location: success.php");
        exit;
    } else {
        $message = "* Failed to submit your form. Make sur you entered the right email address.";
    }
    return $message;
};

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form = getAndSanitizeValue();
    $message = validateValue();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Contact Form</title>
</head>

<body>
    <div class="App">
        <div class="img-container">
            <img src="./img/form.svg" alt="">
        </div>
        <div class="form-container">
            <h1>Contact Form</h1>
            <form method="post" action="">
                <input type="text" name="username" id="username" value="<?= $form["username"] ?>" required placeholder="Username">
                <input type="email" name="email" id="email" value="<?= $form["email"] ?>" required placeholder="Email">
                <select name="issue" id="issue" value="<?= $form["issue"] ?>" required>
                    <option value="" selected disabled hidden>Select an option</option>
                    <option value="query">Query</option>
                    <option value="feedback">Feedback</option>
                    <option value="complaint">Complaint</option>
                    <option value="other">Other</option>
                </select>
                <textarea name="comment" id="comment" cols="30" rows="10" required placeholder="Write your feedback here..."><?= $form["comment"] ?></textarea>
                <input type="submit" value="Submit">
            </form>
            <p><?= $message ?></p>
        </div>
    </div>
    <p><?php print_r($_SESSION["form"]) ?></p>
</body>

</html>