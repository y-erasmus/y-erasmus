
<section class="users-list">
<table class="table table-hover">
    <thead>
      <tr>
        <th>Nom / Prénom</th>
        <th>Formation</th>
        <th>Classe</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach($users as $key => $user){
    if($user['exampass']){
        echo '<tr>'
          .'<th scope="row">'.$user['firstname'].' '.$user['lastname'].'</th>'
          .'<td>'.$user['formation_name'].'</td>'
          .'<td>'.$user['class_name'].'</td>'
          .'<td>'.$user['score'].'</td>'
        .'</tr>';


    }else{
        echo '<tr>'
          .'<th scope="row">'.$user['firstname'].' '.$user['lastname'].'</th>'
          .'<td>'.$user['formation_name'].'</td>'
          .'<td>'.$user['class_name'].'</td>'
          .'<td>non passé</td>'
        .'</tr>';
    }
}


?>
</tbody>
</table>
</section>
