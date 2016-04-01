<?php
/**
 * EmailView.php
 * (C) 2016 Chris Pollett
 */
namespace cs174\email_validator\views;

require_once "View.php";
/**
 * This class draw the main form for the Email Validator Web App
 * and displays the previously submitted email and whether it was valid or
 * not.
 */
class EmailView extends View
{
    /**
     * Method used to draw EmailViews web page.
     *
     * @param array $data data from the controller based on previously submitted
     *  emails
     */
    public function render($data)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en-US" dir="ltr">
        <head> 
          <title>Email Validator</title> 
          <meta charset="utf-8" />
        </head>
        <body>
        <h1>Email Validator</h1>
        <form>
        <p><label for="e-mail">Please Enter An Email Address:</label>
        <input type="text" id="e-mail" name="email" max-size="40"/>
        <button type="submit">Check Email</button>
        </p>
        </form>
        <?php
        if (!empty($data['PREVIOUS_EMAIL'])) {
            ?>
            <p>The last email entered was:</p>
            <p><?=$data['PREVIOUS_EMAIL'] ?></p>
            <?php
            if (isset($data['PREVIOUS_EMAIL_VALID']) &&
                $data['PREVIOUS_EMAIL_VALID'] === true) {
                ?>
                <p>It was valid!</p>
                <?php
            } else {
                ?>
                <p>It was not valid!</p>
                <?php
            }
        }
        ?>
        </body>
        </html>
        <?php
    }
}
