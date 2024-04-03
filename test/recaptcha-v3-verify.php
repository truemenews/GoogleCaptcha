<?php require __DIR__ . '/appengine-https.php';
require_once __DIR__ . '/../vendor/autoload.php';

// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = '';
$secret = '';

// Copy the config.php.dist file to config.php and update it with your keys to run the examples
if ($siteKey == '' && is_readable(__DIR__ . '/config.php')) {
    $config = include __DIR__ . '/config.php';
    $siteKey = $config['v3']['site'];
    $secret = $config['v3']['secret'];
}

// Effectively we're providing an API endpoint here that will accept the token, verify it, and return the action / score to the page
// In production, always sanitize and validate the input you retrieve from the request.
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                  ->setExpectedAction($_GET['action'])
                  ->setScoreThreshold(0.5)
                  ->verify($_GET['token'], $_SERVER['REMOTE_ADDR']);
header('Content-type:application/json');
echo json_encode($resp->toArray());
