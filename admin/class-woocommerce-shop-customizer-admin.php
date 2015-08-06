<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://localleadminer.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Shop_Customizer
 * @subpackage Woocommerce_Shop_Customizer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Shop_Customizer
 * @subpackage Woocommerce_Shop_Customizer/admin
 * @author     mbj-webdevelopment <mbjwebdevelopment@gmail.com>
 */
class Woocommerce_Shop_Customizer_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->load_dependencies();
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Shop_Customizer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Shop_Customizer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/woocommerce-shop-customizer-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Shop_Customizer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Shop_Customizer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/woocommerce-shop-customizer-admin.js', array('jquery'), $this->version, false);
        wp_enqueue_script('woocommerce-shop-coutomizer-accourdion', plugin_dir_url(__FILE__) . 'js/accordion.js', array('jquery'), $this->version, false);
        wp_enqueue_script('woocommerce-shop-coutomizer-defualt-jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array('jquery'), $this->version, false);
    }

    /**
     * 
     */
    public function load_dependencies() {
        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/woocommerce-shop-customizer-admin-display.php';
    }

    public function clivern_plugin_render_options_page() {
        add_options_page('My Layout', 'My Layout', 'manage_options', 'my-plugin', array($this, 'my_plugin_page'));
    }    

    public function my_plugin_page() {
        global $mfwp_options;
        $row_value = get_option('number_of_grid_display');
        $row = $row_value['number_of_grid'];
        ?>
        <div class="accordion">
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-1">Select Number Of Product Display in One Row</a>
                <div id="accordion-1" class="accordion-section-content">
                    <form style="" action="options.php" method="POST"> 
                        <?php settings_fields('myoption-group'); ?> 
                        <table>
                            <tr>
                                <td style="text-align: center">
                                <?php
                                if ($row == '1') {
                                    $checked = 'checked';
                                } else {
                                    $checked = "";
                                }
                                ?>
                                    <input type="radio" name="number_of_grid_display[number_of_grid]" value="1" <?php echo $checked; ?>/>
                                    <table border="1" width="100" height="100">
                                        <th colspan="1">One</th>
                                        <tr><td height="100"></td></tr>
                                    </table>
                                </td>
                                <td style="text-align: center">
                                <?php
                                if ($row == '2') {
                                    $checked = 'checked';
                                } else {
                                    $checked = "";
                                }
                                ?>
                                    <input type="radio" name="number_of_grid_display[number_of_grid]" value="2" <?php echo $checked; ?> />
                                    <table border="1" width="100" height="100">
                                        <th colspan="2">Two</th>
                                        <tr><td height="100"></td><td height="100"></td></tr>
                                    </table>
                                </td>
                                <td style="text-align: center">
                                <?php
                                if ($row == '3') {
                                    $checked = 'checked';
                                } else {
                                    $checked = "";
                                }
                                ?>
                                    <input type="radio" name="number_of_grid_display[number_of_grid]" value="3" <?php echo $checked; ?> />
                                    <table border="1" width="100" height="100">
                                        <th colspan="3">Three</th>
                                        <tr><td height="100"></td><td height="100"></td><td height="100"></td></tr>
                                    </table>
                                </td>
                                <td style="text-align: center">
                                <?php
                                if ($row == '4') {
                                    $checked = 'checked';
                                } else {
                                    $checked = "";
                                }
                                ?>
                                    <input type="radio" name="number_of_grid_display[number_of_grid]" value="4" <?php echo $checked; ?> />
                                    <table border="1" width="100" height="100">
                                        <th colspan="4">Four</th>
                                        <tr><td height="100"></td><td height="100"></td><td height="100"></td><td height="100"></td></tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        <br />
                        <hr />
                        <br />
                        <table>
                            <tr>
                                <td>
                                    <label>Show the product description underneath an image:</label>
                                </td>
                                <td>
                                    <input type="radio" name="number_of_grid_display[under_image_desription]" value="1" <?php if ( $row = $row_value['under_image_desription'] == '1' )  echo 'checked'; ?> > Yes 
                                    <input type="radio" name="number_of_grid_display[under_image_desription]" value="0" <?php if ( $row = $row_value['under_image_desription'] == '0' )  echo 'checked'; ?> > No
                                </td>
                            </tr>
                        </table>
                        <br />
                        <hr />
                        <br />
                      <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->

            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-2">Automatically Add Product In Visit Site</a>
                <div id="accordion-2" class="accordion-section-content">
                    <form action="options.php" method="POST"> 
                     <?php settings_fields('defualt_cart_value_add'); ?> 
                        <lable>Product Name Select:</lable>
                        <?php
                        $args = array('post_type' => 'product');
                        $loop = new WP_Query($args);
                        if ($loop->have_posts()) {
                            ?>
                            <select name="defualt_cart_value[defualt_cart_item]"><?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                    <option value="<?php echo the_id(); ?>"><?php echo the_title(); ?></option><?php endwhile;
                            ?>
                            </select><?php
            } else {
                echo __('No products found');
            }
                        wp_reset_postdata();
                        ?>
                        <br />
                        <hr />
                        <br />
                        <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->

            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-3">Remove Specific or All of The Product Tabs in Single Page View</a>
                <div id="accordion-3" class="accordion-section-content">
                    <form action="options.php" method="POST"> 
                        <?php
                        settings_fields('checkbox_check_remove_product_tab');

                        $row_value = get_option('checkbox_check_remove_tab');
                        if (is_array($row_value)) {
                            $description = $row_value['description'];
                            $reviews = $row_value['reviews'];
                            $information = $row_value['information'];
                        }
                        ?>
                        <input type="checkbox" name="checkbox_check_remove_tab[description]" value="description" <?php if ($description === 'description') echo 'checked="checked"'; ?>> Description
                        <input type="checkbox" name="checkbox_check_remove_tab[reviews]" value="reviews" <?php if ($reviews === 'reviews') echo 'checked="checked"'; ?>> Reviews
                        <input type="checkbox" name="checkbox_check_remove_tab[information]" value="information" <?php if ($information === 'information') echo 'checked="checked"'; ?>> Additional Information <br />  <br />
                        <br />
                        <hr />
                        <br />
                        <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-4">Single Product Tab Settings</a>
                <div id="accordion-4" class="accordion-section-content">
                    <form action="options.php" method="POST"> 
                        <?php
                        settings_fields('select_priority_in_dropdown_list');
                        $row_value = get_option('select_priority_in_dropdown');
                        $row_array = array('5' => 'Firest',
                            '10' => 'Second');
                        if (is_array($row_value)) {
                            $description = $row_value['description'];
                            $reviews = $row_value['reviews'];
                            //$information = $row_value['information'];  
                        }
                        ?>
                        <label>Select Tab Priority Reviews: </label>
                        <select name="select_priority_in_dropdown[reviews]">
                        <?php
                        foreach ($row_array as $key => $value) {
                            ?>
                                <option value="<?php echo $key; ?>" <?php if ($key == $reviews) echo "selected='selected'"; ?>><?php echo $value; ?></option>
                                <?php
                            }
                            ?>                                
                        </select>
                        <label>Rename Review Tab:</label><input type="text" name="select_priority_in_dropdown[rename_reviews]" value="<?php echo $row_value['rename_reviews']; ?>">
                        <br /><br />
                        <label>Select Tab Priority Discription: </label>
                        <select name="select_priority_in_dropdown[description]">
                            <?php
                            foreach ($row_array as $key => $value) {
                                ?>
                                <option value="<?php echo $key; ?>" <?php if ($key == $description) echo "selected='selected'"; ?>><?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label>Rename Discription Tab: </label><input type="text" name="select_priority_in_dropdown[rename_descriptiom]" value="<?php echo $row_value['rename_descriptiom']; ?>">
                        <br /><br /><hr />
                        <label>Add Custom Title: </label><input type="text" name="select_priority_in_dropdown[custom_title_tab]" value="<?php echo $row_value['custom_title_tab']; ?>">
                        <label>Add Custom Description: </label><textarea name="select_priority_in_dropdown[custom_descriptiom_tab]"><?php echo $row_value['custom_descriptiom_tab']; ?></textarea>
                        <br /><br /><hr />
                        <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section--> 
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-5">Remove product content based on the category</a>
                <div id="accordion-5" class="accordion-section-content">
                    <form action="options.php" method="POST">     
                        <?php  settings_fields('remove_selected_category_register');   ?>
                        <label>Select Category Remove the Content: </label><br /><hr /><br />
                         <?php 
                            settings_fields('remove_selected_category_register');
                            $row_value = get_option('remove_selected_category_value');                            
                            $count=0;
                            $args = array( 'taxonomy' => 'product_cat' );
                            $terms = get_terms( 'product_cat', $args );
                            $checked = "";
                            foreach ( $terms as $key => $value ) {
                                $count = $count + 1;   
                                $row = $row_value[$terms[$key]->name];
                                $category_name = $terms[$key]->name;
                                if(strlen($row) > 0 ) {
                                    if( $category_name == $row ) { 
                                        $checked = "checked='checked'";                                    
                                    }
                                    else {
                                        $checked = "";
                                    }
                                } 
                                 else {
                                        $checked = "";
                                    }
                                
                            ?> 
                                <input type="checkbox" name="remove_selected_category_value[<?php echo $terms[$key]->name; ?>]" value="<?php echo $terms[$key]->name; ?>" <?php echo $checked; ?>> <?php echo $terms[$key]->name; if ( $count == '5' ) echo "<br/>"; ?>
                           <?php
                            }
                            
                         ?>
                        <br />
                        <hr />
                        <br />
                        <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-6">Don't Display products from a particular category on the shop page</a>
                <div id="accordion-6" class="accordion-section-content">
                    <form action="options.php" method="POST">     
                        <?php  settings_fields('do_not_show_category_on_the_shop_page');   ?>
                        <label>Checked products from a particular category to Don't show on the shop page: </label><br /><hr /><br />
                         <?php 
                            settings_fields('do_not_show_category_on_the_shop_page_register');
                            $row_value = get_option('do_not_show_category_on_the_shop_page');                            
                            $count=0;
                            $args = array( 'taxonomy' => 'product_cat' );
                            $terms = get_terms( 'product_cat', $args );
                            $checked = "";
                            if(is_array( $row_value ) && count($row_value) > 0 ) {
                                 foreach ($terms as $key => $value) {
                                        $count = $count + 1;
                                        $row = $row_value[$terms[$key]->name];
                                        $category_name = $terms[$key]->name;
                                        if (strlen($row) > 0) {
                                            if ($category_name == $row) {
                                                $checked = "checked='checked'";
                                            } else {
                                                $checked = "";
                                            }
                                        } else {
                                            $checked = "";
                                        }
                                        ?> 
                                                <input type="checkbox" name="do_not_show_category_on_the_shop_page[<?php echo $terms[$key]->name; ?>]" value="<?php echo $terms[$key]->name; ?>" <?php echo $checked; ?>> <?php echo $terms[$key]->name;
                        if ($count == '5') echo "<br/>"; ?>
                                        <?php
                                    }
                            } else { 
                                    foreach ($terms as $key => $value) {
                                    ?>
                                        <input type="checkbox" name="do_not_show_category_on_the_shop_page[<?php echo $terms[$key]->name; ?>]" value="<?php echo $terms[$key]->name; ?>" <?php echo $checked; ?>> <?php echo $terms[$key]->name; if ($count == '5') echo "<br/>"; ?>
                                    <?php
                                    }
                                
                            }
                            
                           
                            
                         ?>
                        <br />
                        <hr />
                        <br />
                        <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-7">Add a checkbox field to checkout with a simple snippet</a>
                <div id="accordion-7" class="accordion-section-content">
                    <form action="options.php" method="POST">   
                        <?php  
                            settings_fields('check_box_tital_text_chekout_page_register');
                            $row_option_value = get_option('check_box_tital_text_chekout_page'); 
                            
                        ?>
                        
                        <label>Display Terms & Conditions Checkbox: </label>
                        <input type="radio" name="check_box_tital_text_chekout_page[radio_button_check_display]" value="1" <?php if ( $row_option_value['radio_button_check_display'] == '1' ) echo 'checked'; ?>> Yes
                        <input type="radio" name="check_box_tital_text_chekout_page[radio_button_check_display]" value="0" <?php if ( $row_option_value['radio_button_check_display'] == '0' ) echo 'checked'; ?>> No
                        
                        <br />
                        <hr />
                        <label>Check Box Tital: </label><input type="text" name="check_box_tital_text_chekout_page[check_box_tital_display]" value="<?php echo $row_option_value['check_box_tital_display']; ?>">
                        <label>Check Box Text:  </label><input type="text" name="check_box_tital_text_chekout_page[check_box_text_display]" value="<?php echo $row_option_value['check_box_text_display']; ?>">
                        <br />
                        <hr />
                        <br />                        
                        <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-8">Want to alter the default state and country at the checkout</a>
                <div id="accordion-8" class="accordion-section-content">
                    <form action="options.php" method="POST">   
                        <?php
                        settings_fields('defualt_set_code_country_and_state_register');
                        $row_option_value = get_option('defualt_set_code_country_and_state');                        
                        ?>
                        <label>Enter Your Defualt <b>Country</b> Code: </label> <input type="text" name="defualt_set_code_country_and_state[country]" value="<?php if (strlen($row_option_value['country']) > 0 ) echo $row_option_value['country']; ?>"><br /><br />
                        <label>Enter Your Defualt <b>State</b> Code: </label> <input type="text" name="defualt_set_code_country_and_state[state]" value="<?php if (strlen($row_option_value['state']) > 0 ) echo $row_option_value['state']; ?>">
                        <hr />
                        <label>Rename Add to Cart Text Button In Single Page: </label> <input type="text" name="defualt_set_code_country_and_state[add_to_cart_rename]" value="<?php if (strlen($row_option_value['add_to_cart_rename']) > 0 ) echo $row_option_value['add_to_cart_rename']; ?>"><br /><br />
                        <br />
                        <hr />
                        <label>Rename Add to Cart Text Button Product Archives: </label> <input type="text" name="defualt_set_code_country_and_state[add_to_cart_rename_all_product]" value="<?php if (strlen($row_option_value['add_to_cart_rename_all_product']) > 0 ) echo $row_option_value['add_to_cart_rename_all_product']; ?>"><br /><br />
                        <br />
                        <hr />
                        <br />                        
                        <input type="submit" name="submit" class="button button-primary button-large" value="Save">
                    </form>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
        </div><!--end .accordion-->
        <?php
    }

    /*
     * Register Option Table add option table data
     */

    public function register_myoptions() {
        register_setting('myoption-group', 'number_of_grid_display');
        register_setting('defualt_cart_value_add', 'defualt_cart_value');
        register_setting('checkbox_check_remove_product_tab', 'checkbox_check_remove_tab');
        register_setting('select_priority_in_dropdown_list', 'select_priority_in_dropdown');
        register_setting('remove_selected_category_register', 'remove_selected_category_value');
        register_setting('do_not_show_category_on_the_shop_page_register', 'do_not_show_category_on_the_shop_page');
        register_setting('check_box_tital_text_chekout_page_register', 'check_box_tital_text_chekout_page');
        register_setting('defualt_set_code_country_and_state_register', 'defualt_set_code_country_and_state');
    }

    /*
     * Store column count for displaying the grid
     */

    public function loop_shop_columns_own($var) {
        $no_row = get_option('number_of_grid_display');
        return $no_row ['number_of_grid'];
    }

    /*
     * Automatic add product in cart page
     */

    public function add_product_to_cart() {
        if (!is_admin()) {
            $row_product_id = get_option('defualt_cart_value');
            $product_id = $row_product_id['defualt_cart_item'];
            $found = false;
            //check if product already in cart
            if (sizeof(WC()->cart->get_cart()) > 0) {
                foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
                    $_product = $values['data'];
                    if ($_product->id == $product_id)
                        $found = true;
                }
                // if product not found, add it
                if (!$found)
                    WC()->cart->add_to_cart($product_id);
            } else {
                // if no products in cart, add it
                WC()->cart->add_to_cart($product_id);
            }
        }
    }

    /*
     * Remove Product tab in single page product desplay
     */

    public function woo_remove_product_tabs($tabs) {

        $row_value = get_option('checkbox_check_remove_tab');
        if (is_array($row_value)) {
            foreach ($row_value as $key => $value) {
                unset($tabs[$value]); // Remove the tab
            }
        }

        return $tabs;
    }

    /*
     * Want to re-order the product tabs
     */

    public function woo_reorder_tabs($tabs) {

        $row_value = get_option('select_priority_in_dropdown');
        if (is_array($row_value)) {
            
            foreach ($row_value as $key => $value) {
                if ( $value == 'description' || $value == 'reviews') {
                    $tabs[$key]['priority'] = $value;
                }
                
            }
        }
        return $tabs;
    }    
    /*
     * Rename Single Product Tab
     */
    
    public function woo_rename_tab($tabs) {
        $row_value = get_option('select_priority_in_dropdown');
        $reviews_title = $row_value['rename_reviews'];
        $description_title = $row_value['rename_descriptiom'];
        if ( strlen($reviews_title) > 0 || strlen($description_title) > 0 ) {
            $tabs['reviews']['title'] = $reviews_title;
            $tabs['description']['title'] = $description_title;        
        }        
        return $tabs;
    }
    
    /*
     * Personalise a product tab Custom Description Tab
     */
    
    public function woo_custom_description_tab($tabs) {
        $tabs['description']['callback'] = array($this, 'woo_custom_description_tab_content'); // Custom description callback
        return $tabs;
    }
    
    public function woo_custom_description_tab_content() {
        $row_value = get_option('select_priority_in_dropdown');
        $custom_title = $row_value['custom_title_tab'];
        $custom_description = $row_value['custom_descriptiom_tab'];
        
        echo '<h2>'.$custom_title.'</h2>';
	echo '<p>'.$custom_description.'</p>';
    }
    
    /*
     * Adding category, excerpt, and SKU to shop page 
     */
    
    public function prima_custom_shop_item () {
        global $post, $product;
        $row_value = get_option('number_of_grid_display');
        $row = $row_value['under_image_desription'];
        
        if ( $row == '1' ) {
            /* product categories */
            $size = sizeof(get_the_terms($post->ID, 'product_cat'));
            echo $product->get_categories(', ', '<p>' . _n('Category:', 'Categories:', $size, 'woocommerce') . ' ', '.</p>');
            /* product excerpt */
            if ($post->post_excerpt) {
                echo apply_filters('woocommerce_short_description', $post->post_excerpt);
            }
            /* product sku */
            echo '<p>SKU: ' . $product->get_sku() . '</p>';
        }        
    } 
    
    /*
     * Remove product content based on the category
     */
    
    public function remove_product_content() {
        // If a product in the 'Cookware' category is being viewed...        
        $row_value = get_option('remove_selected_category_value');
        if( is_array($row_value )) {
            foreach ($row_value as $key => $value) {                
                if (is_product() && has_term($value, 'product_cat')) {
                    //... Remove the images
                    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
                    // For a full list of what can be removed please see woocommerce-hooks.php
                }                
            }
        }       
    }
    
    /*
     * Don’t want products from a particular category to show on the shop page
     */
    
    public function custom_pre_get_posts_query ($q) {
        $row_value = get_option('do_not_show_category_on_the_shop_page');
        if (!$q->is_main_query())
            return;
        if (!$q->is_post_type_archive())
            return;
        if (!is_admin()) {            
                $q->set('tax_query', array(array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $row_value, // Don't display products in the membership category on the shop page . For multiple category , separate it with comma.
                        'operator' => 'NOT IN'
                )));             
        }
        remove_action('pre_get_posts', 'custom_pre_get_posts_query');
    }    
    
    /**
    * Add checkbox field to the checkout
    **/
    
    public function my_custom_checkout_field( $checkout ) {
        global $display_terms_condition;
        $display_terms_condition = 'no';
        $row_option_value = get_option('check_box_tital_text_chekout_page');
        $display_terms_condition = $row_option_value['radio_button_check_display'];
        if ( $display_terms_condition == '1' ) {
            
            $tital = $row_option_value['check_box_tital_display'];
            $text = $row_option_value['check_box_text_display'];
            echo '<div id="my-new-field"><h3>' . __($tital) . '</h3>';

            woocommerce_form_field('my_checkbox', array(
                'type' => 'checkbox',
                'class' => array('input-checkbox'),
                'label' => __($text),
                'required' => true,
                    ), $checkout->get_value('my_checkbox'));

            echo '</div>';
        }
       
    }
    
    /**
     * Process the checkout
     * */  
    
    public function my_custom_checkout_field_process() {
       
        if ( $display_terms_condition == '1' ) {
             global $woocommerce;
        // Check if set, if its not set add an error.
        if (!$_POST['my_checkbox'])
        $this->add_error( __('Please agree to my checkbox.') );
        }
        
              
    }   
    
    /**
    * Update the order meta with field value
    **/

    public function my_custom_checkout_field_update_order_meta( $order_id ) { 
        
        
            if ($_POST['my_checkbox']) update_post_meta( $order_id, 'My Checkbox', esc_attr($_POST['my_checkbox']));
       
       
   }
   
   /**
    * Manipulate default state and countries
   */

    public function change_default_checkout_country() {
        
        $row_option_value = get_option('defualt_set_code_country_and_state');  
        return $row_option_value['country']; // country code
    }
    public function change_default_checkout_state() {
        
        $row_option_value = get_option('defualt_set_code_country_and_state'); 
        return $row_option_value['state']; // state code
    }
    
    /**
    * Customise ‘add to cart’ text on single product pages
   */
    
    public function woo_custom_cart_button_text() {
        
        $button_text = "Add to cart";
        $row_option_value = get_option('defualt_set_code_country_and_state');
        if (is_array($row_option_value)) {
            
            if (strlen($row_option_value['add_to_cart_rename']) > 0 ) {
                
                $button_text = $row_option_value['add_to_cart_rename'];
            }
            
        }        
        return __( $button_text, 'woocommerce' );
 
    }
    
     /**
    * Change the ‘add to cart’ text on product archives
   */
    
    public function woo_custom_cart_button_text_archive() {
        $button_text = "Add to cart";
        $row_option_value = get_option('defualt_set_code_country_and_state');
        if (is_array($row_option_value) ) {
            
            if (strlen($row_option_value['add_to_cart_rename_all_product']) > 0 ) {
                
                $button_text = $row_option_value['add_to_cart_rename_all_product'];
            }
                
        }
        return __( $button_text, 'woocommerce' );
 
    }
    
    /**
     * 
     * Hide the coupon form on the cart or checkout page to encourage a steamlined order process
     */
    
    public function hide_coupon_field( $enabled ) {

        $display_coupon = true;
        $row_option_value = get_option('defualt_set_code_country_and_state');
        
        
	if ( is_cart() || is_checkout() ) {
		$enabled = $display_coupon;
	}
	
	return $enabled;
    }
    
    

}
