<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <?php
     $discount_amount = 0;
     $discount_price = 0;
     /* 5. Add statements use the $_POST - Phần 5 và Phần 6 có thể thay thế cho nhau
     $product_description = $_POST["product_description"];
     $price=$_POST["list_price"];
     $discount_percent =$_POST["discount_percent"];
    if (isset($_POST["product_description"]) AND isset($_POST["list_price"]) AND isset($_POST["discount_percent"])){
    */
    // 6. Use the $_POST array to use the filter_input function instead 
    $product_description =filter_input(INPUT_POST,"product_description"); 
     $price=filter_input(INPUT_POST,"list_price");
     $discount_percent =filter_input(INPUT_POST,"discount_percent");
    if (isset($product_description) AND isset($price) AND isset($discount_percent)){
    //     
        $price = floatval($price);
        $discount_percent = floatval($discount_percent);
    // 7.calculate discount amount and discount price
        $discount_amount = $price * $discount_percent/100;
        $discount_price = $price - $discount_amount;
    //
    // 8. format the numberic variables with the currency and percentage formats
    $discount_amount = number_format($discount_amount,2,'.',',');
    $discount_price =number_format($discount_percent * 100, 2, '.', ',');
    } 
    //
    ?>
   <main>
        <h4>This page is under construction</h4>

        <label>Product Description:</label>
        <span>
            <!-- 10. Add htmlspecialchars -->
            <?php
      if (isset($product_description)) {
        $description = (string)$product_description;
        $description = "<b>" . htmlspecialchars($description) . "</b>";
        echo $description;
    }
    
?></span><br>

        <label>List Price:</label>
        <span><?php if (isset($price)) echo '$'.$price; ?></span><br>

        <label>Standard Discount:</label>
       <span><i>

        <?php
         if (isset($discount_percent)){
            $percent = (float)$discount_percent;
            $percent = "<i>". htmlspecialchars($percent)."</i>";
            echo $percent.'%'; 
         }
        
        ?>
        </i></span><br>
<!-- . -->
        <label>Discount Amount:</label>
        <span><?php  echo '$'.$discount_amount; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo '$'.$discount_price; ?></span><br>
    </main>
</body>
</html>