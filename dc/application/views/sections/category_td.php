<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.16
 * Time: 3:25 上午
 */
?>
<td>
<div class="box-category">
    <!--                                <img src="-->
    <?php //echo $c_categories['logo_url'];
    ?><!--" alt="Logo " onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/4/48/BLANK_ICON.png';">-->
    <div class="category-detail" >
        <div class="name"><?php echo $c_categories['name']; ?></div>
        <div class="address"><?php echo $c_categories['street']; ?><?php echo '  ' . $c_categories['city'] . ', ' . $c_categories['state']; ?></div>
        <div class="address"></div>
        <div>
            <a href="<?php echo base_url(); ?>categories/unclaimed/<?php echo $c_categories['infogroup_id']; ?>">
                View Profile
            </a>
        </div>
    </div>
</div>
</td>