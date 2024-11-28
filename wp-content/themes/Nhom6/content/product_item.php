<!-- modal thông báo  -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="woocommerce-notices-wrapper"></div>
            </div>
        </div>
    </div>
</div>
<!-- end modal thông báo -->
<?php
global $product;
?>

<div class="card best-seller-item position-relative rounded border-dark">
    <!-- Hình ảnh sản phẩm -->
    <div class="position-relative overflow-hidden">
        <a href="<?php the_permalink(); ?>" class="d-block">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid rounded-top')); ?>
        </a>
        <?php if ($product->is_on_sale()) { ?>
            <span class="badge bg-danger text-white position-absolute" style="top: 10px; right: 10px;">
                Giảm <?php echo get_sale_percent($product->get_regular_price(), $product->get_sale_price()); ?>%
            </span>
        <?php } ?>
    </div>

    <!-- Nội dung sản phẩm -->
    <div class="card-body text-center">
        <h6 class="card-title fw-bold">
            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a>
        </h6>
        <p class="text-danger fs-5 fw-bold mb-4">
            <?php echo $product->get_price_html(); ?>
        </p>
    </div>

    <!-- Nút hành động -->
    <div class="card-actions position-absolute w-100 text-center">
        <a href="#" class="btn btn-outline-dark add-to-cart-ajax" data-product-id="<?php the_ID(); ?>">
            <i class="fa fa-shopping-cart me-2"></i> Thêm vào giỏ hàng
        </a>
        <a href="?add-to-cart=<?php the_ID(); ?>&redirect_to_cart=true" class="btn btn-dark">
            <i class="fa fa-bolt me-2"></i> Mua Ngay
        </a>
    </div>
</div>


