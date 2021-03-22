<?php
session_start();
include "../../isadmin.php";
include "../../config.php";

$qid = $_GET['QID'];

$result = $connect->query("SELECT des, id_cat, dif, help, public FROM quests WHERE id = $qid");
$row = $result->fetch_assoc();

$result2 = $connect->query("SELECT des, good FROM answers WHERE id_quest = $qid limit 4");
$connect->close();
?>

<form method="POST" action="../../connects/edit_question.php">
<div class="card-hover-shadow-2x mb-3 card">
<div class="col-md-12">
<div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Edytuj Pytanie</div>
            
                <a id="back" href="#questions" role="button" class=" btn btn-danger ml-5 back">Anuluj Edycje</a>
            </div>
<div class="row">
<div class="form-group col-md-2">
               <label for ="dif">Poziom trudności </label> <input id="dif" name="dif" type="number" class="form-control md-5" value="<?php echo $row['dif'] ?>" min="1" max="5">
                </div>

<div class="form-group col-md-3">
<label for ="cat">Kategoria pytania</label>
<select id="cat" class="form-control" name="id_cat">
<?php
                              include "../../config.php";
                              $result = $connect->query("select id,name from categories");
                              $count = $result->num_rows;
                              while($r = $result->fetch_assoc()) {
                                $id = $r['id'];
                                $name = $r['name'];
                              ?>
                              

                              <option value="<?php echo $id; ?>" 
                              <?php if($id == $row['id_cat']) echo "selected"; ?>
                                  >
                              <?php echo $name; ?></option>
<?php } ?>
</select>
</div>
<input type="hidden" name="qid" value="<?php  echo $qid; ?>"> 
<div class="form-group md-2 ml-5">
<label for="public">Opublikuj</label>
<input type="checkbox" class="form-control" id="public" name="public" value="true"
<?php if($row['public'] == 1) echo "checked"; ?>
>
</div>

</div>


    <h3>Treść Pytania</h3>
  <textarea id="quest_des" style="height: 500px;" name="des">
                                <?php echo $row['des'] ?> 
  </textarea>
    <hr>
    <h3>Odpowiedzi</h3>
    <table class="table">
    <tr>
        <th>Treść</th>
        <th>Poprawna</th>
    </tr>

    <?php 
    $i = 0;
while($ans = $result2->fetch_assoc()) {
  $des = $ans['des'];
  $good = $ans['good'];
?>
    <tr>
        <td>
        <input class="form-control" type="text" name="q<?php echo $i + 1?>" value="<?php echo $des; ?>">
        </td>
        <td>
        <input type="radio" class="form-control" name="correct" value="<?php echo $i ?>" <?php if($good == 1) echo "checked" ?> >
        </td>
    </tr>
<?php  $i++; } ?>

    </table>
  <hr>
  <h3>Opis do pytania</h3>
  <textarea id="quest_help" style="height: 500px;" name="help">
  <?php echo $row['help'] ?> 
  </textarea>
  <div class="d-block text-right card-footer">
  <button role="submit" class="btn btn-success">Edytuj</button>
  <a id="back" href="#questions" role="button" class=" btn btn-danger back">Anuluj</a>
  </div>
</div>
</div>
</form>
  <script>


   $(document).ready(function(){

    tinymce.init({
      selector: '#quest_des',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
   tinymce.init({
      selector: '#quest_help',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });


    $(".back").click(function(){
            location.reload();
        });
   });
  </script>