<div class="footer-social d-flex align-items-center">
  <?php
    global $post;

    $query = new WP_Query( [
      'posts_per_page' => 10,
      'post_type'        => 'social_link',
    ] );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();
        $link = get_the_title();
        $contecnt = strip_tags(get_the_content());

        ?>
  <!-- Вывод постов, функции цикла: the_title() и т.д. -->

  <a href="<?php echo $contecnt; ?>">
    <i class="fab fa-<?php
            if ($link == 'facebook') {echo 'facebook-f';}
                      else {
                      echo $link;
                      };
                    ?>">
    </i>
  </a>


  <?php
                  }
                } else {
                  echo " ПУсто";
                }

                wp_reset_postdata(); // Сбрасываем $post
?>
</div>