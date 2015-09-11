<?php
/**
 *      Admin Page
 */
add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu()
{
    add_options_page('My Plugin Options', 'Single page', 'manage_options', 'my-unique-identifier', 'my_plugin_options');
}

/** Step 3. */
function my_plugin_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    $this->title();
    $this->enable();

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
function title()
{
    echo('<div class="wrap"><h1>');
    echo('Single page');
    echo('</h1>');
}

/*
 * enable/disable plugin
 */
function enable()
{
    echo("<label for='uploads_use_yearmonth_folders'>");
    echo('<input name="uploads_use_yearmonth_folders" type="checkbox" id="uploads_use_yearmonth_folders" value="1"<?php checked("1", get_option("uploads_use_yearmonth_folders")); ?> />');
    _e('Organize my uploads into month- and year-based folders');
}

?>

