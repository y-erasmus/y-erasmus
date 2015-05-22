
<div class="container">
    <div class="questions">
<?php
$cpt = 1;
foreach($form as $kq => $question){
    if(isset($question['question']) && isset($question['responses'])){ ?>
        <div class="question well">
            <h2 class="title-L">Question <?php echo $cpt; ?></h2>
            <p class="textquestion"><?php echo $question['question']; ?></p>
            <div class="textanswer">
                <form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm correction">
                    <input type="hidden" value="updateCorrection" name="todo">
                    <input type="hidden" value="<?php echo $kq ?>" name="Qid"/>
                    <input type="hidden" value="" name="id"/>
        <?php foreach($question['responses'] as $kr => $reponse){ ?>
                    <label><input type="radio" data-id="<?php echo $kr; ?>" name="<?php echo $kq ?>" <?php if($reponse['isCorrect']) { echo 'checked' ;} ?> /><?php echo $reponse['answer'] ?></label>
        <?php } ?>
    </form>
            </div>
        </div>

    <?php }
    $cpt++;
}
?>
    </div>
</div>
