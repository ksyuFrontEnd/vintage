<?php get_header(); ?> 

<!-- MAIN -->
<div role="main" id="main">
  <div class="wrapper cf">

  <?php if(have_posts()) : ?>

    <!-- posts list -->
    <div id="posts-list" class="cf">

      <?php while(have_posts()) : the_post(); ?>

        <?php get_template_part('template-parts/post/post-card'); ?>
 
      <?php endwhile; ?>

      <!-- page-navigation -->
      <div class="page-navigation cf">
        <div class="nav-next"><a href="#">Older Entries</a></div>
        <div class="nav-previous"><a href="#">Newer Entries</a></div>
      </div>
      <!--ENDS page-navigation -->
    </div>

    <?php else : ?>

      <div id="posts-list" class="cf">

        <div class="page-content">
          
          <!-- entry-content -->
          <div class="entry-content cf">
            <h2 class="heading">Nothing was found.</h2>
          </div>

        </div>

      </div>

  <?php endif; ?>
    <!-- ENDS posts list -->
    <!-- sidebar -->
    <aside id="sidebar">
      <ul>

      <!-- block Sponsors  -------------------------------------------------------------------------------->

      <?php 
      
        $sponsors = get_field('sponsors_', 'option');
        $sponsorsList = get_field('sponsors_list', 'option');
        
        if ($sponsorsList) : ?>

          <li class="block">
            <h4 class="heading"><?php echo $sponsors; ?></h4>
            <div class="ads cf"> 

              <?php 
                  $i = 0;
                  foreach($sponsorsList as $sponsor) : 
                    
                    $i++;
                    $image = $sponsor['sponsor_image'];
                    $url = $sponsor['sponsor_url']; 
                    
                    // if($i % 2 == 0) : $class="last"; else : $class=""; endif; 
                    $class = ($i % 2 == 0) ? "last" : $class="";
                ?>

                <a class="<?php echo $class; ?>" href="<?php echo $url; ?>">
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['url']; ?>">
                </a> 

              <?php endforeach; ?>
            </div>

          </li>

      <?php endif; ?>

        <!-- block Widgets ---------------------------------------------------------------------->
        <?php 
        
        $textWidgetTitle = get_field('text_widget', 'option');
        $textWidgetContent = get_field('text_widget_content', 'option');

        if ($textWidgetContent) :
        
        ?>

        <li class="block">

          <?php if ($textWidgetTitle) : ?>
              <h4 class="heading"><?php echo $textWidgetTitle; ?></h4>
          <?php endif; ?>

          <?php echo $textWidgetContent; ?>
          
        </li>

        <?php endif; ?>

        <!-- block Categories -->
          <h4 class="heading">Categories</h4>
          <ul>
            <li class="cat-item"><a href="#">Film and video<span class="post-counter"> (2)</span></a></li>
            <li class="cat-item"><a href="#">Print<span class="post-counter"> (2)</span></a></li>
            <li class="cat-item"><a href="#">Photo and lomo<span class="post-counter"> (2)</span></a></li>
            <li class="cat-item"><a href="#">Habitant morbi<span class="post-counter"> (2)</span></a></li>
            <li class="cat-item"><a href="#">Film and video<span class="post-counter"> (2)</span></a></li>
            <li class="cat-item"><a href="#">Print<span class="post-counter"> (2)</span></a></li>
            <li class="cat-item"><a href="#">Photo and lomo<span class="post-counter"> (2)</span></a></li>
            <li class="cat-item"><a href="#">Habitant morbi<span class="post-counter"> (2)</span></a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <!-- ENDS sidebar -->
  </div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>