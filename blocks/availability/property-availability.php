<?php

/**
 * Property Availability Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'avilability-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'availability';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>

<table class="table-availability">
    <thead>
        <tr class="table-availability-header">
            <th class="" scope="col">Plot</th>
            <th class="" scope="col">Beds</th>
            <th class="" scope="col">Floors</th>
            <th class="" scope="col">Area SQM</th>
            <th class="" scope="col">Area SGFT</th>
            <th class="" scope="col">Outdoor Space</th>
            <th class="" scope="col">Parking</th>
        </tr>
    </thead>
    <tbody>
    <?php
        // check if the repeater field has rows of data
        if( have_rows('availability_table') ):
        // loop through the rows of data for the tab header
        while ( have_rows('availability_table') ) : the_row();
    
        // Load values and assign defaults.
        $plot = get_sub_field('property_plot') ?: '';
        $beds = get_sub_field('property_beds') ?: '';
        $floors = get_sub_field('property_floors') ?: '';
        $areasqm = get_sub_field('property_area_sqm') ?: '';
        $areasgft = get_sub_field('property_area_sgft') ?: '';
        $outdoorspace = get_sub_field('property_outdoor_space') ?: '';
        $parking = get_sub_field('property_parking') ?: '';
        ?>
        <tr class="table-availability-row">
        <td class="col-availability" data-label="Plot"><?php echo $plot; ?></td>
        <td class="col-availability" data-label="Beds"><?php echo $beds; ?></td>
        <td class="col-availability" data-label="Floors"><?php echo $floors; ?></td>
        <td class="col-availability" data-label="Area SQM"><?php echo $areasqm; ?></td>
        <td class="col-availability" data-label="Area SGFT"><?php echo $areasgft; ?></td>
        <td class="col-availability" data-label="Outdoor Space"><?php echo $outdoorspace; ?></td>
        <td class="col-availability" data-label="Parking"><?php echo $parking; ?></td>
        </tr>
            <?php
// End loop.
endwhile;
// No value.
else :
// Do something...
endif; ?>
    </tbody>
</table>