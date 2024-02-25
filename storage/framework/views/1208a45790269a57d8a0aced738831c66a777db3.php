<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllChefs</title>
    <style>
        /* Custom style for the toggle arrow */
        .btn-primary.dropdown-toggle::after {
            border-top-color: darkslategrey;
            width: 10px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(to bottom,#FF8911,white);background-repeat: no-repeat;overflow-x:hidden;">
<div class="container">    
<div style="text-align:right;padding-right:0px;color:brown;">

<a class="btn " href="/login" style="color:brown;">Login</a><a class="btn" href="/signup">Sign up</a>
</div>
<?php if(session('message')): ?>
    <div class="alert alert-success">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>

<div class="row">
<div style="text-align:center;">
<div  style="margin-top:100px;font-size:60px;font-style:italic;font-weight:300;color:pink">We're</div>
<div  style="color:rgb(252, 46, 146); font-weight:800;font-size:100px;">AllChefs</div>
<div style="margin-left:50px;font-size:50px;font-style:italic;font-weight:300;color:brown;">cooking our own stories! </div></div>
<div style="text-align:center;"><img src="<?php echo e(asset('images/home.png')); ?>" style="margin-top :80px;min-width:300px;min-height:300px;width:80%;height: 40vw;z-index:-1;" alt="User"></div>
</div>
<div class="container" style="width:80%;margin-top:50px;text-align:left;line-height:1.5"><h5>About</h5><br>
<p>A platform of culinary maestros, crafting not  meals but their own narratives that sizzle with creativity and flavor. AllChefs celebrates the art of storytelling as a communal experience. Share the unique recipes of your imagination and unleash your inner wordsmith, cooking up tales that tantalize the senses, leaving a lasting impression on readers who crave the perfect blend of inspiration and entertainment.</p>
<br>
<p>Every story is a carefully curated dish. Take the power to stir emotions and season adventures. Create and edit your own stories. Explore a diverse menu of narratives, each as distinct as the storyteller behind it. Savor the literary delights of fellow chefs.</p>
 <br><p>Spice up your reading experience by rating and liking stories that leave you hungry for more. Embark on a literary feast where every tale is a testament to the endless possibilities of the written word. Cook your story, share your flavors, and let the AllChefs community indulge in the banquet of imagination!</p>
</div>
<div class="conatiner" style="text-align:center;padding:60px 0px;">
<p style="color:rgb(252, 46, 146); font-weight:800;font-size:30px;margin-bottom:30px;"><em style="color:black;font-weight:500;">Join</em> AllChefs!</p>
<a href="/login"><button class="btn btn-primary" style="min-width:50px;width:30%;border-radius:2px;background-color:#FF7811; border:0px;">Login</button></a>
<br><br>
<a href="/signup"><button class="btn btn-primary" style="min-width:50px;width:30%;border-radius:2px;background-color:#FF9A22; border:0px;margin-bottom:40px;">Sign up</button></a>
</div>
 </div>
</body>                

</html>
<?php /**PATH D:\My\Xampp\htdocs\allchefs\resources\views/home.blade.php ENDPATH**/ ?>