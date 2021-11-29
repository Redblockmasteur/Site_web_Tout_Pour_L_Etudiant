<div id="product-grid">
<div class="txt-heading">Products</div>
<?php
$product= mysqli_query($con,"SELECT * FROM articles ORDER BY id ASC");
if (!empty($product)) {
while ($row=mysqli_fetch_array($product)) {
?>
<div class="product-item">
<form method="post" action="index.php?action=add&pid=<?php echo $row["id"]; ?>">
<div class="product-image"><img src="<?php echo $row["image"]; ?>"></div>
<div class="product-tile-footer">
<div class="product-title"><?php echo $row["name"]; ?></div>
<div class="product-price"><?php echo "$".$row["price"]; ?></div>
<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
</div>
</form>
</div>
<?php
}
} else {
echo "No Records.";
}
?>
</div>

<?php
//code for adding product in cart
case "add":
if(!empty($_POST["quantity"])) {
$pid=$_GET["pid"];
$result=mysqli_query($con,"SELECT * FROM tblproduct WHERE id='$pid'");
while($productByCode=mysqli_fetch_array($result)){
$itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
if(!empty($_SESSION["cart_item"])) {
// searches for specific value code
if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($productByCode[0]["code"] == $k) {
if(empty($_SESSION["cart_item"][$k]["quantity"])) {
$_SESSION["cart_item"][$k]["quantity"] = 0;
}
$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
}
}
} else {
//The array_merge() function merges one or more arrays into one array.
$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
}
} else {
$_SESSION["cart_item"] = $itemArray;
}
}
}
break;

<!-- Cart ---->
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>

if(isset($_SESSION["cart_item"])){
$total_quantity = 0;
$total_price = 0;
?>
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>
<?php
foreach ($_SESSION["cart_item"] as $item){
$item_price = $item["quantity"]*$item["price"];
?>
<tr>
<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
<td><?php echo $item["code"]; ?></td>
<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
<td style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
<td style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
</tr>
<?php
$total_quantity += $item["quantity"];
$total_price += ($item["price"]*$item["quantity"]);
}
?>
<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php
}
?>
</div>

<?php
// code for removing product from cart
case "remove":
if(!empty($_SESSION["cart_item"])) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($_GET["code"] == $k)
unset($_SESSION["cart_item"][$k]);
if(empty($_SESSION["cart_item"]))
unset($_SESSION["cart_item"]);
}
}
break;

 // code for if cart is empty
 case "empty":
    unset($_SESSION["cart_item"]);
    break;




