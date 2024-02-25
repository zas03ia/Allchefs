<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllChefs</title>
    <style>
        /* Custom style for the toggle arrow */
        .btn-primary.dropdown-toggle::after {
            border-top-color: darkslategrey;
            width:10px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div style="width:auto; height:60px;background: linear-gradient(to bottom, lightgray,white);position:fixed;top:0;right:0;left:0;opacity:90%;">
    <div class="container">
        <div class="row">
           <div class="col-md-2" style="position:fixed; top:3px; left:30px;"><a style="color:rgb(252, 46, 146); font-weight:800;font-size:30px;">AllChefs</a></div>
           
           <div calss="col-md" >
           <div class="dropdown" >
            <button class="btn btn-primary dropdown-toggle" type="button" style="position:fixed;right:180px;top:3px;background-color:transparent;border:0px;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo e(asset('images/user.png')); ?>" style="width:40px;height: 35px;" alt="User">
            </button>
            
            <!-- Dropdown menu -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width:auto;">
            <a class="dropdown-item" href="/">All Stories</a>
                <a class="dropdown-item" href="/mystories">My Stories</a>
                <a class="dropdown-item" href="/favorites">Favorites</a>
                <a class="dropdown-item" href="/logout">Log out</a>
            </div>
        </div>
          </div>
           <div class="col-md" style="width:130px;padding:0px; position:fixed; top:3px; right:45px;text-align:right;"><a href="/cookstory" target="_blank"><button type="button" class="btn btn-lg" style="background-color:rgb(252, 46, 146);color:white">Cook Story</button></a></div>
        </div>
     </div>
    </div>
    <div class="col-md" style="position:fixed; top: 45px; left:45px;text-align:right;font-size: 20px;font-weight:700;color:orange;">My Stories</div>
     
    
        <div class="container" id="stories" style="margin-top:80px;width:70%;">
        <?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="container" style="border-bottom: 1px solid black; text-align:left;margin-top:30px;">
              <div class="row"><div class="col-md" style="text-align:left;"><h4><?php echo e(rtrim($story->title,".")); ?></h4></div>
              </div>
              <p><?php echo e(substr($story->content,0,150)); ?>   .  .  .  .</p>
              <div class="row" style="padding-bottom:5px;">
              <div class="col-lg">
              <div class="row" style="padding-bottom:5px;">
              <div class="col-md" style="color:orange;">Genre: <?php echo e($story->genre); ?></div>
                <div class="col-md"style="width:100px;"><?php echo e(round(strlen($story->content)/100)); ?>min read</div>
                <div class="col-md"style="width:200px;"> <span style="font-size:12px;color:orange;">&starf;</span><?php echo e($story->avg_rating); ?> &nbsp; (<?php echo e($story->num_rating); ?> ratings)</div>
              </div></div>
                <div class="col-md-1"style="width:52px;"><a href="<?php echo e(url('/read')); ?>/<?php echo e($story->story_id); ?>"><button type="button" class="btn btn-sm" style="background-color:rgb(34,147,240); font-size:15px; color:white;">View</button></a></div>
              <div class="col-md-1" style="width:45px;"><a href="<?php echo e(url('/edit')); ?>/<?php echo e($story->story_id); ?>" target="_blank"><button type="button" class="btn btn-sm" style="background-color:gray; font-size:15px; color:white;">Edit</button></a></div>
              <div class="col-md-1" style="width:80px;">
        <button type="button" style="background-color:red; font-size:15px; color:white;" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button></div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>This story will be permanently deleted.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm" style="background-color:gray; font-size:15px; color:white;" data-bs-dismiss="modal">Cancel</button>
                        <form action="<?php echo e(url('/')); ?>/delete" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="del_id" value="<?php echo e($story->story_id); ?>">
                            <input type="submit" value ="Confirm Delete" class="btn btn-sm" style="background-color:red; font-size:15px; color:white;">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html><?php /**PATH D:\My\Xampp\htdocs\allchefs\resources\views/mystory.blade.php ENDPATH**/ ?>