<?php
function sinetiks_schools_create () {
$name = $_POST["name"];
$address = $_POST["address"];
$username = $_POST["uname"];
$password = $_POST["passw"];
//insert
if(isset($_POST['insert'])){
    global $wpdb;
    $wpdb->insert(
        'wp_ukuftp', //table
        array('name' => $name, 'address' => $address, 'username' => $username, 'password' => $password), //data
        array('%s','%s','%s','%s',) //data format
    );
    $message.="Entry Added";
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/appalliance-ftp-manager/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Add New Entry</h2>
<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table class='wp-list-table widefat fixed'>
<tr><th>Name:</th><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
<tr><th>Address:</th><td><input type="text" name="address" value="<?php echo $address;?>"/></td></tr>
<tr><th>Username:</th><td><input type="text" name="uname" value="<?php echo $username;?>"/></td></tr>
<tr><th>Password:</th><td><input type="text" name="passw" value="<?php echo $password;?>"/></td></tr>
</table><br/>
<input type='submit' class="button button-primary" name="insert" value='Save' class='button'>
</form>
</div>
<?php
}

