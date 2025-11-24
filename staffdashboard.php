<?php
require('vendor/autoload.php');

use Jm\Webproject\App;
use Jm\Webproject\Loan;

$app = new App();

$title = "Staff Dashboard";
$message = "Staff Dashboard";

if (empty($_SESSION['email'] || empty($_SESSION['account_id']) ) ) {
    header("location: /signin.php");
}

$account_id = $_SESSION["account_id"];
$loan = new Loan();
$user_loans = $loan->getOustandingLoans();

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
// load the template into memory
$template = $twig->load('staffdashboard.html.twig');
// add some variables for twig to render
echo $template->render([
    'title' => $title,
    'message' => $message,
    'userloans' => $user_loans
]);
