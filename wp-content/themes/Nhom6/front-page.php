<?php get_header() ?>

<!-- Hero Start -->
<div class="container-fluid py-5 mb-1 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-12">
                <?php get_template_part('slider'); ?>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->



<!-- Section Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="">Tất cả</li>
                        <?php
                        // Hiển thị danh mục cha
                        $taxonomy = 'product_cat';
                        $args = array(
                            'taxonomy'     => $taxonomy,
                            'orderby'      => 'name',
                            'hierarchical' => true,
                            'parent'       => 0, // Chỉ lấy danh mục cha
                        );

                        $categories = get_categories($args);
                        foreach ($categories as $category) : ?>
                            <li data-filter="<?php echo esc_attr($category->slug); ?>">
                                <?php echo esc_html($category->name); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>


                </div>

                <h1 class="display-4">Sản phẩm nổi bật</h1>
            </div>
        </div>

        <!-- Đây là phần hiển thị sản phẩm, sau khi AJAX được gọi sẽ được cập nhật -->
        <div class="row g-4" id="product-list">
            <?php
            // Mặc định hiển thị sản phẩm bán chạy (tất cả sản phẩm)
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN',
            );
            $args = array('post_type' => 'product', 'posts_per_page' => 8, 'ignore_sticky_posts' => 1, 'tax_query' => $tax_query);
            $getposts = new WP_query($args);
            while ($getposts->have_posts()):
                $getposts->the_post();
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <?php get_template_part('content/product_item'); ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>

    </div>
</div>



<!-- Tastimonial Start -->
<!-- Blog Section Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="blog-header text-center">
            <h1 class="display-5 mb-5 text-dark">Các Bài Viết</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php
            // Truy vấn danh sách bài viết
            $args = array(
                'post_type' => 'post', // Loại bài đăng là blog (post)
                'posts_per_page' => 5 // Số lượng bài viết hiển thị
            );
            $blogs = new WP_Query($args);

            if ($blogs->have_posts()) :
                while ($blogs->have_posts()) : $blogs->the_post();
                    $blog_id = get_the_ID();
                    $blog_title = get_the_title();
                    $blog_excerpt = get_the_excerpt();
                    $blog_permalink = get_permalink();
                    $blog_image = get_the_post_thumbnail_url($blog_id, 'medium'); // Lấy ảnh bài viết
            ?>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4 d-flex align-items-center">
                        <div class="position-relative d-flex w-100">
                            <!-- Ảnh bên trái -->
                            <div class="bg-secondary rounded me-4">
                                <img src="<?php echo esc_url($blog_image ? $blog_image : get_theme_file_uri('img/default-blog.jpg')); ?>"
                                    class="img-fluid rounded" style="width: 200px; height: 200px;" alt="Bài viết">
                            </div>
                            <!-- Nội dung bên phải -->
                            <div class="flex-grow-1">
                                <div class="mb-4 pb-4 border-bottom border-dark">
                                    <p class="mb-0"><?php echo esc_html(wp_trim_words($blog_excerpt, 20, '...')); ?></p>
                                </div>
                                <h4 class="text-dark"><?php echo esc_html($blog_title); ?></h4>
                                <p class="m-0 pb-3"><a href="<?php echo esc_url($blog_permalink); ?>" class="text-decoration-none text-dark">Đọc Thêm</a></p>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center">Không có bài viết nào để hiển thị.</p>';
            endif;
            ?>
        </div>
    </div>
</div>




<!-- Blog Section End -->

<!-- Tastimonial End -->
<?php get_footer() ?>