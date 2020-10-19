<body>
<div class="auth">
    <form action="/<?=$lang['lang'];?>/home/login" class="formAuth" onsubmit="return error()" method="post">
        <label><b><?=$lang['login'];?></b></label>
        <div><input type="text" name="login" placeholder="<?=$lang['writeLogin'];?>" ></div>
        <div id="pswd_info_log">
            <h4><?=$lang['checkLogin'];?></h4>
            <ul>
                <li id="Logletter"><?=$lang['LogLetter'];?></li>
                <li id="Loglength"><?=$lang['LogLength'];?></li>
            </ul>
        </div>
        <label><b><?=$lang['Pass'];?></b></label>
        <div><input type="password" placeholder="<?=$lang['writePass'];?>" name="password" ></div>
        <div id="pswd_info">
            <h4><?=$lang['checkPass'];?></h4>
            <ul>
                <li id="letter"><?=$lang['PassLetter'];?></li>
                <li id="length"><?=$lang['LogLength'];?></li>
            </ul>
        </div>
        <?php if(!empty($data['error']))echo '<div class="badAuth">'.$lang['errorAuth'].'</div>';?>
        <div><input type="submit" name="Auth" value="<?=$lang['signIn'];?>" id="signIn"></div>
    </form>
    <div>
        <a class="registration" href="/<?=$lang['lang'];?>/registration/index"><?=$lang['registration'];?></a>
    </div>


