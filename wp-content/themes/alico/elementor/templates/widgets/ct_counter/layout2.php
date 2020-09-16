<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'ct-counter-number-value',
    'data-duration' => $settings['duration'],
    'data-to-value' => $settings['ending_number'],
] );

if ( ! empty( $settings['thousand_separator'] ) ) {
    $delimiter = empty( $settings['thousand_separator_char'] ) ? ',' : $settings['thousand_separator_char'];
    $widget->add_render_attribute( 'counter', 'data-delimiter', $delimiter );
}

$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$primary_color = alico_get_opt( 'primary_color' );
?>
<div class="ct-counter ct-counter-layout2 <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-counter-inner">
        <div class="ct-counter-holder">
            <div class="ct-counter-holder-inner">
                <?php if ( $settings['ct_icon_type'] == 'icon' && $has_icon ) : ?>
                    <div class="item--icon">
                        <?php if($is_new):
                            \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                            else: ?>
                            <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( $settings['ct_icon_type'] == 'image' && !empty($settings['ct_icon_image']['id']) ) : ?>
                    <div class="item--icon">
                        <?php $img_icon  = ct_get_image_by_size( array(
                                'attach_id'  => $settings['ct_icon_image']['id'],
                                'thumb_size' => 'full',
                            ) );
                            $thumbnail_icon    = $img_icon['thumbnail'];
                        echo ct_print_html($thumbnail_icon); ?>
                    </div>
                <?php endif; ?>
                <div class="ct-counter-number">
                    <span class="ct-counter-number-prefix"><?php echo ct_print_html($settings['prefix']); ?></span>
                    <span <?php ct_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
                    <span class="ct-counter-number-suffix"><?php echo ct_print_html($settings['suffix']); ?></span>
                </div>
            </div>
            <div class="ct-piechart">
                <div class="item--value percentage" data-size="<?php echo esc_attr($settings['chart_size']['size']); ?>" data-bar-color="<?php if(!empty($settings['bar_color'])) { echo esc_attr($settings['bar_color']); } else { echo esc_attr($primary_color); } ?>" data-track-color="" data-line-width="10" data-percent="-<?php echo esc_attr($settings['percentage_value']); ?>" style="height: <?php echo esc_attr($settings['chart_size']['size']); ?>px;width: <?php echo esc_attr($settings['chart_size']['size']); ?>px;"></div>
            </div>
        </div>
        <div class="ct-counter-content">
            <?php if ( $settings['title'] ) : ?>
                <h4 class="ct-counter-title"><?php echo ct_print_html($settings['title']); ?></h4>
            <?php endif; ?>
            <?php if ( $settings['desc'] ) : ?>
                <div class="ct-counter-desc"><?php echo ct_print_html($settings['desc']); ?></div>
            <?php endif; ?>
        </div>
        
    </div>
</div>