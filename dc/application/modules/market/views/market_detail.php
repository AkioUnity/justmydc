<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.12
 * Time: 12:32 上午
 */
//print_r($markets);
//print_r($markets['type']);
?>

<div class="form-group">
    <label>Type</label>
    <select class="form-control" name="type">
        <?php foreach ($enum_type as $enum):
            ?>
            <option value="<?php echo $enum; ?>" <?php if ($enum == $markets[0]['type']) {
                echo "selected";
            } ?>><?php echo $enum; ?></option>
        <?php
        endforeach; ?>
    </select>
</div>
