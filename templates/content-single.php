<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php if(has_post_thumbnail()) {
                $imageSource = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'original' ); ?>
                <figure class="cap-bot image-fullwidth">
                    <img src="<?php echo $imageSource[0]; ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                    <figcaption>
                        <?php the_post_thumbnail_caption(); ?>
                    </figcaption>
                </figure>
            <?php } ?>
        </header>
        <div class="row">
            <div class="entry-content">
                <?php the_content(); ?>
                <?php if($byline = rwmb_meta( 'smask_byline' )) { ?>
                <footer>
                    <time class="updated" datetime="<?php echo get_the_time(); ?>">Publicerad: <?php echo get_the_date(); ?></time>
                    <p class="byline author vcard">
                        <?php echo $byline; ?>
                    </p>
                </footer>
                <?php } ?>
            </div>
            <div class="entry-extra">
                <?php if($facts = rwmb_meta( 'smask_facts')) { ?>
                <h3>Fakta</h3>
                <?php
                    echo $facts;
                } ?>

                <?php if($images = rwmb_meta( 'smask_images', array('type' => 'image') )) { ?>
                    <h3>Bilder</h3>
                    <div class="row">
                        <?php foreach($images as $image) { ?>
                            <div class="col-xs-6">
                                <a href="<?php echo $image['full_url']; ?>" class="thumbnail img-thumbnail thickbox" title="<?php echo $image['caption']; ?>">
                                    <img src="<?php echo $image['url']; ?>">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </article>
<?php endwhile; ?>
