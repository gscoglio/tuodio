<?php
set_time_limit(0);
include_once 'config.php';
include_once LIBRARY_PATH . 'init.php';

$Twitter = new Twitter(TWITTER_USERNAME);
$Twitter->run();

$content = print_r($Twitter->log, true);
mail(MAIL_TO, MAIL_SUBJECT, $content);

echo '<pre>';
echo $content;
?>
