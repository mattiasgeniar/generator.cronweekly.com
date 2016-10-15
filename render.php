<?php

/* XSS AHOY */
$title = $_POST['title'];
$date = $_POST['date'];
$issue = $_POST['issue'];

/* text area's */
$intro = $_POST['intro'];
$content = $_POST['content'];

if ($_POST['type'] == 'html') {
  /* CSS styles */
  $h1 = "font-family: Helvetica; font-size: 33px; line-height: 1.1;";
  $h2 = "font-family: Helvetica; font-size: 20px; line-height: 1.1;";
  $href = "word-wrap:break-word;color:#080808;font-weight:normal;text-decoration:underline;";

  /* <br />'s, please */
  $intro = nl2br($intro);

  $content = str_replace('<h1>', '<h1 style="'. $h1 .'">', $content);
  $content = str_replace('<h2>', '<h2 style="'. $h2 .'">', $content);
  $content = str_replace('<a href=', '<a target="_blank" style="'. $href .'" href=', $content);

  /* Start HTML content */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="utf-8"><!-- utf-8 works for most cases -->
  <meta name="viewport" content="width=device-width"><!-- Forcing initial-scale shouldn't be necessary -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Use the latest (edge) version of IE rendering engine -->
  <meta name=”x-apple-disable-message-reformatting”><!-- Disable auto-scale in iOS 10 Mail entirely -->
  <title>Cron.weekly issue #<?= $issue ?></title>
  <!-- The title tag shows in email notifications, like Android 4.4. --><!-- Web Font / @font-face : BEGIN --><!-- NOTE: If web fonts are not required, lines 9 - 26 can be safely removed. --><!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. --><!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]--><!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ --><!--[if !mso]><!--><!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> --><!--<![endif]--><!-- Web Font / @font-face : END --><!-- CSS Reset -->
  <style type="text/css">
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: A work-around for iOS meddling in triggered links. */
        .mobile-link--footer a,
        a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration: underline !important;
        }

  </style>
  <!-- Progressive Enhancements -->
  <style type="text/css">/* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }
  </style>
</head>
<body bgcolor="#fff" style="margin: 0;" width="100%">
  <center style="width: 100%; background: #fff;"><!-- Visually Hidden Preheader Text : BEGIN -->
    <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">News and tools for Linux sysadmins and open source users.</div>
      <!-- Visually Hidden Preheader Text : END --><!--
          Set the email width. Defined in two places:
          1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
          2. MSO tags for Desktop Windows Outlook enforce a 600px width.
      -->

    <div style="max-width: 600px; margin: auto;"><!--[if mso]>
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]--><!-- Email Header : BEGIN --><!-- Email Header : END --><!-- Email Body : BEGIN -->
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="max-width: 600px;" width="100%"><!-- Hero Image, Flush : BEGIN -->
        <tbody>
          <tr>
            <td bgcolor="#333333" style="padding-top: 30px; padding-bottom: 20px; font-family: sans-serif; font-size: 45px; mso-height-rule: exactly; line-height: 45px; color: #eeeeee; text-align:center">CRON.WEEKLY</td>
          </tr>
          <tr>
            <td bgcolor="#333333" style="padding: 20px; font-family: sans-serif; font-size: 25px; mso-height-rule: exactly; line-height: 30px; color: #eeeeee; text-align:center"><?= $title ?></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff" style="padding-top: 20px; font-family: sans-serif; font-size: 20px; mso-height-rule: exactly; line-height: 20px; color: #000000; text-align:center; font-style:italic; ">issue #<?= $issue ?> for <?= $date ?></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff">
              <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                <tbody>
                  <tr>
                    <td style="padding-left: 10px; padding-right: 10px; padding-top: 20px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                      <?= $intro ?>
                      <br /> <br />
                      <!-- mail body -->
                      <?= $content ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>

          <tr>
            <td bgcolor="#ffffff">
              <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                <tbody>
                  <tr>
                    <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                      <hr style="color: #333333; margin-bottom: 15px" />
                      Thanks for reading this week's <em>cron.weekly</em>! Did you like it?
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
           </tr>

           <tr>
            <td align="center" bgcolor="#ffffff" height="100%" style="padding-bottom: 40px" valign="top" width="100%">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="max-width:560px;" width="100%">
              <tbody>
                <tr>
                  <td align="center" valign="top" width="50%">
                  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size: 14px;text-align: left;" width="100%">
                    <tbody>
                      <tr>
                        <td style="text-align: center; padding: 0 10px;">
                          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin: auto;">
                            <tbody>
                              <tr>
                                <td class="button-td" style="border-radius: 3px; background: #3bba39; text-align: center;">
                                  <a target="_blank" href="https://www.cronweekly.com/i-loved-it/" style="background: #3bba39; border: 15px solid #3bba39; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style="color:#ffffff">
                                      :-)
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                  </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td class="stack-column-center" style="text-align: center;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;">
                          Loved it!
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </td>
                  <td align="center" valign="top" width="50%">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size: 14px;text-align: left;" width="100%">
                      <tbody>
                        <tr>
                          <td style="text-align: center; padding: 0 10px;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin: auto;">
                              <tbody>
                                <tr>
                                  <td class="button-td" style="border-radius: 3px; background: #d9403e; text-align: center;">
                                    <a target="_blank" href="https://www.cronweekly.com/expected-more/" style="background: #d9403e; border: 15px solid #d9403e; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;">
                                      &nbsp;&nbsp;&nbsp;&nbsp;
                                      <span style="color:#ffffff">
                                        :-(
                                      </span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;
                                    </a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td class="stack-column-center" style="text-align: center;font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 0;">
                            I expected better.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>

          <tr>
            <td height="40" style="font-size: 0; line-height: 0;">&nbsp;</td>
          </tr>

        </tbody>
      </table>
      <!-- Email Body : END --><!-- Email Footer : BEGIN -->


      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="max-width: 680px;" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#333333" style="padding:20px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #ffffff;">
              <a href="https://www.cronweekly.com/issue-<?= $issue ?>/?via=newsletter" style="font-family: sans-serif; mso-height-rule: exactly; color: #eeeeee;">View this issue online in the archives</a><br />
              <br />
              cron.weekly is sent by <a href="https://ma.ttias.be" style="font-family: sans-serif; mso-height-rule: exactly; color: #eeeeee;text-decoration:underline">Mattias Geniar</a> - You signed up at <a href="https://www.cronweekly.com/" style="font-family: sans-serif; mso-height-rule: exactly; color: #eeeeee;text-decoration:underline">cronweekly.com</a><br />
              <br />
              Don't like it anymore? You can <unsubscribe style="font-family: sans-serif; mso-height-rule: exactly; color: #eeeeee;text-decoration:underline">unsubscribe</unsubscribe> at any time. No hard feelings.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </center>
</body>
</html>

<?php
} /* End of HTML content */
elseif ($_POST['type'] == 'text') {
  /* Let's display Text, should be easier than HTML - amirite? */
  $title = $_POST['title'];
  $date = $_POST['date'];
  $issue = $_POST['issue'];

  /* text area's */
  $intro = $_POST['intro'];
  $content = $_POST['content'];

  /* Translate the wordpress HTML to "plain text" */
  $content = str_replace('&amp;', '&', $content);

  /* Remove ridiculous HTML tags in Text */
  $content = str_replace(array('<em>', '</em>'), '', $content);

  /* Translate H1 header tags (titles) */
  $content = str_replace('<h1>', "\n\n\n*** ". $h1, $content);
  $content = str_replace('</h1>', "\n====\n", $content);

  /* Translate H2 header tags (titles with links) */
  $content = str_replace('<h2>', "\n\n** ". $h2, $content);
  $content = str_replace('</h2>', "\n", $content);

  /* Translate any links */
  $pattern = '|<a href="(.*)">(.*)</a>|';
  $replacement = '${2} (${1})';
  $content = preg_replace($pattern, $replacement, $content);

  /* Remove formatting from the 'sponsored' posts */
  $content = str_replace('<span style="color: #ff9900;">', '', $content);
  $content = str_replace('</span>', '', $content);

  # Let the browser know it's plain Text
  header('Content-Type: text/plain');
?>

CRON.WEEKLY

View this issue in your browser: https://www.cronweekly.com/archives/

*** issue #<?= $issue ?> for <?= $date ?>

==============================================

<?= $intro ?>

<?= $content ?>

<?php
} /* End of TEXT content */
else {
  die('Biep, no type (text/html) selected. Try again.');
}
