<?php
session_start();
include "../../isadmin.php";
?>

<form method="POST" action="../../connects/add_question.php">
<div class="card-hover-shadow-2x mb-3 card">
<div class="col-md-12">
<div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Nowe Pytanie</div>
            </div>
<div class="row">
<div class="form-group col-md-2">
               <label for ="dif">Poziom trudności </label> <input id="dif" name="dif" type="number" class="form-control md-5" value="1" min="1" max="5">
                </div>

<div class="form-group col-md-3">
<label for ="cat">Kategoria pytania</label>
<select id="cat" class="form-control" name="id_cat">
<?php
                              include "../../config.php";
                              $result = $connect->query("select id,name from categories");
                              $count = $result->num_rows;
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                              
                              ?>
                              <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
<?php } ?>
</select>
</div>

<div class="form-group md-2 ml-5">
<label for="public">Opublikuj</label>
<input type="checkbox" class="form-control" id="public" name="public" value="true">
</div>

</div>


    <h3>Treść Pytania</h3>
  <textarea id="quest_des" style="height: 500px;" name="des">

  </textarea>
    <hr>
    <h3>Odpowiedzi</h3>
    <table class="table">
    <tr>
        <th>Treść</th>
        <th>Poprawna</th>
    </tr>
    <tr>
        <td>
        <input class="form-control" placeholder="Odpowiedź 1" type="text" name="q1">
        </td>
        <td>
        <input type="radio" class="form-control" name="correct" value="0" checked>
        </td>
    </tr>
    <tr>
        <td>
        <input class="form-control" placeholder="Odpowiedź 2" type="text" name="q2">
        </td>
        <td>
        <input type="radio" class="form-control" name="correct" value="1">
        </td>
    </tr>
    <tr>
        <td>
        <input class="form-control" placeholder="Odpowiedź 3" type="text" name="q3">
        </td>
        <td>
        <input type="radio" class="form-control" name="correct" value="2">
        </td>
    </tr>
    <tr>
        <td>
        <input class="form-control" placeholder="Odpowiedź 4" type="text" name="q4">
        </td>
        <td>
        <input type="radio" class="form-control" name="correct" value="3">
        </td>
    </tr>
    </table>
  <hr>
  <h3>Opis do pytania</h3>
  <textarea id="quest_help" style="height: 500px;" name="help">

  </textarea>
  <div class="d-block text-right card-footer">
  <button role="submit" class="btn btn-success">Dodaj</button>
  <a id="back" href="#questions" role="button" class=" btn btn-danger">Anuluj</a>
  </div>
</div>
</div>
</form>
  <script>
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

   $(document).ready(function(){
    $("#back").click(function(){
            $("#content").load("./questions.php");
        });
   });
  </script>





