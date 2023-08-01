<?php get_header();
while(have_posts( )){
    the_post();
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

    <?php

    $parentId = wp_get_post_parent_id(get_the_ID());
    if($parentId)
    {
       ?>
     <div class="container container--narrow page-section">

      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($parentId)?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parentId) ?></a> <span class="metabox__main"><?php echo the_title( )?></span>
        </p>
      </div>
     
     <?php
    }

    $test_child = get_pages( array(
        'child_of' => get_the_ID()
    ) );

    if($parentId or $test_child){

    if($parentId){
        $childrenof =$parentId;
    }else{
        $childrenof=get_the_ID(  );
    }
        ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($parentId)?>"><?php echo get_the_title($parentId)?></a></h2>
        <ul class="min-list">
        <?php

        wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $childrenof,
            'sort_column' => 'menu_order'
        ));
            
          ?>
          </ul>
      </div>
      <?php
        }
      ?>


      <div class="generic-content container">
        <p><?php echo the_content( )?></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
      </div>
    </div>

    <div class="page-section page-section--beige">
      <div class="container container--narrow generic-content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
      </div>
    </div>

    
    </div>


<?php } 
get_footer();

?>