<?php

namespace App\Views;

use App\Products\Product;
use App\Reviews\Reviews;

?>
<div class="row" id="productDetails" onload="requestProduct()">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3" id="productImg">
    </div>
    <div class="col-sm-6" id="productInfo">


    </div>

    <div class="col-sm-2">

    </div>
</div>
<div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
        <?php require_once 'views/reviews.php'; ?>
    </div>
    <div class="col-sm-2">

    </div>
</div>