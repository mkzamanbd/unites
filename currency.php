<?php
//error_reporting(0);

function convertCurrency($amount,$from_currency,$to_currency){
  //$apikey = 'your-api-key-here';

  $from_Currency = urlencode($from_currency);
  $to_Currency = urlencode($to_currency);
  $query =  "{$from_Currency}_{$to_Currency}";

  $json = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q={$query}&compact=ultra");
  $obj = json_decode($json, true);

  $val = floatval($obj["$query"]);


  $total = $val * $amount;
  return number_format($total, 2, '.', '');
}

//uncomment to test
echo "<h2>1 S$ = BDT. ".convertCurrency(1, 'SGD', 'BDT')."/= Tk</h2>".date('d-m-Y');

echo '<br>Current PHP version: ' . phpversion();

echo "<br>".convertCurrency(1, 'USD', 'BDT')
?>