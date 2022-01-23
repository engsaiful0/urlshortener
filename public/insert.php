<?php
error_reporting(-1);
ini_set('display_errors', 1);
session_start();
$CONF['host'] = '127.0.0.1';
$CONF['user'] = 'root';
$CONF['pass'] = '';
$CONF['name'] = 'phpshort';
$db = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$db->set_charset("utf8");

function incrementalHash($len = 5){
    $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $base = strlen($charset);
    $result = '';

    $now = explode(' ', microtime())[1];
    while ($now >= $base){
        $i = $now % $base;
        $result = $charset[$i] . $result;
        $now /= $base;
    }
    return substr($result, -5);
}

function generateRandomNumbers($max, $count)
{
    $numbers = [];

    for ($i = 1; $i < $count; $i++) {
        $random = mt_rand(0, $max / ($count - $i));
        $numbers[] = $random;
        $max -= $random;
    }

    $numbers[] = $max;

    shuffle($numbers);

    return $numbers;
}

/*$domains = [
    'https://youtube.com', 'https://google.com', 'https://nike.com', 'https://facebook.com', 'https://messenger.com', 'https://twitter.com', 'https://codecanyon.net', 'https://instagram.com', 'https://themeforest.net', 'https://netflix.com', 'https://apple.com'
];

for($i = 0; $i <= 30000; $i++) {
	$db->query(sprintf("INSERT INTO `links` (
	`id`,
	`user_id`,
	`alias`,
	`url`,
	`title`,
	`password`,
	`space_id`,
	`domain_id`,
	`privacy`,
	`ends_at`,
	`created_at`,
	`updated_at`
	) VALUES (
	NULL,
	'%s',
	'%s',
	'%s',
	'%s',
	'%s',
	'%s',
	'%s',
	'%s',
	NULL,
	NOW(),
	NOW());",
	1,
	uniqid(),
	$domains[rand(0,10)].'/'.uniqid(),
	uniqid().uniqid(),
	NULL,
	rand(0, 5),
	NULL,
	rand(0, 1)
	));
}
echo $db->error;*/

/*for($i = 0; $i <= 3000; $i++) {
    $db->query(sprintf("INSERT INTO `spaces` (
    `id`,
    `user_id`,
    `name`,
    `color`,
    `created_at`,
    `updated_at`
    ) VALUES (
    NULL,
    '%s',
    '%s',
    '%s',
    NOW(),
    NOW());",
    mt_rand(1,3),
    uniqid(),
    rand(1,6)
    ));
}

for($i = 0; $i <= 3000; $i++) {
    $db->query(sprintf("INSERT INTO `domains` (
    `id`,
    `user_id`,
    `name`,
    `created_at`,
    `updated_at`
    ) VALUES (
    NULL,
    '%s',
    '%s',
    NOW(),
    NOW());",
    mt_rand(1,3),
    'http://'.uniqid().'.com'
    ));
}*/

// Insert Stats
if(isset($_GET['stats'])) {
    $days = [
        'clicks' => [4799, 3328, 4618, 4301, 3544, 4522, 4006, 4900, 4267, 3917, 4427, 3331, 4291, 3771, 4652]
    ];

    for($i = 0; $i <= 14; $i++) {
        for ($link_id = 1; $link_id <= 1; $link_id++) {
            $names = [
                'clicks'   =>  [''],

                'browser'   =>  [
                    'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome', 'Chrome',
                    'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox', 'Firefox',
                    'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge', 'Edge',
                    'Safari', 'Safari', 'Safari', 'Safari', 'Safari', 'Safari', 'Safari', 'Safari', 'Safari', 'Safari',
                    'Opera', 'Opera', 'Opera', 'Opera', 'Opera', 'Opera', 'Opera', 'Opera',
                    'Samsung Internet', 'Samsung Internet', 'Samsung Internet', 'Samsung Internet',
                    'Opera Touch', 'Opera Touch', 'Opera Touch',
                    'Chromium', 'Chromium',
                    'Vivaldi', 'Vivaldi',
                    'Brave', 'Brave',
                    'Yandex Browser',
                    'Internet Explorer'
                ],

                'platform'  =>  [
                    'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows', 'Windows',
                    'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android', 'Android',
                    'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS', 'iOS',
                    'Linux', 'Linux', 'Linux', 'Linux', 'Linux', 'Linux', 'Linux', 'Linux', 'Linux', 'Linux', 'Linux',
                    'Chrome OS', 'Chrome OS', 'Chrome OS', 'Chrome OS',
                    'OS X', 'OS X', 'OS X',
                    'Tizen', 'Tizen',
                    'BlackBerry OS',
                    'FreeBSD',
                    'KaiOS',
                    'Ubuntu'
                ],

                'device'    =>  [
                    'desktop', 'desktop', 'desktop', 'desktop', 'desktop', 'desktop', 'desktop',
                    'mobile', 'mobile', 'mobile', 'mobile',
                    'tablet', 'tablet',
                    'gaming',
                    'watch',
                    'television'
                ],

                'country'  =>   [
                    'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States', 'US:United States',
                    'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany', 'DE:Germany',
                    'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France', 'FR:France',
                    'GB:Great Britain', 'GB:Great Britain', 'GB:Great Britain', 'GB:Great Britain', 'GB:Great Britain', 'GB:Great Britain', 'GB:Great Britain', 'GB:Great Britain',
                    'RO:Romania',
                    'IT:Italy', 'IT:Italy', 'IT:Italy', 'IT:Italy', 'IT:Italy', 'IT:Italy', 'IT:Italy',
                    'ES:Spain', 'ES:Spain', 'ES:Spain', 'ES:Spain', 'ES:Spain',
                    'IN:India', 'IN:India', 'IN:India', 'IN:India',
                    'RU:Russia', 'RU:Russia', 'RU:Russia',
                    'TR:Turkey', 'TR:Turkey',
                    'AU:Australia', 'AU:Australia',
                    'BR:Brazil', 'BR:Brazil',
                    'CA:Canada',
                    'CN:China',
                    'BD:Bangladesh',
                    'CH:Switzerland',
                    'AR:Argentina',
                    'KR:South Korea',
                    'MA:Morocco',
                    'PK:Pakistan',
                    'PY:Paraguay',
                    'BE:Belgium',
                    'BG:Bulgaria',
                    'BN:Brunei',
                    'BY:Belarus',
                    'CZ:Czechia',
                    'DK:Denmark',
                    'EC:Ecuador',
                    'EG:Egypt',
                    'FI:Finland',
                    'GH:Ghana',
                    'GR:Greece',
                    'ID:Indonesia',
                    'IL:Israel',
                    'JM:Jamaica',
                    'JP:Japan',
                    'LB:Lebanon',
                    'MX:Mexico',
                    'MY:Malaysia',
                    'NG:Nigeria',
                    'NL:Netherlands',
                    'NO:Norway',
                    'NP:Nepal',
                    'PH:Philippines',
                    'PL:Poland',
                    'PT:Portugal',
                    'RS:Serbia',
                    'SE:Sweden',
                    'TH:Thailand',
                    'UA:Ukraine',
                    'ZA:South Africa',
                    'AE:United Arab Emirates',
                    'SN:Senegal',
                    'QA:Qatar',
                    'SA:Saudi Arabia',
                    'KE:Kenya',
                    'HU:Hungary',
                    'AT:Austria',
                    'UG:Uganda',
                    'MM:Myanmar',
                    'VN:Vietnam',
                ],

                'city'     =>   [
                    'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY', 'US:New York, NY',
                    'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE', 'DE:Berlin, BE',
                    'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75', 'FR:Paris, 75',
                    'GB:London, ENG', 'GB:London, ENG', 'GB:London, ENG', 'GB:London, ENG', 'GB:London, ENG', 'GB:London, ENG', 'GB:London, ENG', 'GB:London, ENG',
                    'RO:Bucharest, B',
                    'IT:Rome, RM', 'IT:Rome, RM', 'IT:Rome, RM', 'IT:Rome, RM', 'IT:Rome, RM', 'IT:Rome, RM', 'IT:Rome, RM',
                    'ES:Madrid, M', 'ES:Madrid, M', 'ES:Madrid, M', 'ES:Madrid, M', 'ES:Madrid, M',
                    'IN:Delhi, DL', 'IN:Delhi, DL', 'IN:Delhi, DL', 'IN:Delhi, DL',
                    'RU:Moscow, MOW', 'RU:Moscow, MOW', 'RU:Moscow, MOW',
                    'TR:Istanbul, 34', 'TR:Istanbul, 34',
                    'AU:Sydney, NSW', 'AU:Sydney, NSW',
                    'BR:São Paulo, SP', 'BR:São Paulo, SP',
                    'CA:Brampton, ON',
                    'CN:Beijing, BJ',
                    'BD:Dhaka, 13',
                    'CH:Zurich, ZH',
                    'AR:Moron, B',
                    'KR:Seocho-gu, 11',
                    'MA:Rabat, RAB',
                    'PK:Attock, PB',
                    'PY:Santa Rita, 10',
                    'BE:Brussels, BRU',
                    'BG:Sofia, 22',
                    'BN:Bandar Seri Begawan, BM',
                    'BY:Brest, BR',
                    'CZ:Prague, 10',
                    'DK:Copenhagen, 84',
                    'EC:Babahoyo, R',
                    'EG:Cairo, C',
                    'FI:Helsinki, 18',
                    'GH:Accra, AA',
                    'GR:Athens, I',
                    'ID:Jakarta, JK',
                    'IL:Tel Aviv, TA',
                    'JM:Kingston, 01',
                    'JP:Setagaya-ku, 13',
                    'LB:Beirut, BA',
                    'MX:Los Mochis, SIN',
                    'MY:Kuala Lumpur, 14',
                    'NG:Lagos, LA',
                    'NL:Amsterdam, NH',
                    'NO:Oslo, 03',
                    'NP:Kathmandu, P3',
                    'PH:Santa Rosa, LAG',
                    'PL:Krakow, 12',
                    'PT:Vila do Corvo, 20',
                    'RS:Belgrade, 00',
                    'SE:Lund, M',
                    'TH:Bangkok, 10',
                    'UA:Kyiv, 30',
                    'ZA:Cape Town, WC',
                    'AE:Dubai, DU',
                    'SN:Dakar, DK',
                    'QA:Doha, DA',
                    'SA:Jeddah, 02',
                    'KE:Nairobi, 30',
                    'HU:Budapest, BU',
                    'AT:Vienna, 9',
                    'UG:Kampala, 102',
                    'MM:Yangon, 06',
                    'VN:Hanoi, HN'
                ],

                'referrer'  => [
                    'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com',
                    'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com','www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com', 'www.bing.com',
                    'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com',
                    'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com', 'www.youtube.com',
                    'www.reddit.com', 'www.reddit.com', 'www.reddit.com', 'www.reddit.com', 'www.reddit.com', 'www.reddit.com', 'www.reddit.com', 'www.reddit.com', 'www.reddit.com',
                    'www.twitch.tv', 'www.twitch.tv', 'www.twitch.tv', 'www.twitch.tv', 'www.twitch.tv', 'www.twitch.tv',
                    'www.wikipedia.org', 'www.wikipedia.org', 'www.wikipedia.org', 'www.wikipedia.org', 'www.wikipedia.org',
                    'www.quora.com', 'www.quora.com', 'www.quora.com', 'www.quora.com',
                    'www.amazon.com', 'www.amazon.com', 'www.amazon.com',
                    'www.baidu.com', 'www.baidu.com',
                    'www.ecosia.org',
                    'search.yahoo.com',
                    'search.aol.com',
                    'yandex.ru',
                    'l.facebook.com',
                    't.co',
                    'l.instagram.com',
                    'out.reddit.com',
                    'away.vk.com'
                ],

                'language'    => [
                    'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en', 'en',
                    'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de', 'de',
                    'es',  'es',  'es',  'es',  'es',  'es', 'es',  'es',  'es',  'es',  'es',  'es',
                    'fr', 'fr', 'fr', 'fr', 'fr', 'fr', 'fr', 'fr',
                    'cn', 'cn', 'cn', 'cn', 'cn', 'cn',
                    'ro', 'ro', 'ro', 'ro',
                    'it', 'it', 'it',
                    'ru', 'ru',
                    'bg',
                    'hi',
                    'tr'
                ],

                'clicks_hours' => ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23],
            ];

            $clicks = $days['clicks'][$i];

            $cCount = false;
            foreach ($names as $name => $values) {
                if($name == 'country') {
                    $count = generateRandomNumbers($clicks, count($values));
                    if ($cCount === false) {
                        $cCount = $count;
                    }
                } elseif($name == 'city') {
                    $cc = $clicks;
                } elseif($name == 'referrer') {
                    $count = generateRandomNumbers(round((($clicks/100) * rand(25, 60))), count($values));
                } else {
                    $count = generateRandomNumbers($clicks, count($values));
                }

                $c = 0;
                foreach ($values as $value) {
                    $db->query(sprintf("INSERT INTO `stats` (
                    `link_id`,
                    `name`,
                    `value`,
                    `count`,
                    `date`
                    ) VALUES (
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    DATE_SUB(CURRENT_DATE, INTERVAL ".$i." DAY)) ON DUPLICATE KEY UPDATE `count` = `count` + %s;",
                        $link_id,
                        $name,
                        $value,
                        ($name == 'city' ? $cCount[$c] : $count[$c]),
                        ($name == 'city' ? $cCount[$c] : $count[$c])
                    ));

                    $c++;
                }

                if($name == 'city') {
                    $cCount = false;
                }
            }
            echo $db->error;
        }
    }
}


mysqli_close($db);
?>