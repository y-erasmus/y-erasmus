<?php
class CoreContent {

    public static function getFileHtml($filePath){
        $html = "";
        if(is_file( $filePath)) {
           ob_start();
           include_once  $filePath;
           $html = ob_get_contents();
           ob_end_clean();
        }
        return $html;
    }

    public static function getFormHtml($mail){
        //get correction
        $query = CoreSql::getPDO()->prepare("SELECT assessmentquestion.id, assessmentquestion.question, questionanswer.id_question,questionanswer.id as answ_id, questionanswer.answer, questionanswer.correct FROM assessmentquestion LEFT JOIN questionanswer ON assessmentquestion.id = questionanswer.id_question ORDER BY assessmentquestion.id ASC");
        $go = $query->execute();
        $bddform = $query->fetchAll(PDO::FETCH_ASSOC);

        // FORMAT AS ARRAY
        $form = [];
        foreach($bddform as $question){
            $form[$question['id_question']]['question'] = $question['question'];
            if($question['answer']){
                $form[$question['id_question']]['responses'][$question['answ_id']] = array('answer' => $question['answer'],
                                                                        'isCorrect' => $question['correct']);
            }
        }
        $fingerprint = coreSecure::cryptPass("LUAXDETRUIRETOUT".$mail);
        if(is_file( DOC_ROOT."/Content/assessmentForm.php")) {
           ob_start();
           include_once DOC_ROOT."/Content/assessmentForm.php";
           $html = ob_get_contents();
           ob_end_clean();
        }
        return $html;
    }

    public static function getAdminResultsHtml(){
        $query = CoreSql::getPDO()->prepare("SELECT user.*, class.name as class_name, formation.name as formation_name FROM `user`, class, formation where user.id_formation = formation.id AND user.id_class = class.id");
        $go = $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        if(is_file( DOC_ROOT."/Content/usersList.php")) {
           ob_start();
           include_once '/include/adminMenu.php';
           include_once DOC_ROOT."/Content/usersList.php";
           $html = ob_get_contents();
           ob_end_clean();
        }
        return $html;
    }

}
