<?php

// Add the field to the order edit page in admin
function wikiplus_tracking_field_in_admin($order){
  ?>
  <div class="form-field form-field-wide">
      <label for="tracking_code"><?php _e('کد رهگیری پست', 'woocommerce'); ?> :</label>
      <input type="text" name="tracking_code" id="tracking_code" value="<?php echo esc_attr(get_post_meta($order->get_id(), '_tracking_code', true)); ?>">
  </div>
  <?php
}
add_action('woocommerce_admin_order_data_after_shipping_address', 'wikiplus_tracking_field_in_admin');

// Save the custom field value
function wikiplus_save_tracking_field($order_id){
  if (isset($_POST['tracking_code'])) {
      update_post_meta($order_id, '_tracking_code', sanitize_text_field($_POST['tracking_code']));
  }
}
add_action('woocommerce_process_shop_order_meta', 'wikiplus_save_tracking_field');

?>