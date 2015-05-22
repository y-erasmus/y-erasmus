<div class="parentcenter">
	<div class="verticalcenter">
		<div class="jumbotron jumbotronbody">
			<h1 class="title-XL">Welcome</h1>
            <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
				<div class="innerForm">
                    <input name="todo" type="hidden" value="connection">
                    <input class="form-control textbox inputtext half-left" id="Email" value='cp@ultranoir.com' type="text" placeholder="Adresse mail" name="mail" autocomplete="off">
                    <input id="password" value="test" type="password" placeholder="Mot de passe" class="form-control inputtext textbox half-right" name="password" autocomplete="off" readonly="" onfocus="this.removeAttribute('readonly');">
					<p class="formError"></p>
                </div>
				<button type="submit" class="btn btn-default formbutton subbtn">Log me !</button>
            </form>
		</div>
	</div>
</div>







<?php

$mail = "cp@ultranoir.com";
/*
if(coreFormat::checkMail($mail)){
    coreUser::isMailExist($mail, 'test'); // no ok
}*/
/*
coreUser::isMailExist("cp@ultranoir.com'-- ", 'test'); // no ok
coreUser::isMailExist("cp@ultranoir.com", 'test'); // ok
coreUser::isMailExist("cp@ultranoir.com OR 1=1", 'test'); // no ok
coreUser::isMailExist("' OR 1=1 /*", 'test'); // no ok
*/
/*
$user = new stdClass();
$user->firstname = 'test';
$user->lastname = 'teeest';
$user->mail = 'test';
$user->pass = md5('test');
$user->class = 'test';
$user->exampass = 0;
$user->score = 0;
if(coreFormat::checkMail($mail)){
    if($test = coreSql::save($user, 'user')){
            //mail
    }
}*/
?>
