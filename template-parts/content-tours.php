  <?php
    global $post;

    // Запрашиваем продукты
    $current = absint(
      max(
        1,
        get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' )
      )
    );

    $query = new WP_Query( [
      'post_type'      => 'tours',
      'posts_per_page' => 3,
      'paged'          => $current,
      ] );

      // Обрабатываем полученные в запросе продукты, если они есть
    if ( $query->have_posts() ) {

      while ( $query->have_posts() ) {
        $query->the_post();

        ?>
  <div class="single-recent-blog-post">
    <div class="thumb">
      <?php
      //должно находится внутри цикла
      if( has_post_thumbnail() ) {the_post_thumbnail( 'post-thumbnail',  array('class' => " img-fluid w-100"));
      }
      else {
        echo '<img class="img-fluid w-100" src="'.get_template_directory_uri().'/img/blog/blog2.png" />';
      }
      ?>
      <ul class="thumb-info">
        <li><a href="#"><i class="ti-user"></i><?php the_author(); ?></a></li>
        <li><a href="#"><i
              class="ti-notepad"></i><?php the_time('F '); ?><?php the_time('j'); ?>,<?php the_time('Y'); ?></a>
        </li>
        <li><a href="#"><i
              class="ti-themify-favicon"></i><?php comments_number( '0 комментариев', '1 комментарий', '% комментариев', $post->ID); ?></a>
        </li>
      </ul>
    </div>
    <div class="details mt-20">
      <a href="blog-single.html">
        <h3><?php the_title(); ?></h3>
      </a>
      <p><?php the_excerpt(); ?></p>
      <a class="button" href="<?php echo get_the_permalink(); ?>">Read More <i class="ti-arrow-right"></i></a>
    </div>
  </div>
  <?php
      }

    ?>

  <?php
    wp_reset_postdata();
  } // Сбрасываем $post

    ?>

  <div class="row">
    <div class="col-lg-12">
      <nav class="navigation justify-content-center d-flex blog-pagination  " role="navigation">
        <?php
              echo paginate_links( [
              'total'   => $query->max_num_pages,
              'current' => $current,
              'show_all'           => false, // показаны все страницы участвующие в пагинации
              'end_size'           => 1,     // количество страниц на концах
              'mid_size'           => 1,     // количество страниц вокруг текущей
              'prev_next'          => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
              'prev_text'          => __('<i class="ti-angle-left"></i>'),
              'next_text'          => __('<i class="ti-angle-right"></i>'),
              'type'               => 'list',
            ] );
              ?>
      </nav>
    </div>
  </div>