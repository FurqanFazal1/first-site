<?php get_header( )?>


<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg')?>);"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large"><?php
        if(is_author( )){
            echo the_author( );
        }else{
            echo the_archive_title( );
        }
        ?></h1>
        <h2 class="headline headline--medium">keep up with our latest news!</h2>
      </div>
    </div>
    </div>

    <div class="container container-narrow page-section">
       <?php
       while (have_posts(  )) {
        the_post();?>

        <div class="post-item">
            <h3><a href="<?php echo get_permalink()?>"><?php the_title()?></a></h3>
        </div>
        <div class="metabox">
            <p>Posted by <?php the_author_link()?> on <?php the_time( 'F j, Y' )?> in <?php echo get_the_category_list( ",")?></p>
        </div>
        <div class="generic-content">
        <?php the_content()?>
        <p><a class="btn btn-blue" style="color:black" href="<?php the_permalink()?>">Continue Reading</a></p>
        </div>
        
        <?php
       }
       echo paginate_links( );
       ?>
    </div>
    



<?php 
 get_footer( )?>