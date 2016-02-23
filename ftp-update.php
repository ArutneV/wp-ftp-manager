<?php
function sinetiks_schools_update () {
global $wpdb;
$id = $_GET["id"];
$name = $_POST["name"];
$address = $_POST["address"];
$username = $_POST["uname"];
$password = $_POST["passw"];
//update
if(isset($_POST['update'])){
    $wpdb->update(
        'wp_ukuftp', //table
        array('name' => $name, 'address' => $address, 'username' => $username, 'password' => $password), //data
        array('ID' => $id ), //where
        array('%s','%s','%s','%s',), //data format
        array('%s','%s','%s','%s',) //where format
    );
}
//delete
else if(isset($_POST['delete'])){
    $wpdb->query($wpdb->prepare("DELETE FROM wp_ukuftp WHERE id = %s",$id));
}
else{//selecting value to update
    $schools = $wpdb->get_results($wpdb->prepare("SELECT id,name,address,username,password from wp_ukuftp where id=%s",$id));
    foreach ($schools as $s ){
        $name=$s->name;
        $address=$s->address;
        $username=$s->username;
        $password=$s->password;
    }
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/appalliance-ftp-manager/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>FTP Manager- Edit Entry</h2>

<?php if($_POST['delete']){?>
<div class="updated"><p>Item deleted</p></div>
<a href="<?php echo admin_url('admin.php?page=awpk_ftp_list')?>">&laquo; Back to server list</a>

<?php } else if($_POST['update']) {?>
<div class="updated"><p>Item updated</p></div>
<a href="<?php echo admin_url('admin.php?page=awpk_ftp_list')?>">&laquo; Back to server list</a>

<?php } else {?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table class='wp-list-table widefat fixed'>
<tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
<tr><th>Address</th><td><input type="text" name="address" value="<?php echo $address;?>"/></td></tr>
<tr><th>Username</th><td><input type="text" name="uname" value="<?php echo $username;?>"/></td></tr>
<tr><th>Password</th><td><input type="text" name="passw" value="<?php echo $password;?>"/></td></tr>
</table><br/>
<input type='submit' name="update" value='Save' class="button button-primary"> &nbsp;&nbsp;
<input type='submit' name="delete" value='Delete' class="button button-secondary " onclick="return confirm('Are you sure?')">
</form>
<?php }?>

</div>
<?php
}
