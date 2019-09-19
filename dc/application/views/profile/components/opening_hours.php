<h4>opening hour</h4>
<hr/>
<div class="form-group">
    <label class="col-xs-3">&nbsp;</label>
    <div class="checkbox col-xs-9">
        <label>
            <?php $chk = ($chk == '' && get_post_meta($post->id, 'always_open', '') == '1') ? 'checked="checked"' : $chk; ?>
            <input <?php echo $chk; ?> type="checkbox" class="open_24_by_7" value="1"
                                       name="always_open">
            Always Open
        </label>
    </div>
</div>

<span class="opening-hour-container">
                        <?php
                        // updated on version 1.5
                        $days = array(1 => 'monday', 2 => 'tuesday', 3 => 'wednesday', 4 => 'thursday', 5 => 'friday', 6 => 'saturday', 7 => 'sunday');
                        $opening_hour = ($post->opening_hour != '') ? (array)json_decode($post->opening_hour) : array();

                        $default_opening_val = ($this->config->item('opening_hour_format') == '24') ? '09:00' : '09:00 ' . 'AM';
                        $default_closing_val = ($this->config->item('opening_hour_format') == '24') ? '17:00' : '05:00 ' . 'PM';


                        foreach ($days as $key => $day) {
                            ?>
                            <input type="hidden" name="days[]" value="<?php echo $day; ?>">

                            <div class="form-group">
                                <label class="col-xs-3 control-label"><?php echo $day; ?></label>
                                <?php $post_opening = (isset($opening_hour[$key - 1]->start_time)) ? $opening_hour[$key - 1]->start_time : $default_opening_val; ?>
                                <?php $default_opening = (isset($_POST['opening_hour'][$key - 1]) && $_POST['opening_hour'][$key - 1] != '') ? $_POST['opening_hour'][$key - 1] : $post_opening; ?>
                                <?php $post_closing = (isset($opening_hour[$key - 1]->close_time)) ? $opening_hour[$key - 1]->close_time : $default_closing_val; ?>
                                <?php $default_closing = (isset($_POST['closing_hour'][$key - 1]) && $_POST['closing_hour'][$key - 1] != '') ? $_POST['closing_hour'][$key - 1] : $post_closing; ?>
                                <?php $post_closed = (isset($opening_hour[$key - 1]->closed)) ? $opening_hour[$key - 1]->closed : ''; ?>
                                <?php $default_closed = (isset($_POST['closed'][$key - 1]) && $_POST['closed'][$key - 1] != '') ? $_POST['closed'][$key - 1] : $post_closed; ?>

                                <div class="col-xs-3">
                                    <input type="text" id="start-time-<?php echo $key; ?>" name="opening_hour[]"
                                           value="<?php echo $default_opening; ?>"
                                           class="form-control input-sm time-input">

                                </div>
                                <div class="col-xs-3">
                                    <input type="text" id="end-time-<?php echo $key; ?>" name="closing_hour[]"
                                           value="<?php echo $default_closing; ?>"
                                           class="form-control input-sm time-input">

                                </div>
                                <div class="checkbox col-xs-3">
                                    <label>
                                        <?php $chk = ($default_closed == 1) ? 'checked="checked"' : ''; ?>
                                        <input <?php echo $chk; ?> data-day="<?php echo $key; ?>" type="checkbox"
                                                                   class="close-days" value="<?php echo $key; ?>"
                                                                   name="closed_days[]">
                                        closed
                                    </label>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
</span>