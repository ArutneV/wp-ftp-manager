<?php
function sinetiks_schools_list () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/appalliance-ftp-manager/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>FTP Manager - All Entries &nbsp;&nbsp;  <a class="button button-primary" href="<?php echo admin_url('admin.php?page=awpk_ftp_entry_create'); ?>">Add New</a></h2>

<?php
global $wpdb;
$rows = $wpdb->get_results("SELECT id,name,address,username,password from wp_ukuftp");
echo "<br/><table class='wp-list-table widefat fixed alter-table '>";
echo "<tr><th>Name:</th><th>Address:</th><th>Username:</th><th>Password:</th><th>&nbsp;</th></tr>";
foreach ($rows as $row ){
    echo "<tr>";
    echo "<td>$row->name</td>";
    echo "<td>$row->address</td>";
    echo "<td>$row->username</td>";
    echo "<td>$row->password</td>";
    echo "<td><a href='".admin_url('admin.php?page=awpk_ftp_update&id='.$row->id)."'>Update</a></td>";
    echo "</tr>";}
echo "</table>";
?>
</div>
<?php
}
