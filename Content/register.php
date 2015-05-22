<!-- ======= AFTER ASSESSMENT LOGIN AND BEFORE ASSESSMENT ========-->
<div class="parentcenter">
	<div class="verticalcenter">
		<div class="jumbotron jumbotronbody">
            <h1 class="title-L">Profil</h1>
            <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
                <div class="innerForm">
                    <input class="form-control textbox inputtext" name="todo" type="hidden" value="register">
                    <input class="form-control textbox inputtext" name="mail" type="text" placeholder="E-mail">
                    <input class="form-control textbox inputtext half-left" name="firstname" type="text" placeholder="Nom">
                    <input class="form-control textbox inputtext half-right" name="lastname" type="text" placeholder="Prénom">
                    <input class="form-control textbox inputtext half-left datearri"  name="datarri" type="text" placeholder="Date d'arrivée">
                    <input class="form-control textbox inputtext half-right datedepa" name="datdepa" type="text" placeholder="Date de départ">

                    <div class="outer-select half-left">
	                    <select name="Langue Maternelle" class="form-control textbox inputtext">
	                      <option selected disabled>Langue Maternelle</option>
	                      <option value="1">Français</option>
	                      <option value="2">English</option>
	                      <option value="3">Español</option>
	                      <option value="4">русский</option>
                          <option value="5">العربية</option>
                          <option value="6">中国</option>
                          <option value="7">Deutsch</option>
                          <option value="7">日本人</option>
                          <option value="7">Português</option>
                          <option value="7">हिन्दी</option>

                        </select>
					</div>
                    <div class="outer-select half-right">
                        <select name="Langue Parle" class="form-control textbox inputtext">
                            <option selected disabled>Langue Parlée</option>
                            <option value="1">Français</option>
                            <option value="2">English</option>
                            <option value="3">Español</option>
                            <option value="4">русский</option>
                            <option value="5">العربية</option>
                            <option value="6">中国</option>
                            <option value="7">Deutsch</option>
                            <option value="7">日本人</option>
                            <option value="7">Português</option>
                            <option value="7">हिन्दी</option>

                        </select>
                    </div>

                    <input class="form-control textbox inputtext half-left" name="ecolecampus" type="text" placeholder="Ecole / Université / Campus d’origine">
                    <input class="form-control textbox inputtext half-right" name="ecoleaix" type="text" placeholder="Ecole / Université / Campus à Aix">
                    <input class="form-control textbox inputtext" name="etudes" type="text" placeholder="Etudes et Majeures">
                    <input class="form-control textbox inputtext trois-left" name="ci1" type="text" placeholder="Centre d'intérêt 1">
                    <input class="form-control textbox inputtext trois" name="ci2" type="text" placeholder="Centre d'intérêt 2">
                    <input class="form-control textbox inputtext trois-right" name="ci3" type="text" placeholder="Centre d'intérêt 3">
                    <input class="form-control textbox inputtext half-left" name="act1" type="text" placeholder="Activité 1">
                    <input class="form-control textbox inputtext half-right" name="act2" type="text" placeholder="Activité 2">
                    <input class="form-control textbox inputtext trois-left" name="act3" type="text" placeholder="Activité 3">
                    <input class="form-control textbox inputtext trois" name="act4" type="text" placeholder="Activité 4">
                    <input class="form-control textbox inputtext trois-right" name="act5" type="text" placeholder="Activité 5">
                    <input class="form-control textbox inputtext half-left" name="dec1" type="text" placeholder="Mot pour me décrire 1">
                    <input class="form-control textbox inputtext half-right" name="dec2" type="text" placeholder="Mot pour me décrire 2">
                    <input class="form-control textbox inputtext trois-left" name="dec3" type="text" placeholder="Mot pour me décrire 3">
                    <input class="form-control textbox inputtext trois" name="dec4" type="text" placeholder="Mot pour me décrire ">
                    <input class="form-control textbox inputtext trois-right" name="dec5" type="text" placeholder="Mot pour me décrire ">
                    <div class="radiobutton"><input class="radiobutton" name="fetard" type="radio" value="fetard" style="height: initial"> Je suis fétard <br />
                    <input class="radiobutton" name="fetard" type="radio" value="studieux" style="height: initial"> Je suis studieux</div>
					<p class="formError"></p>
				</div>
                <button type="submit" class="btn btn-default formbutton subbtn">Remplir le profil</button>
            </form>
        </div>
	</div>
</div>
