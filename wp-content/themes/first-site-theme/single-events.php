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
          <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'events' ) ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home </a> <span class="metabox__main"><?php echo the_title( )?></span>
        </p>
      </div>
     
    


    <div class="container container--narrow page-section">
    <div class="post-item">
            <h3><a href="<?php echo get_permalink()?>"><?php the_title()?></a></h3>
        </div>
    <div class="metabox">
            <p><?php the_title ( )?> </p>
        </div>
        
    <?php echo the_content();?>
</div>


<?php }
     $program=get_field('select_program');
    if($program){
        ?>
            <ul>

            

        <?php
     foreach($program as $pro){
        ?>
        <li><a href="<?php echo get_the_permalink($pro)?>"><?php echo get_the_title($pro);?></a></li> 
     <?}
    }

?>
</ul>
<?php get_footer();?>