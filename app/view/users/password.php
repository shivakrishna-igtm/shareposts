<?php require APPROOT.'/view/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
     <?php flash('update_success'); ?>
     <h2>Security</h2>
     <p>Change Password</p>
     <form action="<?php echo URLROOT; ?>/users/password" method="post">
     <div class="form-group">
         <label for="email">Enter your Email:<sup>*</sup></label>
         <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
         <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
       </div>
       <div class="form-group">
         <label for="password">Current Password:<sup>*</sup></label>
         <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
         <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
       </div>
       <div class="form-group">
         <label for="new_password">New Password:<sup>*</sup></label>
         <input type="password" name="new_password" class="form-control form-control-lg <?php echo (!empty($data['new_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['new_password']; ?>">
         <span class="invalid-feedback"><?php echo $data['new_password_err']; ?></span>
       </div>
       <div class="row">
         <div class="col">
          <input type="submit" value="Update" class="btn btn-success btn-block">
         </div>
         <div class="col">
         <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light btn-block">cancel</a>
         </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="absolute">
<a class="nav-link pull-right" href="#"><p>&copy;capricorn3 </p></a>
</div>    
<?php require APPROOT.'/view/inc/footer.php'; ?>