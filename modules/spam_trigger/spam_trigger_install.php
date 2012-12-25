<?php
	$module_info['name'] = 'Spam Trigger';
	$module_info['desc'] = 'This module will check all submitted comments and stories for common spam words';
	$module_info['version'] = 0.10;
	$module_info['update_url'] = 'http://forums.pligg.com/versioncheck.php?product=spam_trigger';
//	$module_info['homepage_url'] = 'http://forums.pligg.com/pligg-modules/17484-upload-module-file-image-attachment.html';
	$module_info['settings_url'] = '../module.php?module=spam_trigger';
	// this is where you set the modules "name" and "version" that is required
	// if more that one module is required then just make a copy of that line

	global $db;
	$fields = $db->get_results("DESCRIBE ".table_links);
	if ($fields)
	    foreach ($fields as $field)
		if ($field->Field == 'link_status' && !strstr($field->Type,"'moderated'"))
		    $db->query("ALTER TABLE `".table_links."` CHANGE  `link_status`  `link_status` ".str_replace(')',",'moderated')",$field->Type)." DEFAULT  'discard'");

	if (get_misc_data('spam_trigger_light')=='')
	{
		misc_data_update('spam_trigger_light', 'arsehole
ass-pirate
ass pirate
assbandit
assbanger
ass fuck
assfuck
assfucker
asshat
asshole
asspirate
assshole
asswipe
bastard
beaner
bitch
blow job
blowjob
butt plug
butt-pirate
butt pirate
buttpirate
carpet muncher
carpetmuncher
clit
cock smoker
cocksmoker
cock sucker
cocksucker
cum dumpster
cumdumpster
cum slut
cumslut
cunnilingus
cunt
dick head
dickhead
dickwad
dickweed
dickwod
dike
dildo
douche bag
douche-bag
douchebag
dyke
faggit
faggot
fagtard
fuck
fudge packer
fudge-packer
fudgepacker
gayass
gay wad
gaywad
god damn
god-damn
goddamn
handjob
jerk off
jizz
jungle bunny
jungle-bunny
junglebunny
kike
kunt
nigga
nigger
orgasm
penis
porch monkey
porch-monkey
porchmonkey
queef
rimjob
shit
spick
splooge
testicle
titty
twat
vagina
wank
xxx
abilify
adderall
adipex
advair diskus
ambien
apply online
aranesp
auto loan
best rates
botox
buy drugs
buy now
buy online
casino
celebrex
cialis
credit card
crestor
cyclen
cyclobenzaprine
cymbalta
day-trading
debt free
degree program
doctor approved
doctor prescribed
earn a college degree
earn a degree
earn extra money
easy money
effexor
epogen
escorts
fioricet
fire your boss
free cell phone
free degree
free diploma
free dvd
free games
free gift
free money
free offer
free phone
free reading
gambling
get rich quick
health products
heartburn
hydrocodone
incest
insurance
investment
investor
ionamin
lamictal
levaquin
levitra
lexapro
lipitor
loose weight
low interest
medications
meridia
mortgage
nexium
no purchase
online poker
oxycontin
pain relief
paxil
pharmacy
phendimetrazine
phentamine
phentermine
pheramones
pherimones
plavix
prescription
prevacid
procrit
protonix
removes wrinkles
risperdal
rolex
search engine listing
seroquel
singulair
stop snoring
topamax
tramadol
trim-spa
ultram
vacation offers
valium
valtrex
viagra
vicodin
vioxx
vytorin
weight reduction
work at home
xanax
zetia
zocor
zoloft
zyprexa
zyrtec');
	}
?>
