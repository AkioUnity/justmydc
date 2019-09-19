<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.06
 * Time: 1:17 上午
 */

if ($c_categories) {?>
    <div class="dropdown">
        <button class="dropbtn">LOCAL Businesses
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" style="width: 230px">
            <?php foreach($c_categories as $c_categories): ?>
                <a href="categories?id=<?php echo $c_categories['id']?>&&name=<?php echo $c_categories['cc_title'] ?>"><?php echo $c_categories['cc_title']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
<?php  }?>