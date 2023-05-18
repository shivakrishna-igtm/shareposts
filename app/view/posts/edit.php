<?php require APPROOT.'/view/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

    <div class="card card-body bg-light mt-5">
     <h2>ADD POST</h2>
     <p>Create A Post</p>
     <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
       <div class="form-group">
         <label for="title">Title:<sup>*</sup></label>
         <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
         <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
       </div>
       <div class="form-group">
         <label for="genre">Genre:<sup>*</sup></label>
         <input type="text" name="genre" class="form-control form-control-lg <?php echo (!empty($data['genre_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['genre']; ?>">
         <span class="invalid-feedback"><?php echo $data['genre_err']; ?></span>
       </div>
       <div class="form-group">
         <label for="body">Body:<sup>*</sup></label>
         <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['body']; ?>"></textarea>
         <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
       </div>
       <input type="submit" class="btn btn-success" value="share">
    </form>
  </div>    

<?php require APPROOT.'/view/inc/footer.php'; ?>