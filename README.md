Use

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
