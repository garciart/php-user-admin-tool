<?php
/**
 * Landing page for user administration.
 *
 * PHP version 5.3
 *
 * @author  Rob Garcia <rgarcia@rgprogramming.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @version GIT: $Id$ In development
 * @link    https://github.com/garciart/PHPUserManager GitHub Repository
 */
session_start();

require_once "UMCommonCode.php";
require_once "User.class.php";
require_once "UserDB.class.php";

if ($_SESSION["Authenticated"] == false) {
    header("Location: LoginPage.php");
    exit();
}
/* Start placing content into an output buffer */
ob_start();
?>
<!-- Head Content Start -->
<title>User Profile | PHP User Manager</title>
<!-- Head Content End -->
<?php
/* Store the content of the buffer for later use */
$contentPlaceHolderHead = ob_get_contents();
/* Clean out the buffer, but do not destroy the output buffer */
ob_clean();
?>
<!-- Body Content Start -->
<!-- Header Element Content -->
<h1 class="mt-3">PHP User Manager</h1>
<p class="lead">User Profile Page</p>
<hr>
<?php
/* Store the content of the buffer for later use */
$contentPlaceHolderHeader = ob_get_contents();
/* Clean out the buffer, but do not destroy the output buffer */
ob_clean();
?>
<!-- Main Element Content -->
<?php
echo "Finally here!";
?>
<table class="table table-striped">
    <tr>
        <th>User ID:</th>
        <td><?php echo $user->getUserID() ?></td>
    </tr>
    <tr>
        <th>User Name:</th>
        <td><?php echo $user->getUsername() ?></td>
    </tr>
    <tr>
        <th>Password Hash:</th>
        <td><?php echo $user->getPasswordHash() ?></td>
    </tr>
    <tr>
        <th>Role ID:</th>
        <td><?php echo $user->getRoleID() ?></td>
    </tr>
    <tr>
        <th>Title:</th>
        <td><?php echo $userRole ?></td>
    </tr>
    <tr>
        <th>Email:</th>
        <td><?php echo $user->getEmail() ?></td>
    </tr>
    <tr>
        <th>Is Locked Out:</th>
        <td><?php echo $user->getIsLockedOut() ?></td>
    </tr>
    <tr>
        <th>Last Login Date:</th>
        <td><?php echo $user->getLastLoginDate() ?></td>
    </tr>
    <tr>
        <th>Create Date:</th>
        <td><?php echo $user->getCreateDate() ?></td>
    </tr>
    <tr>
        <th>Comments:</th>
        <td><?php echo $user->getComment() ?></td>
    </tr>
</table>
<?php
/* Store the content of the buffer for later use */
$contentPlaceHolderMain = ob_get_contents();
/* Clean out the buffer once again, but do not destroy the output buffer */
ob_clean();
?>
<!-- Footer Element Content -->

<!-- Body Content End -->
<?php
/* Store the content of the buffer for later use */
$contentPlaceHolderFooter = ob_get_contents();
/* Clean out the buffer and turn off output buffering */
ob_end_clean();
/* Call the master page. It will echo the content of the placeholders in the designated locations */
require_once "UMMasterPage.php";
