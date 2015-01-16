<div class="row">
    <div class="page-header col-sm-8">
        <h1>
            <?php echo roots_title(); ?>
        </h1>
    </div>

    <?php $categories = get_categories([
        'type'         => 'post',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => '',
        'taxonomy'     => 'category',
        'pad_counts'   => false
    ]); ?>

    <div class="col-sm-4">
        <select name="event-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'
                class="form-control" style="margin-top: 10px;">
            <option value="">Välj kategori</option>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                $option = '<option value="/category/archives/' . $category->category_nicename . '">';
                $option .= $category->cat_name;
                $option .= ' (' . $category->category_count . ')';
                $option .= '</option>';
                echo $option;
            }
            ?>
        </select>
    </div>
</div>

<?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
    </div>
    <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>
        <div class="entry-summary">
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
        </div>
    </article>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
        <ul class="pager">
            <li class="previous"><?php next_posts_link('&larr; Äldre inlägg'); ?></li>
            <li class="next"><?php previous_posts_link('Nyare inlägg &rarr;'); ?></li>
        </ul>
    </nav>
<?php endif; ?>
