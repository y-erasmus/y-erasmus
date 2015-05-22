<form action="<?php echo URL ?>" autocomplete="off" method="post" class="xhrForm">
    <input type="hidden" name="todo" value="endAssessment"/>
    <input type="hidden" name="fingerprint" value="<?php echo $fingerprint; ?>"/>
    <div class="container">
        <div class="questions">
<?php
foreach($form as $kq => $question){
    if(isset($question['question']) && isset($question['responses'])){ ?>
        <div class="question well">
            <h2 class="title-L">Question <?php echo $kq; ?></h2>
            <p class="textquestion"><?php echo $question['question']; ?></p>
            <div class="textanswer">
        <?php foreach($question['responses'] as $kr => $reponse){ ?>
                <label><input type="radio" name="<?php echo $kq ?>" value="<?php echo $kr; ?>"/><?php echo $reponse['answer'] ?></label>
        <?php } ?>
            </div>
        </div>



    <?php }
}
?>
    </div>
    <button type="submit" class="btn btn-default formbutton subbtn">End ! </button>
</form>


    <script>
        $('.textanswer').on('click', function(){
            $(this).siblings('.questionTitle').css("color", "dodgerblue");
        });
    </script>
