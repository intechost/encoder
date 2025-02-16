# IntecHost Encoder

This repository provides a simple implementation of text encoding and decoding using the `IntecHost\Encoder` package.

## Usage

Below is the example code for encoding and decoding text.

```php
<?php
require 'vendor/autoload.php';
use IntecHost\Encoder;

// Encoder Function
function intechost_encode($text) {
    return Encoder::encode($text);
}

// Decoder Function
function intechost_decode($text) {
    return Encoder::decode($text);
}

// Execution
$sagar = intechost_encode("Hello Bro");
$decoder = intechost_decode($sagar);
echo "Encode: $sagar and Decode: $decoder";
