<?php
/*
Plugin Name: Custom Projects Plugin
Description: Custom plugin for Projects custom post type and category taxonomy.
Version: 1.0
Author: Ismena Dev team
Author URI: https://ismena.com/
*/


function create_custom_post_type() {
    register_post_type('project', array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('project_category'),
    ));
}
add_action('init', 'create_custom_post_type');


function create_project_taxonomy() {
    register_taxonomy(
        'project_category',
        'project',
        array(
            'label' => 'Categories',
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_project_taxonomy');


function display_projects($atts) {
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1, 
    );

    $projects = new WP_Query($args);

    if ($projects->have_posts()) {
        $output = '<ul>';

        while ($projects->have_posts()) {
            $projects->the_post();
            // conditions if the user did not fill the corresponding fields , not to have empty HTML
            $mydate = get_post_meta(get_the_ID(), '_project_date', true);
            $mycategs = get_the_term_list(get_the_ID(), 'project_category', '', ', ', '');
            $mycontent = get_the_content();

            $output .= '<li>';
            $output .= '<h2>'. get_the_title() . '</h2>';
            if($mycontent) $output .= '<div>' . get_the_content() . '</div>';
            if($mycategs) $output .= '<div>Category: ' . get_the_term_list(get_the_ID(), 'project_category', '', ', ', '') . '</div>';

            if ($mydate) {
                $formatted_date = date('j M Y', strtotime($mydate));
                $output .= '<div>Date: ' . $formatted_date . '</div>';
            }

            $image = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
            if ($image) {
                $output .= '<div class="project-image">' . $image . '</div>';
            }

            $output .= '</li>';
        }

        $output .= '</ul>';

        wp_reset_postdata();
    } else {
        $output = 'No projects found.';
    }

    return $output;
}
add_shortcode('project_list', 'display_projects');


function add_project_date_field() {
    register_post_type('project', array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('project_category'),
        'register_meta_box_cb' => 'add_project_date_metabox', // Callback to add the date field
    ));
}
add_action('init', 'add_project_date_field');

function add_project_date_metabox() {
    add_meta_box(
        'project_date_metabox',
        'Project Date',
        'display_project_date_metabox',
        'project',
        'side',
        'default'
    );
}

function display_project_date_metabox($post) {
    $project_date = get_post_meta($post->ID, '_project_date', true);
    ?>
    <label for="project_date">Project Date:</label>
    <input type="date" id="project_date" name="project_date" value="<?php echo esc_attr($project_date); ?>" />
    <?php
}

function save_project_date($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['project_date'])) {
        update_post_meta($post_id, '_project_date', sanitize_text_field($_POST['project_date']));
    }
}
add_action('save_post', 'save_project_date');
