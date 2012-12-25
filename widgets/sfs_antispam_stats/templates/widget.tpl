
{checkActionsTpl location="tpl_pligg_sfs_antispam_start"}
<DIV style="font-size:9pt; ">
<b>Registration Blocks: {php}$file = "../registerLog.txt";$lines = count(file($file));echo "$lines";{/php}</b>
<br />{php}
$line = '';

$f = fopen('../registerLog.txt', 'r');
$cursor = -1;

fseek($f, $cursor, SEEK_END);
$char = fgetc($f);

/**
 * Trim trailing newline chars of the file
 */
while ($char === "\n" || $char === "\r") {
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}

/**
 * Read until the start of file or first newline char
 */
while ($char !== false && $char !== "\n" && $char !== "\r") {
    /**
     * Prepend the new char
     */
    $line = $char . $line;
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}

echo $line;

{/php}
<br />  <br />
<img src="http://www.stopforumspam.com/img/stats_pie_country_1.png" border="0">

</div>
{checkActionsTpl location="tpl_pligg_sfs_antispam_end"}