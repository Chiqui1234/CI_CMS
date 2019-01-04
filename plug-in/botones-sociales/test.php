<?php include_once('../../internal/info.php');
$actual_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
echo $actual_link;
?>
<div id="share-buttons">

    <!-- Buffer -->
    <a href="https://bufferapp.com/add?url=<?php echo $actual_link; ?>&amp;text=<?php echo $nombreDelSitio; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/buffer.png" alt="Buffer" />
    </a>

    <!-- Digg -->
    <a href="http://www.digg.com/submit?url=<?php echo $actual_link; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" />
    </a>

    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>

    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=<?php echo $actual_link; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
    </a>

    <!-- LinkedIn -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $actual_link; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>

    <!-- Pinterest -->
    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
        <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
    </a>

    <!-- Tumblr-->
    <a href="http://www.tumblr.com/share/link?url=<?php echo $actual_link; ?>&amp;title=<?php echo $nombreDelSitio; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a>

    <!-- Twitter -->
    <a href="https://twitter.com/share?url=<?php echo $actual_link; ?>&amp;text=<?php echo $nombreDelSitio; ?>&amp;hashtags=<?php echo $nombreDelSitio; ?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>

</div>
