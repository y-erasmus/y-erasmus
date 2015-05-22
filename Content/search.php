<!-- ======= AFTER ASSESSMENT LOGIN AND BEFORE ASSESSMENT ========-->
<div class="parentcenter">
    <div class="verticalcenter">
        <div class="jumbotron jumbotronbody">
            <h1 class="title-L">Recherche</h1>
            <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
                <div class="innerForm">
                    <input class="form-control textbox inputtext half-left" name="search" type="text" placeholder="Je recherche">
                    <div class="outer-select half-right">
                        <select name="categosearch" class="form-control textbox inputtext">
                            <option selected disabled>Critère</option>
                            <option value="maternellelang">Langue maternelle</option>
                            <option value="secondlang">Langue Parlée</option>
                            <option value="firstname">Nom</option>
                            <option value="secondname">Prénom</option>
                            <option value="ecolecampus">Ecole / Université / Campus d’origine</option>
                            <option value="ecoleaix">Ecole / Université / Campus à Aix</option>
                            <option value="etudes">Etudes et Majeures</option>
                            <option value="ci1">Centre d'intérêt</option>
                            <option value="dec1">Mot pour me décrire</option>
                            <option value="act1">Activité</option>

                        </select>
                    </div>

                    <p class="formError"></p>
                </div>
                <button type="submit" class="btn btn-default formbutton subbtn">Rechercher</button>
            </form>
        </div>
    </div>
</div>
