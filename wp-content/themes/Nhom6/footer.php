<!-- Footer Start -->
<div class="container-fluid text-white-50 footer pt-5 mt-5" style="background-color: #5c5c5c">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid #fff) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-white mb-0">Nhóm 6 Shop</h1>
                        <div class="col-md-6 my-auto text-center text-md-end text-white">
                            <img src=" <?php echo get_theme_file_uri('img/logoSaleNoti.png') ?>" class="img-fluid"
                                alt="" width="150px">
                        </div>
                    </a>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-5"></div>
                <div class="col-lg-4">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Liên hệ</h4>
                        <p>Địa chỉ: 53 Võ Văn Ngân, Linh Chiểu, Thủ Đức, TP.HCM</p>
                        <p>Email: 22211tt0579@mail.tdc.edu.vn</p>
                        <p>Phone: (+84) 123 456 789</p>

                    </div>
                </div>
                <div class="col-lg-5">
                    <h4 id="footer-subcribe" class="text-white">Đăng ký để nhận thông tin sản phẩm mới!</h4>
                    <div class="position-relative mx-auto">
                        <?php echo do_shortcode('[wpforms id="197"]'); ?>
                    </div>
                </div>
                <div class="col-lg-3"><p>Thanh toán</p>
                <img src=" <?php echo get_theme_file_uri('img/payment.png') ?>" class="img-fluid" alt=""></div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->




<!-- Back to Top -->
<a href="#" class="btn btn-dark border-3 border-dark rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>


<!-- Template Javascript -->
<script src="js/main.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/6745bbf02480f5b4f5a446ab/1idk6c9fe';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
</script>
<script>
    jQuery(document).ready(function($) {
    // Khi người dùng chọn danh mục hoặc "All"
    $('.featured__controls li').click(function() {
        var categorySlug = $(this).data('filter'); // Lấy slug của danh mục
        if (categorySlug === '*') {
            categorySlug = ''; // Nếu chọn "All", lấy tất cả sản phẩm
        }

        // Thêm class 'active' cho item được chọn và bỏ active cho các item còn lại
        $('.featured__controls li').removeClass('active');
        $(this).addClass('active');

        // Gửi yêu cầu AJAX để lọc sản phẩm theo danh mục hoặc tất cả sản phẩm
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'filter_products_by_category', // Đảm bảo action đúng
                category_slug: categorySlug
            },
            success: function(response) {
                // Xóa nội dung cũ và thêm sản phẩm mới vào
                $('#product-list').html(response);
            }
        });
    });
});

</script>
<!--End of Tawk.to Script-->
<?php wp_footer() ?>
</body>

</html>