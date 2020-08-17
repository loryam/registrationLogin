
<?php

// GENERATING RANDOM NUMBERS 

function randomPassword() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);

   
}

$code = randomPassword();
echo $code;


?>

<script type="text/javascript"> 

                        var code = "<?php echo $code ; ?>";

                        alert(code);

                        </script>
  