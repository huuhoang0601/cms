<?php get_header(); ?>

<?php
// Template name: Template Liên hệ
?>

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-dark">Hãy liên hệ ngay với chúng tôi để được tư vấn chi tiết và giải đáp mọi thắc mắc!</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100"
                            style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4749789211633!2d106.7554838115163!3d10.851432489257311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752797e321f8e9%3A0xb3ff69197b10ec4f!2sThu%20Duc%20College%20of%20Technology!5e0!3m2!1sen!2s!4v1731226814929!5m2!1sen!2s"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-7">
                    <?php echo do_shortcode('[wpforms id="159"]'); ?>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-dark me-4"></i>
                        <div>
                            <h4>Địa chỉ</h4>
                            <p class="mb-2">53 Võ Văn Ngân, Linh Chiểu, Thủ Đức, TP.HCM</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-dark me-4"></i>
                        <div>
                            <h4>Email</h4>
                            <p class="mb-2">22211tt0579@mail.tdc.edu.vn</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-dark me-4"></i>
                        <div>
                            <h4>Số điện thoại</h4>
                            <p class="mb-2">(+84) 123 456 789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php get_footer(); ?>