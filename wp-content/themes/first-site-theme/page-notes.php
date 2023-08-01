<?php 
    if(!is_user_logged_in()){
        wp_redirect( esc_url(site_url( "/" )));
        exit;
    }

get_header();
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
</div>

<div class="container container--narrow page-section">


    <div class="create-note">
        <h2 class="headline headline--medium">Create New Notes</h2>
        <input class="new-note-title" type="text" placeholder="Title Here">
        <textarea class="new-note-body" name="" id="" cols="30" rows="10" placeholder="Your note here..."></textarea>
        <span class="submit-note">Create</span>
    </div>

    <div class="container container--narrow page-section">
        <ul class="min-list link-list" id="my-notes">
            <?php
                $notes=new WP_Query(array(
                    'post_type'=>'Note',
                    'post_per_page'=>4,
                    'author'=>get_current_user_id( )
                ));

                while ($notes->have_posts(  )) {
                    $notes->the_post( );
                    ?>
                        <li data-id="<?php the_ID( )?>">
                            <input readonly type="text" value="<?php echo get_the_title( )?>" class="note-title-field">

                            <span class="edit-note"><i class="fa fa-pencil"> Edit</i></span>
                            <span class="delete-note"><i class="fa fa-trash-o"> Delete</i></span>

                            <textarea readonly name="" id="" cols="30" rows="10" value="" class="note-body-field"><?php echo wp_strip_all_tags(get_the_content( )) ?></textarea>
                            <span class="up-note" style="color:black; display:none"><i class="fa fa-arrow-right">Save</i></span>
                        </li>
                    <?php
                
                }
                echo paginate_links();
               
            ?>
        </ul>
    </div>
</div>

    

 


<?php }


get_footer();

?>