<?php
namespace IntecHost;

class Encoder {
    private static $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@#';

    public static function encode($input) {
        $binary = '';

        // Convert input string to binary
        for ($i = 0; $i < strlen($input); $i++) {
            $binary .= str_pad(decbin(ord($input[$i])), 8, '0', STR_PAD_LEFT);
        }

        // Split binary into 6-bit chunks
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

        // Convert each character back to 6-bit binary
        for ($i = 0; $i < strlen($input); $i++) {
            $binary .= str_pad(decbin(strpos(self::$chars, $input[$i])), 6, '0', STR_PAD_LEFT);
        }

        // Convert binary back to ASCII
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
