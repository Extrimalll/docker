<?php if (empty($data['user'][0]['img'])) $data['user'][0]['img']='noImage.jpg';?>
<body>
<div class="auth">
    <div class="fl">
        <div class="welcome"><?=$lang['welcome']?>, <?=$data['user'][0]['username']?></div>
        <article class="item">
            <div class="photo">
                <img class="personPhoto" alt="" src="<?='http://'.$_SERVER['HTTP_HOST'];?>/images/avatar/<?=$data['user'][0]['img']?>">
            </div>
        </article>
    </div>
    <div>
        <h4><?=$lang['regName']?> <?=$data['user'][0]['username']?></h4>
        <h4><?=$lang['regFamily']?> <?=$data['user'][0]['family']?></h4>
        <h4><?=$lang['regAge']?> <?=$data['user'][0]['age']?></h4>
    </div>
    <div class="preExit">
        <a class="exit" href="/<?=$lang['lang'];?>/home/logout"><?=$lang['exit'];?></a>
    </div>
    <div class="langProfile">
