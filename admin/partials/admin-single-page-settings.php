<?php
/**
 *      Admin Page
 */
add_action('admin_menu', 'wp_single_page_menu');

function wp_single_page_menu()
{
    add_options_page('My Plugin Options', 'Single page', 'manage_options', 'my-unique-identifier', 'wp_single_page_options');
}

/** Step 3. */
function wp_single_page_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    $this->wp_single_page_title();
    $this->wp_single_page_enable();

    $pages = 6;
    for ($i = 1; $i < $pages; $i++) {
        ?>
        <li><label
                for="page_on_front"><?php printf(__("Front page: %s"), wp_dropdown_pages(array("name" => "page_on_front", "echo" => 0, "show_option_none" => __("&mdash; Select &mdash;"), "option_none_value" => "0", "selected" => get_option("page_on_front")))); ?></label>
        </li>
        <?php
    }
}

/*
 * Title of the page
 */
function wp_single_page_title()
{
    echo('<div class="wrap"><h1>');
    echo('Single page');
    echo('</h1>');
}

/*
 * enable/disable plugin
 */
function wp_single_page_enable()
{
    echo("<label for='enable_wp_single_page'>");
    echo('<input name="enable_wp_single_page" type="checkbox" id="enable_wp_single_page" value="1"<?php checked("1", get_option("enable_wp_single_page")); ?> />');
}

?>

