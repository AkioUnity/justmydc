<style>
    .box-title-html-part {
        text-align: center !important;
        font-size: 18px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    .container {
        width: 100% !important;
        margin-top: 20px;
    }

    .addmore-wrap .form-control {
        margin-bottom: 5px;
    }

    .add-row-wrap .copy-row:first-child {
        margin-top: 10px;
    }

    .add-row-wrap .copy-row:first-child .del-extra-row-2 {
        display: none;
    }

    .copy-row i {
        font-size: 20px;
        margin: 0 8px;
    }
</style>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
            <h3 class="box-title-html-part">Post Content</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="addmore-wrap">
                <div class="row">
                    <div class="col-12">
                        <span style="font-size: 15px">click to add section:</span>
                        <?php
                        foreach ($sectionList as $section):
                            ?>
                            <a class="btn btn-link"
                               href="javascript:addSection(<?php echo $section['section_id']; ?>,'<?php echo $section['section_name']; ?>');"><?php echo $section['section_name']; ?>
                            </a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <div class="add-row-wrap" style="margin-top: 15px" id="accordion">
                        <div class="copy-row row" style="display: none;">
                            <div class="col-sm-1 text-center"><label
                                        class="count">order:</label>
                            </div>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="order[]"
                                       value="">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" readonly
                                       name="section_name[]"
                                       value="">
                            </div>
                            <input type="hidden" class="form-control"
                                   name="section_id[]"
                                   value="0">
                            <input type="hidden" class="form-control"
                                   name="post_section_id[]"
                                   value="0">
                            <div class="col-sm-2">
                                <!--                                <button type="button" class="btn btn-info" onclick="Edit()">Edit</button>-->
                                <!--                                <button type="button" class="btn btn-success" onclick="Preview()">Preview-->
                                <!--                                </button>-->
                            </div>
                            <div class="col-sm-1">
                                <a class="del-extra-row-2"
                                   href="javascript:void(0);"><i
                                            class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <?php if  (isset($post_section) && count($post_section) > 0) {
                            $p = 1;
                            $j = 0;
                            foreach ($post_section

                                     as $section):
                                ?>
                                <div class="copy-row">
                                    <div class="row">
                                        <div class="col-sm-1 text-center"><label
                                                    class="count">order:</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control"
                                                   name="order[]"
                                                   value="<?php echo $section['order']; ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" readonly
                                                   name="section_name[]"
                                                   value="<?php echo $section['section_name']; ?>">
                                        </div>
                                        <input type="hidden" class="form-control"
                                               name="post_section_id[]"
                                               value="<?php echo $section['id']; ?>">
                                        <input type="hidden" class="form-control"
                                               name="section_id[]"
                                               value="<?php echo $section['section_id']; ?>">
                                        <div class="col-sm-2">
                                            <a class="btn btn-info" data-toggle="collapse" role="button"
                                               href="#edit<?php echo $section['id'] ?>" data-parent="#accordion"
                                               aria-controls="edit<?php echo $section['id'] ?>">
                                                Edit
                                            </a>
                                            <a class="btn btn-success" data-toggle="collapse" role="button"
                                               href="#preview<?php echo $section['id'] ?>" data-parent="#accordion"
                                               aria-controls="preview<?php echo $section['id'] ?>">Preview
                                            </a>
                                        </div>

                                        <div class="col-sm-4">
                                            <a class="del-extra-row-2"
                                               href="javascript:void(0);"><i
                                                        class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="edit<?php echo $section['id'] ?>">
                                        <div class="form-group container">
                                            <?php foreach ($section['section'] as $parameter) {
                                                if ($section['section_name']=='Header Section' && ($parameter->name=='input_title1' || $parameter->name=='input_title2')){ ?>
                                                    <input type="hidden" value="parameter<?php echo $parameter->parameter_id ?>"
                                                           name="<?php echo $parameter->name ?>">
                                                    <input type="hidden" name="parameter<?php echo $parameter->parameter_id ?>"
                                                           value="<?php echo $parameter->value ?>">
                                                <?php
                                                    continue;
                                                }
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <?php echo $parameter->name ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <?php if ($parameter->type == 'editor') { ?>
                                                            <textarea class="form-control" id="parameter<?php echo $parameter->parameter_id ?>"
                                                                      name="parameter<?php echo $parameter->parameter_id ?>">
                                                                <?php echo $parameter->value ?>
                                                            </textarea>
                                                            <script>
                                                                CKEDITOR.replace("parameter<?php echo $parameter->parameter_id ?>");
//                                                            </script>
                                                        <?php }else{ ?>
                                                        <input type="text" class="form-control"
                                                               name="parameter<?php echo $parameter->parameter_id ?>"
                                                               value="<?php echo $parameter->value ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="collapse" id="preview<?php echo $section['id'] ?>">
                                        <div class="col-12" style="padding: 10px;">
                                            <?php echo $section['content'] ?>
                                        </div>
                                    </div>
                                </div>

                                <?php $p++;
                                $j++;
                            endforeach;
                            ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--end of container-->
        </div>
    </div>
</div>

<script>
    function Edit(post_section_id) {

    }

    function addSection(section_id, section_name) {
        console.log(section_name);
        let wrap = $(".add-row-wrap");
        let clone = wrap.find('.copy-row:first').clone();
        clone.show();
        wrap.find(".copy-row:last").after(clone);

        clone.find("input[name='order[]']").val(wrap.find(".copy-row").length - 1);
        clone.find("input[name='section_id[]']").val(section_id);
        clone.find("input[name='section_name[]']").val(section_name);
    }

    jQuery(document).ready(function () {
        $(document).on("click", ".del-extra-row-2", function () {
            $(this).closest('.copy-row').find("input[name='section_id[]']").val(0);
            $(this).closest('.copy-row').hide();
            i = 0;
            // $(".add-row-wrap .copy-row").each(function () {
            //     i = i + 1;
            //     //alert($(this).index());
            //     $(this).find(".count").html(i);
            // });
        });
    });
</script>