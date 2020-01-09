<?php
/*
 * Error page.
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

/* Start placing content into an output buffer */
ob_start();
?>
<!-- Head Content Start -->
<title>About Page | PHP User Manager</title>
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
<p class="lead">Error Page</p>
<hr>
<?php
/* Store the content of the buffer for later use */
$contentPlaceHolderHeader = ob_get_contents();
/* Clean out the buffer, but do not destroy the output buffer */
ob_clean();
?>
<!-- Main Element Content -->
<div class="row">
    <div class="col-md-12 text-center">
        <div class="page-header">
            <h1>PC LOAD LETTER???</h1>
            <img id="errorimg" src="images/error_os.gif" alt="PC LOAD LETTER">
            <hr>
            <?php
            if (isset($_SESSION["Error"])) {
                echo "{$_SESSION["Error"]}<br>";
                unset($_SESSION["Error"]);
            }
            ?>
        </div>
        <br>
        <div class="text-danger">
            <p>Something went wrong, but we've logged the error and we'll get to it right away.</p>
            <a href='<?php echo "/{$ROOT_URL}/index.php" ?>' class="btn btn-primary">Return To Home Page</a>
        </div>
    </div>
</div>
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
