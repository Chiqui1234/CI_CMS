<?php 
function addToCartBtn($data) {
require($data);
if( file_exists($data) && isset($price) && isset($productName) ) { 
    require(locacion()."plug-in/payPayShop/business.php");?>
<form target="paypal" id="superForm" action="<?php echo locacion();?>plug-in/payPayShop/function/checker.php" method="post">
<input type="hidden" name="cmd" value="_cart" />
<input type="hidden" name="business" value="EXJ7B23GMBVCJ" />
<input type="hidden" name="lc" value="AL" />
<input type="hidden" name="item_name" value="<?php echo $productName; ?>" />
<input type="hidden" name="item_name_url" value="intel-core-i3-8100" />
<input type="hidden" name="item_number" value="0" />
<input type="hidden" name="amount" value="<?php echo $price; ?>" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="button_subtype" value="products" />
<input type="hidden" name="no_note" value="0" />
<input type="hidden" name="cn" value="Dar instrucciones especiales al vendedor:" />
<input type="hidden" name="no_shipping" value="2" />
<input type="hidden" name="add" value="1" />
<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHosted" />
 <div id="payPayBtn">
  <input type="submit" name="submit" value="" alt="PayPal - The safer, easier way to pay online!" />
 </div>
<!--<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">-->
</form>
<script>
   // document.getElementById("superForm").submit();
</script>
<?php } else { ?>
<p>Este producto no tiene definido un nombre ni precio</p>
<?php } 
}?>
