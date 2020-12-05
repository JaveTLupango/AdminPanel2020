
<form method="POST">
<?php

$hash_enc = "";
$hash_dec = "";

	use \Chirp\Cryptor;

if (isset($_POST['btn']))
{
	require 'hashing.php';

  $token = $_POST['hash'];

  //$encryption_key = 'vpnproviderph.site-strong-vpn.tech-Jave-Lupango';
  $key = Cryptor::sec_key();
  $cryptor = new Cryptor($key);
  $crypted_token = $cryptor->encrypt($token);
  unset($token);  
  $hash_enc = $crypted_token;
  $token = $cryptor->decrypt($crypted_token);
  $hash_dec = $token;

  $tag = preg_replace("/[^a-zA-Z0-9<>]+/", " ",  $token);
}
	
?>

	<textarea width="1000px" name="hash"></textarea><br><br>
	<input type="submit" name="btn" value="hash"><br><br>
	<textarea width="1000px"><?php echo $hash_enc ; ?></textarea><br><br>
  <textarea width="1000px"><?php echo $hash_dec ; ?></textarea><br><br>
  <textarea width="1000px"><?php echo $tag ; ?></textarea><br><br>
</form>


<?php

  echo "<br/>";
  echo "<br/>";
  echo "<br/>";
  echo "<br/>";
  echo "<br/>";

  echo $hash_enc;

  echo "<br/>";
  echo "<br/>";

$data = "@@_-/////ssss///' OR 1 = 1 OR 'a' = 'a'";

echo  preg_replace("/[^a-zA-Z0-9@_-]+/", "", $data);


?>