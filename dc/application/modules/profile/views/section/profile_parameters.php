<div class="row">
    <div class="col-lg-6 col-sm-6 col-xs-6">
        <div class="form-group">
            <label for="ProfileName">Name</label>
            <input type="text" name="name" class="form-control" id="ProfileName"
                   placeholder="Enter name"
                   value="<?php echo $profile['profile_name']; ?>" required>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6">
        <div class="form-group">
            <label for="UserName" class="conditions">Username</label><span
                    class="constraint"> (No Special Characters and Spaces are allowed.)</span>
            <input type="text" name="user_name"
                   value="<?php echo $profile['profile_username']; ?>"
                   class="form-control" id="UserName" placeholder="Enter Username"
                   onkeypress="return checkSpcialChar(event)" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="Contact">Contact No.</label>
            <input type="text" name="contact" class="form-control" id="Contact"
                   placeholder="Enter Contact No."
                   value="<?php echo $profile['profile_contact']; ?>" required>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="Zip">Zip</label>
            <input type="text" name="zip"
                   value="<?php echo $profile['profile_zip']; ?>"
                   class="form-control" id="zip" placeholder="Enter Zip No."
                   required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="form-control" id="Email"
                   placeholder="Enter Email"
                   value="<?php echo $profile['profile_email']; ?>" required>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="Web">Web</label>
            <input type="text" name="web"
                   value="<?php echo $profile['profile_web']; ?>"
                   class="form-control" id="web" placeholder="Enter Web" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-xs-6">
        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" name="address" class="form-control" id="address"
                   placeholder="Enter Address"
                   value="<?php echo $profile['profile_add']; ?>" required>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6">
        <div class="form-group">
            <label for="InputStatus">Status</label>
            <select class="form-control" name="status">
                <option value="">---Status---</option>
                <option value="1" <?php if ($profile['profile_status'] == "Pending") { ?><?php echo "selected" ?><?php } ?>>Pending</option>
                <option value="2" <?php if ($profile['profile_status'] == "Live") { ?><?php echo "selected" ?><?php } ?>>Live</option>
                <option value="3" <?php if ($profile['profile_status'] == "Issue Review") { ?><?php echo "selected" ?><?php } ?>>Issue Review</option>
                <option value="4" <?php if ($profile['profile_status'] == "Billing") { ?><?php echo "selected" ?><?php } ?>>Billing</option>
                <option value="5" <?php if ($profile['profile_status'] == "Delete Pending") { ?><?php echo "selected" ?><?php } ?>>Delete Pending</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-xs-6">
        <div class="form-group">
            <label for="City">City</label>
            <input type="text" name="city"
                   value="<?php echo $profile['profile_city']; ?>"
                   class="form-control" id="City" placeholder="Enter City" required>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6">
        <div class="form-group">
            <label for="State" class="conditions">State</label><span
                    class="constraint"> (Enter 2-characters state abbreviation.)</span>
            <input type="text" name="state"
                   value="<?php echo $profile['profile_st']; ?>"
                   class="form-control" id="State" placeholder="Enter State"
                   maxlength="2" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-xs-6">
        <div class="form-group">
            <label>InfoGroup_id</label>
            <input type="text" name="infogroup_id"
                   value="<?php echo $profile['infogroup_id']; ?>"
                   class="form-control" placeholder="InfoGroup_id">
        </div>
    </div>
</div>
<center><input class="btn btn-info" type="submit" value="Submit"></center>