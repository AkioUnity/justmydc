<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.06
 * Time: 1:17 上午
 */

if ($c_categories) {?>
    <li class="dropdown">
        <a href="#">LOCAL Businesses <b class="caret"></b></a>
        <div class="dropdown-content" style="width: 230px">
            <?php foreach($c_categories as $c_categories): ?>
                <p><a href="categories?id=<?php echo $c_categories['id']?>&&name=<?php echo $c_categories['cc_title'] ?>"><?php echo $c_categories['cc_title']; ?></a></p>
            <?php endforeach; ?>
        </div>
    </li>
<?php  }?>