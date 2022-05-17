<?php
$categories = get_the_terms(get_queried_object_id(),'service_category');

$list1 = array();
$list2 = array();
$counter = 1 ;

if($categories && count($categories)>0){

    // Filter by main categories
    $cat_list = [];
    foreach($categories as $category){
        $parent = get_term( $category->parent );
        if( $parent->parent == 0 ){
            $cat_list[] = $category;
        }
    }

    // Split equal to two cols
    foreach($cat_list as $category){
        if( $counter <= round(count($cat_list)/2) ){
            $list1[$counter] = $category->name;
        }else{
            $list2[$counter] = $category->name;
        }
        $counter++;
    }
}

?>
<?php if( $counter > 2 ): ?>
<!-- service leistungen-->
<div class="c-container c-features">
    <div class="c-row c-row-justify-right">
        <div class="c-col-4  animation-element fade-up">
            <ul class="c-features-list animation">
                <?php foreach($list1 as $key => $value): ?>
                    <li><span class="c-features-nr c-text-small"><?= sprintf("%02d", $key);?></span><?= $value;?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="c-col-4  animation-element fade-up">
            <ul class="c-features-list animation">
                <?php foreach($list2 as $key => $value): ?>
                    <li><span class="c-features-nr c-text-small"><?= sprintf("%02d", $key);?></span><?= $value;?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php else:?>
<div class="c-container c-features">
    <div class="c-row c-row-justify-right">
        <div class="c-col-4">
            No services defines, please add service categories.
        </div>
    </div>
</div>
<?php endif;?>