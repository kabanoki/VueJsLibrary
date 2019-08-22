<?php 
// サイトキー
$key = '6LcrnbMUAAAAAL1gGBS6l7Mreo-MyyS6cEmBbywp';
// シークレット キー
$secret = '6LcrnbMUAAAAAMtmLlVsjKILKq7IUwtmcqwwSC9p';

if (isset($_POST['name']) && !empty($_POST['password'])) 
{
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['recaptcha']);
    $reCAPTCHA = json_decode($verifyResponse);
    if ($reCAPTCHA->success) {
        $result = 'success';
    } else {
        $result = $reCAPTCHA->{'error-codes'}[0];
        /* ERROR CODE
        missing-input-secret	The secret parameter is missing.
		invalid-input-secret	The secret parameter is invalid or malformed.
		missing-input-response	The response parameter is missing.
		invalid-input-response	The response parameter is invalid or malformed.
		bad-request	The request is invalid or malformed.
		timeout-or-duplicate	The response is no longer valid: either is too old or has been used previously. 5分らしい
        */
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $key ?>"></script>
	<script>
	grecaptcha.ready(function() {
		grecaptcha.execute('<?php echo $key ?>', {action: 'login'}).then(function(token) {
	 		var reCAPTCHA = document.getElementById('recaptcha');
	      	reCAPTCHA.value = token;
	    });
	});
	</script>
</head>
<body>
	<p style="color:#f00; font-weight: bold;"><?php echo isset($result) ? $result:'' ?></p>
    <form method="post">
      <input type="text" name="name" value="">
      <input type="password" name="password" value="">
      <input type="hidden" name="recaptcha" id="recaptcha" />
      <button type="submit">送信</button>
    </form>
</body>
</html>