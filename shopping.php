<!-- < ?php include "header_navbar_footer/header_if_login.php"?> -->
<?php include "header_navbar_footer/Get_usernameProfile.php"?>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>

<div class="container-fluid mt-3 mb-5">
   <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i> Shopping</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Shopping </li>
                    <li class="breadcrumb-item active"><i>Items</i></li>
                </ol>
            </div>
        </div>
    </section>
   
    <div id="shopping-cart" >
       <button type="button" class="btn btn-primary btn-md" onclick="location.href='<?php echo BASE_URL_PUBLIC.'sale.php'; ?>'">Back to Purchase more</button>
       <a id="btnEmpty" href="sale.php?action=empty">Empty Cart</a>
       <?php echo $sale->showCart_item(); ?>
    </div>


</div>

<?php include "header_navbar_footer/footer.php"?>