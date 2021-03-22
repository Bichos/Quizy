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

    $('.edit').click(function(){
       // location.reload();
        $("#content").load("./questions_edit.php?QID="+this.value);
        console.log(this.value);
          //  location.reload();
    });
   });
</script>


<div class="row d-flex justify-content-center container">
    <div class=" card-hover-shadow-2x card  col-md-8">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Lista Pytań</div>
                <a id="add" href="#questions_add" class="btn btn-info ml-5">Dodaj nowe pytanie</a>
            </div>
            <div class="scroll-area-sm" style="height: 500px;">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                              <?php
                              include "../../config.php";
                              $result = $connect->query("select id, des, public, dif, id_cat from quests ORDER BY id DESC");
                              $count = $result->num_rows;
                              while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['des'];
                                $id_cat = $row['id_cat'];
                              
                                $r = $connect->query("select name from categories where id = $id_cat");
                                $r = $r->fetch_assoc();
                                $r = $r['name'];
                              ?>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <h6><?php echo substr($name, 0, 20); ?>...</h6>
                                            </div>
                                            <div class="widget-content-left ml-2">
                                                <div class="widget-heading">
                                                
                                                
                                                  <h6>ID: <?php echo $id; ?></h6>
                                                  <h6>Kat. pyt: <?php echo $r; ?></h6>
                                                  <h6>Poziom trudności: <?php echo $row['dif']; ?></h6>

                                                    <?php if($row['public'] == 1) {?>
                                                    <h6 style="color: green">Opublikowano</h6>
                                                    <?php }else{ ?>
                                                    <h6 style="color: red">Nie widoczne dla graczy</h6>
                                                   <?php }?>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="widget-content-right"> 
                                              <button class="border-0 btn-transition btn btn-outline-success edit" value="<?php echo $id?>"> <i class="fa fa-edit"></i></button>

                                            <!-- <form method="POST" action="../../connects/delete_question.php">
                                            <input type="hidden" name="cat_id" value="<?php echo $id;?>">
                                            <button role="submit" class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> 
                                            </form> -->
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

