 <!-- sidebar -->
 <?php
    // Kiểm tra xem có phải là trang archive sản phẩm của WooCommerce không
    if (is_product_category() || is_shop()) {
        // Hiển thị Sidebar Top trên trang danh mục sản phẩm (archive product)
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_top')) :
        endif;
    }
    ?>
 <div class="col-lg-12">
     <div class="mb-3">
         <h4>Danh mục Sản Phẩm</h4>
         <ul class="list-unstyled shop-categorie rounded">

             <!-- lấy ra tất cả danh mục cha -->
             <?php
                $args = array(
                    'taxonomy' => 'product_cat', // Đúng là 'taxonomy' thay vì 'taxconomy'
                    'hide_empty' => false, // Đặt thành true nếu muốn ẩn danh mục trống
                    'parent' => 0, // Lấy các danh mục cha
                    'number' => 3, //lấy ra 3 danh mục thôi
                    'order' => 'DESC'
                );

                $categories = get_categories($args);
                foreach ($categories as $category) { ?>
                 <?php
                    // Lấy danh mục con của danh mục cha hiện tại
                    $child_args = array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => false,
                        'parent' => $category->term_id, // Lấy danh mục con của danh mục cha
                    );
                    $child_categories = get_categories($child_args);
                    ?>
                 <li class="nav-item">
                     <div class="d-flex  flex-column shop-name">
                         <a
                             class="nav-link collapsed d-flex justify-content-start shop-name px-0 py-0"
                             href="<?php echo get_term_link($category->slug, 'product_cat'); ?>">
                             <span class="cate-parent"><?php echo $category->name; ?></span>
                         </a>
                         <div class="bg-white collapse-inner px-3 py-1 cate-child">
                             <?php foreach ($child_categories as $child) { ?>
                                 <a class="collapse-item d-block" href="<?php echo get_term_link($child->slug, 'product_cat'); ?>"><?php echo $child->name; ?></a>
                             <?php } ?>
                         </div>
                     </div>
                 </li>
             <?php } ?>
         </ul>
     </div>
 </div>



 <div class="col-lg-12 py-2">
     <h4 class="mb-3">Các bài viết mới nhất</h4>

     <!-- Lấy ra bài viết -->
     <?php
        $args = array(
            'post_type' => 'post', // Loại bài viết
            'post_status' => 'publish', // Chỉ lấy bài viết đã được xuất bản
            'posts_per_page' => 5, // Lấy 5 bài viết
            'ignore_sticky_posts' => 1, // Bỏ qua bài viết đã được ghim
            'cat' => 1, // ID của danh mục (có thể thay đổi tùy vào danh mục muốn lấy)
            'order' => 'DESC', // Sắp xếp bài viết theo thứ tự mới nhất
        );
        $getposts = new WP_Query($args);
        ?>

     <?php if ($getposts->have_posts()) : ?>
         <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
             <div class="row pb-3">
                 <!-- Post Image -->
                 <div class="col-lg-5 py-0 px-0">
                     <div class="rounded">
                         <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid rounded')); ?>
                     </div>
                 </div>
                 <!-- Post Title -->
                 <div class="col-lg-7 d-flex align-items-center">
                     <div>
                         <a href="<?php the_permalink(); ?>">
                             <h6 class="fw-bold me-2"><?php the_title(); ?></h6>
                         </a>
                     </div>
                 </div>
             </div>

         <?php endwhile; ?>
         <?php wp_reset_postdata(); ?>
     <?php else : ?>
         <p>Chưa có bài viết nào.</p>
     <?php endif; ?>
 </div>

 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar')) : ?><?php endif; ?>


 <!-- endsidebar -->