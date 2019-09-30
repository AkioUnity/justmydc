<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.28
 * Time: 3:12 上午
 */
?>

<button class="accordion">Profile Market<i class="fa fa-angle-double-down"></i></button>
<div class="panel fixed-panel">
    <div class="box-body">
        <form action="<?php echo base_url(); ?>profile/updateProfileMarket?profileId=<?php echo $this->input->get('id') ?>"
              method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                </div>
                <div class="col-lg-7 col-sm-7 col-xs-7">
                    <div class="form-group">
                        <label for="InputMarket">Market</label>
                        <select class="form-control multipleSelectmk" name="markets[]">
                            <option value="">---Select Market---</option>

                            <?php if ($marketLists) {
                                //echo "<pre>"; print_r($categoryLists);die;
                                foreach ($marketLists as $keys => $marketList):
                                    $isSelected = '';
                                    foreach ($marketAddedLists as $marketAddedList) {
                                        if ($marketAddedList['market_id'] == $marketList['market_id']) {
                                            $isSelected = 'selected';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $marketList['market_id'] ?>" <?php echo $isSelected; ?>><?php echo ucfirst($marketList['market_name']); ?></option>
                                <?php
                                endforeach;
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 submit-button">
                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                </div>
            </div>
        </form>
    </div><!-- /.box -->
</div>