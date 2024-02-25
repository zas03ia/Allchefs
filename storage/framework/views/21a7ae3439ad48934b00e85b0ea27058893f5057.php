<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllChefs</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(to bottom,darkgray,white);background-repeat: no-repeat;">
    <div class="container" style="height:70vh;width:440px;margin-top:80px;padding:30px 20px;border-radius:5px;">
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <form method="post" action="/login" >
        <?php echo csrf_field(); ?>
        <div class="modal-header"style="margin-bottom:30px;">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <br><br>
           
        </div>
        <div class="modal-body">
                <label>Email</label><br>
                <input type="email" name="email"style="width:375px;">
                <br><br>
                <label>Password</label><br>
                <input type="password" name="password"style="width:375px;">
                <br>
            <br>
        </div>
        <div class="modal-footer">
           
                <input type="submit" value ="Login" class="btn btn-sm" style="background-color:rgb(34,147,240); font-size:15px; color:white;">
        </form>
        </div>

    </form>
    </div>
</body>
</html>
<?php /**PATH D:\My\Xampp\htdocs\allchefs\resources\views/login.blade.php ENDPATH**/ ?>