<?php
namespace IntecHost;
class Encoder {
    private static $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@#';
    public static function encode($input) {
        $binary = '';
        for ($i = 0; $i < strlen($input); $i++) {
            $binary .= str_pad(decbin(ord($input[$i])), 8, '0', STR_PAD_LEFT);
        }
        $output = '';
        for ($i = 0; $i < strlen($binary); $i += 6) {
            $chunk = substr($binary, $i, 6);
            $chunk = str_pad($chunk, 6, '0', STR_PAD_RIGHT);
            $output .= self::$chars[bindec($chunk)];
        }
        return $output;
    }
    public static function decode($input) {
        $binary = '';
        for ($i = 0; $i < strlen($input); $i++) {
            $binary .= str_pad(decbin(strpos(self::$chars, $input[$i])), 6, '0', STR_PAD_LEFT);
        }
        $output = '';
        for ($i = 0; $i < strlen($binary); $i += 8) {
            $byte = substr($binary, $i, 8);
            if (strlen($byte) == 8) {
                $output .= chr(bindec($byte));
            }
        }
        return $output;
    }
}
