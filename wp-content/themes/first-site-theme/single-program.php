<?php get_header();?>

<?php while(have_posts(  )){
    the_post(  );
    ?>
<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( '/images/ocean.jpg' ) ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo the_title();?></h1>
        <div class="page-banner__intro">
          <p>We change it later in our course.</p>
        </div>
      </div>
</div>

    
     <div class="container container--narrow page-section">

      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'program') ?>"><i class="fa fa-home" aria-hidden="true"></i> All Program </a> <span class="metabox__main"><?php echo the_title( )?></span>
        </p>
      </div>
     
    


    <div class="container container--narrow page-section">
    <div class="post-item">
            <h3><a href="<?php echo get_permalink()?>"><?php the_title()?></a></h3>
        </div>
    <div class="metabox">
            <p>Posted by <?php the_author_link( )?> on <?php the_time( 'F j, Y' )?> in <?php echo get_the_category_list( ",")?></p>
        </div>
        
    <?php echo the_content();?>
</div>


<?php }


          
            $selectedevent = new WP_Query(array(
              'post_type' => 'Events',
              'posts_per_page' => 2
              
            ));


              while($selectedevent->have_posts()){
                $selectedevent->the_post(  );
              
            ?>

          <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php echo the_permalink( )?>">
              <span class="event-summary__month"><?php 
              $orderdate = new WP_Query(array(
                'post_type'=>'events',
                  'meta_key' => 'event_date',
                  'orderby' =>  'meta_value_num',
                  'order' => 'ASC',  
                  'meta_query' => array(
                    array(
                      'key'=>'event_date',
                      'compare'=>'>=',
                      'value'=>date('Ymd'),
                      'type'=>'numeric'
                    ),
                    array(
                        'key' => 'select_program',
                        'compare'=> 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                  )
              ));

              $dat=get_field('event_date');
              $eventdate = new DateTime($dat);
                echo $eventdate->format('M');
                ?></span>
              <span class="event-summary__day"><?php echo $eventdate->format('d');?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo the_permalink( )?>"><?php echo the_title()?></a></h5>
              <p><?php echo wp_trim_words(get_the_content(), 15)?><a href="<?php echo the_permalink( )?>" class="nu gray">Learn more</a></p>
            </div>
          </div>
          <?php
          }
          ?>


<?php get_footer();?>