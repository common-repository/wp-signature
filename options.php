<?php
if ($_POST["signature"]<>"") {
	update_option("wp_signature",$_POST["signature"]);
	echo "<div class='updated fade'>Changes were saved</div>";
}
?>

<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>WP Signature</h2>
<em>It is easy to use. Just select your unique picture, avatar, or signature to describe you from the gallery and show it on post footer. If you haven't upload the picture yet, then upload it below</em>

<p><iframe src="media-upload.php" width="100%"></iframe></p>

<form method="post">
<h3>Current Signature</h3>
<?php
$src = get_option("wp_signature");
$default = get_option("home")."/wp-admin/images/logo.gif";
echo "<img src='$src'/>";
?>

<h3>Pick your desired Signature</h3>
<label>
    <input type="radio" name="signature" value="<?php echo $default;?>"/>
    <img src="<?php echo $default;?>" alt="Default" width="100" height="100"/>
</label>
<?php 
global $wpdb;
$db = $wpdb->get_results("select * from $wpdb->posts where post_type = 'attachment' ");
foreach ($db as $db):?>
	<label>
    <input type="radio" name="signature" value="<?php echo $db->guid;?>"/>
    <img src="<?php echo $db->guid;?>" alt="<?php echo $db->guid;?>" width="100" height="100"/>
    </label>
<?php endforeach;?>
<p><input type="submit" class="button" value="Use this one"/></p>
</form>


</div>