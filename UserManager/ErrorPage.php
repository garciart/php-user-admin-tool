<?php
/**
 * Error page.
 * 
 * PHP version used: 5.5.4
 * SQLite version used: 3.28.0
 *
 * Styling guide: PSR-12: Extended Coding Style
 *     (https://www.php-fig.org/psr/psr-12/)
 *
 * @category  PHPUserManager
 * @package   UserManager
 * @author    Rob Garcia <rgarcia@rgprogramming.com>
 * @copyright 2019-2020 Rob Garcia
 * @license   https://opensource.org/licenses/MIT The MIT License
 * @link      https://github.com/garciart/PHPUserManager
 */
/* Check if a session is already active */
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Include this file to access common functions and variables
require_once "CommonCode.php";

/* DO NOT CHECK IF SESSION IS STARTED OR YOU WILL END UP IN A LOOP */
/* Start placing content into an output buffer */
ob_start();
?>
<!-- Head Content Start -->
<title>Error Page | PHP User Manager</title>
<!-- Head Content End -->
<?php
/* Store the content of the buffer for later use */
$contentPlaceHolderHead = ob_get_contents();
/* Clean out the buffer, but do not destroy the output buffer */
ob_clean();
?>
<!-- Body Content Start -->
<!-- Header Element Content -->
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
            <img src="img/error_os.gif" alt="PC LOAD LETTER" class="col-md-6">
            <hr>
            <?php
            if (isset($_SESSION["Error"])) {
                echo "{$_SESSION["Error"]}<br>";
                unset($_SESSION["Error"]);
            }
            // If it exists, get the ErrorCode from query string and display
            $result = filter_input(INPUT_GET, "ErrorCode", FILTER_SANITIZE_NUMBER_INT);
            if (!empty($result)) {
                cleanText($result);
                echo $result . " Error";
            }
            ?>
        </div>
        <br>
        <div class="text-danger">
            <p>Something went wrong, but we've logged the error and we'll get to it right away.</p>
            <a href='<?php echo "/{$USERMANGER_ROOT_DIR}/MainPage.php" ?>' class="btn btn-primary">Return To Home Page</a>
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
require_once "MasterPage.php";
