<?php
/*
Template Name: Category Archive
*/
?>

<?php require_once('config.php'); ?>

<?php get_header(); ?>

<div id="single" class="page">

    <div id="top">
        <a class="<?php if (LOGO_FONT) { echo 'icon-icon'; } else { echo 'image-icon'; } ?>" href="javascript:history.back()"></a>
    </div>

    <div class="section">
        <div class="images">
        </div><div class="article">
            <div>
                <div class="content">
                    <div id="archives">
	                <?php
	                global $cat;
	                $cats = get_categories(array(
		                'child_of' => $cat,
		                'parent' => $cat,
		                'hide_empty' => 0
	                ));
	                $c = get_category($cat);
	                foreach($cats as $the_cat){
		                $posts = get_posts(array(
			                'category' => $the_cat->cat_ID,
			                'numberposts' => 100,
		                ));
		                if(!empty($posts)){
			                echo '<h3 class="al_year">'.$the_cat->name.'</h3>
<ul class="al_post_list">';
			                foreach($posts as $post){
				                echo '<li><span class="alignright">'.mysql2date('Y-m-d', $post->post_date).'</span>
<a title="'.$post->post_title.'" href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
			                }
			                echo '</ul>';
		                }
	                } ?>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
