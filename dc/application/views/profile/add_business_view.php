<div class="content-container">
    <div class="biz-content clearfix" style="margin: auto; width: 60%;">
        <div class="u-text-centered">
            <img class="lemon--img__69f5f__3GQUb" alt="" src="https://s3-media0.fl.yelpcdn.com/assets/public/claim_flow_biz_details.yji-2172e6dac66ab9ada5cd2d66efc18150.png" sizes="182px" srcset="https://s3-media0.fl.yelpcdn.com/assets/public/claim_flow_biz_details.yji-2172e6dac66ab9ada5cd2d66efc18150.png 182w, https://s3-media0.fl.yelpcdn.com/assets/public/claim_flow_biz_details@2x.yji-bac13d234acd2e3c896c0051e815a3cb.png 364w">

            <h1 class="slim-headline">Add Your Business Details</h1>
<!--            <p class="u-space-b4">Your business may already be on Our DB. If it isn’t, you may add it.-->
<!--            </p>-->
        </div>
        <form role="form" style="margin-top: 15px"  action="profile/business/0" method="post">
            <?php include 'components/select_category.php'  ?>
            <div class="form-group">
                <label>Business Phone</label>
                <input type="text" name="phone_no" class="form-control" placeholder="Enter Phone Number ...">
            </div>
            <div class="form-group">
                <label>Web Address</label>
                <input type="text" name="website" class="form-control" placeholder="Enter Website address ...">
            </div>
            <div class="form-group">
                <label>Street Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Street Address ...">
            </div>
            <div class="form-group">
                <label>Your Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email Address...">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Business</button>
            </div>
        </form>
    </div>
</div>