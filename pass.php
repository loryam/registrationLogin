<?php
$someVar = 1;
?>

<script type="text/javascript">
    var javaScriptVar = "<?php echo $someVar; ?>";
    alert(javaScriptVar);
</script>