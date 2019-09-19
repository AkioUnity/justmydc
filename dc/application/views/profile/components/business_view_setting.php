<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.17
 * Time: 12:38 上午
 */
if (isset($isViewMode)){
    function editBtn($id){
        echo "";
    }
    ?>
    <style>
        .img_click{
            display: none;
        }
    </style>

<?php }else{ ?>

    <button class="btn btn-info btn-lg business_submit" type="submit">save</button>
    <img class="img_click carousel" onclick="editValue('gallery')" data-toggle='modal' data-target='#galleryModal'
         src="<?php echo image_url('cross_icon.png') ?>"/>

<?php
    foreach ($post as $key => $value) {
        echo "<input type='hidden' name='$key' placeholder='$key' value='$value'>";
    }

    function editBtn($id){
        echo "<img class='img_click' onclick=\"editValue('".$id."')\" src=".image_url('cross_icon.png')."  data-toggle=\"modal\" data-target=\"#myModal\" >";
    }
}?>


<style>
    .business_submit{
        position: absolute;
        margin:4rem;
        z-index: 1;
    }

    .img_click.carousel{
        position: absolute;
        z-index: 1;
        margin: 4rem;
        right: 0;
    }
</style>

<div class="modal fade" id="galleryModal" role="dialog" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Gallery Images</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="div-crop">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary onclick_save" data-dismiss="modal">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>