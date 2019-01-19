<?php
function formReporter($errorCode) {
    echo '<form action="<?php echo $location; ?>error" method="post" id="hiddenForm">
    <input type="hidden" name="errorType" value="'.$errorCode.'" />
    <input type="hidden" name="ip" value="<?php echo $publicIp; ?>" />
    </form>
    <script>
        document.getElementById("hiddenForm").submit();
    </script>';
}
?>