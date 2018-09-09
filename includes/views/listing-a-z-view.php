<?php
    include( dirname( __FILE__ ) . '/listing-common.php' );
    $contact_name = $listing->contact_name;
    $address = $listing->address;
    $phone_number = $listing->phone_number;
    $email_address = $listing->email_address;
    $opening_hours = $listing->opening_hours;
    $duration = $listing->duration;
    $map = $listing->map;
    $website = $listing->website;
    $logo = $listing->logo;
    $short_description = $listing->short_description;
    $page_link = $listing->page_link;
    $has_content = $listing->has_content;
    $has_data_row = !empty($address.$opening_hours.$duration.$contact_name.$phone_number.$email_address);
    $has_description_row = !empty($short_description);
    $has_taxonomy_row = $has_content or !empty(post_tags($listing));
    $is_redirect_only = $listing->is_redirect_only;
?>

<div class="directory-item">
    <div class="directory-row">
        <div class="title"><?php
            if (!$is_redirect_only) {
                printf('<a class="listing_title_link" href="%s">%s</a>', $page_link, $title);  
            }
            else {
                 printf('<a class="listing_title_link" href="%s">%s <span class="website-link">➚</span></a>', $page_link, $title); 
            }
         
        ?>
        </div>
        <?php
            if (not_empty($website) and !$is_redirect_only) {
                echo '<div class="website">';  
                echo sprintf( '<div class="website-link"><a href="%s" target="_blank">Visit website ➚</a></div>',$website);  
                echo('</div>'); 
            }
        ?> 
    </div>

    <?php if ($has_data_row) { ?>
    <div class="directory-row info-items">
        <?php 
            echo itemInDiv($address, "item");
            echo itemsInDiv(array($opening_hours, $duration), "item");
            echo itemsInDiv(array($contact_name, $phone_number, $email_address), "item-sm");
        ?>
    </div>
    <?php } ?>

    <?php if ($has_description_row) { ?>
    <div class="directory-row">
        <div>
            <?php echo $short_description ?>
        </div>
    </div>
    <?php } ?>
 
    <?php if ($has_taxonomy_row or $has_content) { ?>
    <div class="directory-row taxonomy"><?php 
        if ($has_content) 
        {
        ?>
            <div class="more-button">
            <?php
                printf( '<a href="%s">&nbsp&nbsp;&nbsp;&nbsp;&nbsp;%s&nbsp;<span class="arrows">&gt;&gt;</span></a>', $page_link, "More" );  
            ?>
            </div><?php
        }
        ?>
        <div>
            <?php
                echo the_post_tags($listing);
            ?>
        </div>
    </div>
    <?php } ?>

</div>

