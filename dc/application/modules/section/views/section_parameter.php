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
                        <button type="button" class="btn btn-primary" onclick="addSection()">Add Parameter</button>
                        <button type="button" class="btn btn-success" id="previewBtn">Preview with Parameters</button>
                    </div>
                    <div class="add-row-wrap" style="margin-top: 15px">
                        <div class="row" style="font-weight: bold;margin-bottom: 10px">
                            <div class="col-sm-3">
                                Parameter Name
                            </div>
                            <div class="col-sm-1">
                                type
                            </div>
                            <div class="col-sm-6">
                                Default Value
                            </div>
                        </div>
                        <div class="copy-row row" style="display: none;">
                            <div class="col-sm-3">
                                <input type="text" class="form-control"
                                       name="name[]"
                                       value="">
                            </div>
                            <div class="col-sm-1">
                                <select class="form-control" name="type[]">
                                    <option>text</option>
                                    <option>editor</option>
                                    <option>url</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"
                                       name="default_value[]"
                                       value="">
                            </div>
                            <input type="hidden" class="form-control"
                                   name="section_parameter_id[]"
                                   value="0">
<!--                            <div class="col-sm-1" style=" padding: 6px 12px;">-->
<!--                                <a class="del-extra-row-2"-->
<!--                                   href="javascript:void(0);"><i-->
<!--                                            class="fa fa-trash"></i></a>-->
<!--                            </div>-->
                        </div>
                        <?php if (isset($parameter_list) && count($parameter_list) > 0) {
                            $p = 1;
                            $j = 0;
                            foreach ($parameter_list as $section):
                                ?>
                                <div class="copy-row row">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               name="name[]"
                                               value="<?php echo $section['name']; ?>">
                                    </div>
                                    <div class="col-sm-1">
                                        <select class="form-control" name="type[]">
                                            <option <?php echo ($section['type']=='text')?'selected':''; ?>>text</option>
                                            <option <?php echo ($section['type']=='editor')?'selected':''; ?>>editor</option>
                                            <option <?php echo ($section['type']=='url')?'selected':''; ?>>url</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control"
                                               name="default_value[]"
                                               value="<?php echo $section['default_value']; ?>">
                                    </div>
                                    <input type="hidden" class="form-control"
                                           name="section_parameter_id[]"
                                           value="<?php echo $section['id']; ?>">
<!--                                    <div class="col-sm-1">-->
<!--                                        <a class="del-extra-row-2"-->
<!--                                           href="javascript:void(0);"><i-->
<!--                                                    class="fa fa-trash"></i></a>-->
<!--                                    </div>-->
                                </div>
                                <?php $p++;
                                $j++; endforeach;
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
    function addSection() {
        let wrap = $(".add-row-wrap");
        let clone = wrap.find('.copy-row:first').clone();
        clone.show();
        wrap.find(".copy-row:last").after(clone);
        clone.find("input[name='default_value[]']").val("default_value");
        // clone.find("input[name='section_id[]']").val(section_id);
        // clone.find("input[name='section_name[]']").val(section_name);
    }

    jQuery(document).ready(function () {
        $(document).on("click", ".del-extra-row-2", function () {
            $(this).closest('.copy-row').remove();
            i = 0;
            $(".add-row-wrap .copy-row").each(function () {
                i = i + 1;
                //alert($(this).index());
                $(this).find(".count").html(i);
            });
        });
    });
</script>