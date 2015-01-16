<?php if(has_post_thumbnail()) {
    $imageSource = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'original' ); ?>
    <figure class="cap-bot image-fullwidth">
        <img src="<?php echo $imageSource[0]; ?>" alt="<?php the_post_thumbnail_caption(); ?>">
        <figcaption>
            <?php the_post_thumbnail_caption(); ?>
        </figcaption>
    </figure>
<?php
}
the_content(); ?>
