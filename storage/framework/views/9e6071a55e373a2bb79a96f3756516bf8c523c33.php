<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllChefs</title>
    <style>
        em{
            font-size: 12px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background: linear-gradient(to bottom, #ffefcf,#fff7f1);">
    <div class="container">
        <div class="row">
           <div class="col-md"><a style="color:rgb(252, 46, 146); font-weight:800;font-size:30px;">AllChefs</a></div>
           
          </div>
          <div class="col-md" style="text-align: left; font-size:25px;margin-top:5px;font-weight:800;color:darkorange">Cook A Story <em style="text-align: center;font-size:25px;font-weight:600;color:black">Spice It Up🔥</em></div>
          </div>
          
     <div class="container" style="margin-top:30px;width:90%;max-width:1500px;">
        <form  action="<?php echo e(url('/')); ?>/cookstory" method="post">
        <?php echo csrf_field(); ?>
        
        <div class="row">
          <div class="col-md-4">
          <label >Title</label>
            <div style="text-align:center;"><textarea type="text" rows="5"name="title" style="height:80px;width:100%;border:2px solid darkgray; border-radius:5px;background-color:transparent;padding-left:10px;" maxlength="150" placeholder="Max 150 characters"></textarea></div>
            <br>
            <label >Genre</label>
            <div style="text-align:center;"><textarea rows="3" type="text" name="genre" style="height:80px;width:100%;border:2px solid darkgray; border-radius:5px;background-color:transparent;padding-left:10px;" maxlength="150" placeholder="Please provide genres separated by a comma"></textarea></div>
          </div>
            <div class="col-md" style="margin-top:0px;">
            <label >Content</label>
            <textarea id="customTextarea" name="content" class="form-control" rows="15" maxlength="7500" style="width:100%;border:2px solid darkgray; border-radius:5px;background-color:transparent;"  placeholder="Max 7500 characters"></textarea>
            <input type="submit" value="Serve" class="btn btn-sm" style="background-color:rgb(252, 46, 146);color:white; float:right;margin:1px;">
            <a href="/" class="btn btn-sm" style="background-color:rgb(34,147,240);color:white; float:right;margin:1px;">Cancel</a>
            </div>
        </div>
          </form>
     </div>
     <div class="container"><img src="<?php echo e(asset('images/background.png')); ?>" style="width:50vw;height: 100vh;position:fixed; bottom:0; right:0;z-index:-1; opacity:20%" alt="User"></div>
  </body><?php /**PATH D:\My\Xampp\htdocs\allchefs\resources\views/cookstory.blade.php ENDPATH**/ ?>