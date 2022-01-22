<?php
/*
Template Name: Шаблон страницы поиска
Template Post Type: post, page, product
*/
get_header();
?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>
          <?php
          printf(esc_html__('Search: %s', 'sensive_project'),'<span>' . get_search_query() . '</span>');
          ?>
        </h1>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm Banner end =================-->


<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-8">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- Вывод постов, функции цикла: the_title() и т.д. -->
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
                <a href="<?php echo get_the_permalink(); ?>">
                  <h3><?php the_title(); ?> </h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a
                    href="#">technology</a>, <a href="#">fashion</a></p>
                <p><?php the_excerpt(); ?></p>
                <a class="button" href="<?php echo get_the_permalink(); ?>">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
            <?php endwhile; else: ?>
            Записей нет.
            <?php endif;
          ?>



            <div class="row">
              <div class="col-lg-12">
                <?php the_posts_pagination(array(
                'show_all'           => false, // показаны все страницы участвующие в пагинации
                'end_size'           => 1,     // количество страниц на концах
                'mid_size'           => 1,     // количество страниц вокруг текущей
                'prev_next'          => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                'prev_text'          => __('<i class="ti-angle-left"></i>'),
                'next_text'          => __('<i class="ti-angle-right"></i>'),
                'type'               => 'list',
                'add_args'           => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                'add_fragment'       => '',     // Текст который добавиться ко всем ссылкам.
                'screen_reader_text' => __( 'Posts navigation' ),
                'aria_label'         => __( 'Posts' ), // aria-label="" для nav элемента. С WP 5.3
                'class'              => '',  // class="" для nav элемента. С WP 5.5
              )
          ); ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card1.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Fast cars and rickety bridges as
                    he grand tour returns</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <!-- ниже это базаовое -->
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card1.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Fast cars and rickety bridges as
                    he grand tour returns</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card2.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Harvey Weinstein's senual assault
                    trial set for May</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card3.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Fast cars and rickety bridges as
                    he grand tour returns</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card4.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Harvey Weinstein's senual assault
                    trial set for May</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card5.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Fast cars and rickety bridges as
                    he grand tour returns</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card6.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Harvey Weinstein's senual assault
                    trial set for May</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card7.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Fast cars and rickety bridges as
                    he grand tour returns</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb-card8.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Harvey Weinstein's senual assault
                    trial set for May</h3>
                </a>
                <p>Vel aliquam quis, nulla pede mi commodo no tristique nam hac luctus torquent velit felis lone commodo
                  pellentesque</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex">
              <ul class="pagination">
                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="ti-angle-left"></i>
                    </span>
                  </a>
                </li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="ti-angle-right"></i>
                    </span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- Start Blog Post Siddebar -->
      <div class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">
          <div class="single-sidebar-widget newsletter-widget">
            <form action="#">
              <div class="d-flex flex-row">
                <input class="form-control" name="q" placeholder="Search" required="" type="text" value="fast">
                <button class="click-btn btn btn-default bbtns"><i class="ti-search"></i></button>
              </div>
            </form>
          </div>

          <!-- <div class="single-sidebar-widget newsletter-widget">
                <h4 class="single-sidebar-widget__title">Newsletter</h4>
                <div class="form-group mt-30">
                  <div class="col-autos">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Enter email'">
                  </div>
                </div>
                <button class="bbtns d-block mt-20 w-100">Subcribe</button>
              </div> -->

          <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Category</h4>
            <ul class="cat-list mt-20">
              <li>
                <a href="archive.html" class="d-flex justify-content-between">
                  <p>Technology</p>
                  <p>(03)</p>
                </a>
              </li>
              <li>
                <a href="archive.html" class="d-flex justify-content-between">
                  <p>Software</p>
                  <p>(09)</p>
                </a>
              </li>
              <li>
                <a href="archive.html" class="d-flex justify-content-between">
                  <p>Lifestyle</p>
                  <p>(12)</p>
                </a>
              </li>
              <li>
                <a href="archive.html" class="d-flex justify-content-between">
                  <p>Shopping</p>
                  <p>(02)</p>
                </a>
              </li>
              <li>
                <a href="archive.html" class="d-flex justify-content-between">
                  <p>Food</p>
                  <p>(10)</p>
                </a>
              </li>
            </ul>
          </div>

          <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Popular Post</h4>
            <div class="popular-post-list">
              <div class="single-post-list">
                <div class="thumb">
                  <img class="card-img rounded-0" src="img/blog/thumb/thumb1.png" alt="">
                  <ul class="thumb-info">
                    <li><a href="#">Adam Colinge</a></li>
                    <li><a href="#">Dec 15</a></li>
                  </ul>
                </div>
                <div class="details mt-20">
                  <a href="blog-single.html">
                    <h6>Accused of assaulting flight attendant miktake alaways</h6>
                  </a>
                </div>
              </div>
              <div class="single-post-list">
                <div class="thumb">
                  <img class="card-img rounded-0" src="img/blog/thumb/thumb2.png" alt="">
                  <ul class="thumb-info">
                    <li><a href="#">Adam Colinge</a></li>
                    <li><a href="#">Dec 15</a></li>
                  </ul>
                </div>
                <div class="details mt-20">
                  <a href="blog-single.html">
                    <h6>Tennessee outback steakhouse the
                      worker diagnosed</h6>
                  </a>
                </div>
              </div>
              <div class="single-post-list">
                <div class="thumb">
                  <img class="card-img rounded-0" src="img/blog/thumb/thumb3.png" alt="">
                  <ul class="thumb-info">
                    <li><a href="#">Adam Colinge</a></li>
                    <li><a href="#">Dec 15</a></li>
                  </ul>
                </div>
                <div class="details mt-20">
                  <a href="blog-single.html">
                    <h6>Tennessee outback steakhouse the
                      worker diagnosed</h6>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="single-sidebar-widget tag_cloud_widget">
            <h4 class="single-sidebar-widget__title">Tags</h4>
            <ul class="list">
              <li>
                <a href="#">project</a>
              </li>
              <li>
                <a href="#">love</a>
              </li>
              <li>
                <a href="#">technology</a>
              </li>
              <li>
                <a href="#">travel</a>
              </li>
              <li>
                <a href="#">software</a>
              </li>
              <li>
                <a href="#">life style</a>
              </li>
              <li>
                <a href="#">design</a>
              </li>
              <li>
                <a href="#">illustration</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Blog Post Siddebar -->
  </div>
</section>
<!--================ End Blog Post Area =================-->

<?php

get_footer();
?>