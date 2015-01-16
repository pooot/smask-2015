<?php
/*
Template Name: SMASK-tidningen
*/
?>
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

<?php
$content = apply_filters('the_content', $post->post_content);
$content = str_replace(']]>', ']]&gt;', $content);

echo $content;

// WP_Query arguments
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type'              => 'post',
    'post_status'            => 'publish',
    'pagination'             => true,
    'posts_per_page'         => '6',
    'paged'                  => $paged,
    'posts_per_archive_page' => '6',
    'order'                  => 'DESC',
    'orderby'                => 'date',
];

// The Query
$query = new WP_Query($args);

// The Loop
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post(); ?>
        <article>
            <?php
            get_template_part('templates/post', 'header');
            get_template_part('templates/content', 'tidning');
            ?>
        </article>
    <?php
    }
} else {
    get_template_part('templates/page', 'header');
}
// Restore original Post Data
wp_reset_postdata();
?>
<nav class="post-nav">
    <ul class="pager">
        <li class="previous"><?php next_posts_link('&larr; Äldre inlägg', $query->max_num_pages); ?></li>
        <li class="next"><?php previous_posts_link('Nyare inlägg &rarr;', $query->max_num_pages); ?></li>
    </ul>
</nav>
