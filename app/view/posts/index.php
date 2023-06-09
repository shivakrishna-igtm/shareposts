<?php require APPROOT.'/view/inc/header.php'; ?>
<?php flash('post_added'); ?>
<div class="row">
<div class="col-md-6">
<h1>Posts</h1>
</div>
<div class="col-md-6">
<a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
<i class="fa fa-pencil"></i>Add Post
</a>
</div>
</div>
<?php foreach($data['posts'] as $post) : ?>
<div class="card card-body mb-3">
<h4 class="card-title"><?php echo $post->title; ?></h4>
<div class="bg-light p-2 mb-3">
Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
</div>
<p class="card-text">Genre :  <?php echo $post->genre; ?></p>
<a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId;?>" class="btn btn-dark">View the Post</a>
</div>
<?php endforeach; ?>

<?php require APPROOT.'/view/inc/footer.php'; ?>