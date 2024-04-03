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

// reCAPTCHA supports 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = 'en';

// The v3 API lets you provide some context for the check by specifying an action.
// See: https://developers.google.com/recaptcha/docs/v3
$pageAction = 'examples/v3scores';

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,minimum-scale=1">
<link rel="shortcut icon" href="https://www.gstatic.com/recaptcha/admin/favicon.ico" type="image/x-icon"/>
<link rel="canonical" href="https://recaptcha-demo.appspot.com/recaptcha-v3-request-scores.php">
<script type="application/ld+json">{ "@context": "http://schema.org", "@type": "WebSite", "name": "reCAPTCHA demo - Request scores", "url": "https://recaptcha-demo.appspot.com/recaptcha-v3-request-scores.php" }</script>
<meta name="description" content="reCAPTCHA demo - Request scores" />
<meta property="og:url" content="https://recaptcha-demo.appspot.com/recaptcha-v3-request-scores.php" />
<meta property="og:type" content="website" />
<meta property="og:title" content="reCAPTCHA demo - Request scores" />
<meta property="og:description" content="reCAPTCHA demo - Request scores" />
<link rel="stylesheet" type="text/css" href="/test/examples.css">
<title>reCAPTCHA demo - Request scores</title>
<header>
    <h1>reCAPTCHA demo</h1><h2>Request scores</h2>
    <p><a href="/test">↩️ Home</a></p>
</header>
<main>
<?php
//var_dump($siteKey, $secret);die;
if ($siteKey === '' || $secret === ''):
?>
    <h2>Add your keys</h2>
    <p>If you do not have keys already then visit <kbd> <a href = "https://www.google.com/recaptcha/admin">https://www.google.com/recaptcha/admin</a></kbd> to generate them. Edit this file and set the respective keys in <kbd>$siteKey</kbd> and <kbd>$secret</kbd>. Reload the page after this.</p>
    <?php
else:
    // Add the g-recaptcha tag to the form you want to include the reCAPTCHA element
    ?>
    <p>The reCAPTCHA v3 API provides a confidence score for each request.</p>
    <p><strong>NOTE:</strong>This is a sample implementation, the score returned here is not a reflection on your Google account or type of traffic. In production, refer to the distribution of scores shown in <a href="https://www.google.com/recaptcha/admin" target="_blank">your admin interface</a> and adjust your own threshold accordingly. <strong>Do not raise issues regarding the score you see here.</strong></p>
    <ol id="recaptcha-steps">
        <li class="step0">reCAPTCHA script loading</li>
        <li class="step1 hidden">
            <kbd>grecaptcha.ready()</kbd> fired, calling <pre>grecaptcha.execute('<?php echo $siteKey; ?>', {action: '<?php echo $pageAction; ?>'})'</pre>
        </li>
        <li class="step2 hidden">
            Received token from reCAPTCHA service, sending to our backend with:<pre class="token">fetch('/test/recaptcha-v3-verify.php?token=abc123</pre>
        </li>
        <li class="step3 hidden">
            Received response from our backend: <pre class="response">{"json": "from-backend"}</pre>
        </li>
    </ol>

    <p><a href="/test/recaptcha-v3-request-scores.php">Try again</a></p>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
    <script>
        const steps = document.getElementById('recaptcha-steps');
        grecaptcha.ready(function() {
            document.querySelector('.step1').classList.remove('hidden');
            grecaptcha.execute('<?php echo $siteKey; ?>', {action: '<?php echo $pageAction; ?>'}).then(function(token) {
                document.querySelector('.token').innerHTML = 'fetch(\'/test/recaptcha-v3-verify.php?action=<?php echo $pageAction; ?>&token=\'' + token;
                document.querySelector('.step2').classList.remove('hidden');

                fetch('/test/recaptcha-v3-verify.php?action=<?php echo $pageAction; ?>&token='+token).then(function(response) {
                    response.json().then(function(data) {
                        document.querySelector('.response').innerHTML = JSON.stringify(data, null, 2);
                        document.querySelector('.step3').classList.remove('hidden');
                    });
                });
            });
        });
    </script>
<?php
endif;?>

</main>
<!-- Google Analytics - just ignore this -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123057962-1"></script>
<script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-123057962-1');</script>
