<?php get_header();  

the_post();

$tags = get_the_tags();
$content = get_the_content();
$title = get_the_title();

$postImgUrl = get_the_post_thumbnail_url();

$authorID = get_the_author_meta('ID');
$authorURL = get_author_posts_url($authorID);


$firstName = get_the_author_meta('first_name');
$lastName = get_the_author_meta('last_name');
$fullName = '';

if ($firstName && $lastName) :
    $authorName = $firstName . ' ' . $lastName;
else : 
    $authorName = get_the_author();
endif;

?>

<!-- MAIN -->
<div role="main" id="main">
  <div class="wrapper cf">
    <!-- posts list -->
    <div id="posts-list" class="cf">

      <article>
          <div class="feature-image"> 
             
                  <?php if($postImgUrl) : ?>

                    <img src="<?php echo $postImgUrl?>" alt="">

                  <?php endif;?>
              
              <div class="entry-date">
                  <div class="month"><?php the_time('M');?></div>
                  <div class="number"><?php the_time('d');?></div>
              </div>
          </div>
        <div class="excerpt"> 
            <div class="post-heading" ><?php echo $title ?></div>
            <?php if ($content) : echo $content; endif; ?>
        </div>
        <div class="meta"> 
          <span class="user">
              <a href="<?php echo $authorURL; ?>">By <?php echo $authorName;?>, </a>
          </span> 
          <span class="comments"><?php echo get_comments_number(); ?> comments</span>
        
          <?php if ($tags) : ?>
              <span class="tags">
                  <?php foreach ($tags as $tag) : ?>
                      <a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name;?></a>,
                  <?php endforeach; ?>
              </span>
          <?php endif; ?> 
        </div>
        <i class="tape"></i> 
      </article>

      <?php comments_template(); ?>

      
        
      
      <!-- ENDS Respond -->
    </div>
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
        <!-- ---------------------------------------------------------------- -->

        <li class="block">
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

