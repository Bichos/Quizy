<?php
session_start();
include "../../isadmin.php";

?>

<script>
   $(document).ready(function(){
    $("#add").click(function(){
            location.replace(this.href);
            location.reload();
        });
   });
</script>


<div class="row d-flex justify-content-center container">
    <div class=" card-hover-shadow-2x card  col-md-8">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Lista Osiągnięć</div>
                <a id="add" href="#ach_add" class="btn btn-info ml-5">Dodaj osiągnięcie</a>
            </div>
            <div class="scroll-area-sm" style="height: 500px;">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                              <?php
                              include "../../config.php";
                              $result = $connect->query("select id, title, src_img, role, value from ach ORDER BY id DESC");
                              $count = $result->num_rows;
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['title'];

                                if($row['role'] == 3)
                                {
                                    $id_cat = $row['value'];
                                    $r = $connect->query("select name from categories where id = $id_cat");
                                    $r = $r->fetch_assoc();
                                    $r = $r['name'];
                                }

                              ?>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <img class="rounded" alt="osiagniecie" style="width: 75px; height: 75px;"
                                                 src="../<?php  echo $row['src_img']?>">
                                            </div>
                                            <div class="widget-content-left ml-2">
                                                <div class="widget-heading">
                                                
                                                
                                                  <h6>ID: <?php echo $id; ?></h6>
                                                  <h6><?php echo substr($name, 0, 20); ?></h6>
                                                  <?php
                                                  if($row['role'] == 3)
                                                    {
                                                  ?>
                                                    <h6>Ukończona kategoria: <?php echo $r; ?></h6>
                                                  <?php }else{
                                                      $j = "";
                                                      switch ($row['role'])
                                                      {
                                                          case 1:
                                                            $opis = "Czasowe";
                                                            $j = "sek";
                                                            break;
                                                            case 2:
                                                                $opis = "Ukończona ilość pytań";
                                                                break;
                                                            case 4:
                                                                $opis = "Rozegrane wyzwania Graczy";
                                                            break;
                                                            case 5:
                                                                $opis = "Seria dobrych Odpowiedzi";
                                                                break;
                                                            default:
                                                                $opis = "BRAK";
                                                                break;
                                                      }
                                                      ?>
                                                <h6><?php echo $opis.": ".$row['value']." ".$j; ?></h6>
                                                  <?php } ?>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="widget-content-right"> 
                                            <form method="POST" action="../../connects/delete_ach.php">
                                            <input type="hidden" name="ach_id" value="<?php echo $id;?>">
                                            <input type="hidden" name="src_file" value="<?php echo $row['src_img'];?>">
                                            <button role="submit" class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> 
                                            </form>
                                          </div>
                                        </div>
                                    </div>
                                </li>
                              <?php
                              } $connect->close();
                              ?>  
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer">
            
        <span class="text-danger ml-5">
                            <?php
                                if(isset($_SESSION["err_cat"]))
                                if($_SESSION["err_cat"] != ""){
                                    
                                    echo '<i class="fa fa-close"> ';
                                    echo $_SESSION["err_cat"];
                                    echo '</i>';
                                    $_SESSION["err_cat"] = "";
                                }
                            ?>

           </span>
           <span class="text-success ml-5">
           <?php
                                if(isset($_SESSION["success"]))
                                if($_SESSION["success"] != ""){
                                    
                                    echo '<i class="fa fa-check"> ';
                                    echo $_SESSION["success"];
                                    echo '</i>';
                                    $_SESSION["success"] = "";
                                }
                            ?>
           </span>
           
            </div>
        </div>
    </div>
</div>

