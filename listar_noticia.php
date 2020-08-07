<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
		$('#tabla').DataTable();
} );
</script>


<div class="card text-center">
  <div class="card-header">LISTAR PRODUCTOS</div>
  <div class="card-body text-center">



                <?php
                try{
                    require_once 'conexion.php';
                    $sql="select * from diario_noticias";
                    $result=$conn->query($sql);
                    }catch(Exception $e){
                        $error=$e->getMessage();
                    }
                ?>
                <table class="display" id="tabla"  style="font-size: 13px ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Título</th>
                      <th>Tipo</th>
                      <th>Periodista</th>
                      <th>Estado</th>
                      <th>Publicar</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                      <th><a title="Relacionar Noticia" ><i class="fas fa-file-alt" style="font-size:20px;"></i></a></th>
                      <th><a title="Relacionar Vídeo" ><i class="fas fa-video" style="font-size:20px;"></i></a></th>
                      <th><a title="Relacionar Foto Reportaje" ><i class="fas fa-camera" style="font-size:20px;"></i></i></a></th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                          while($row = $result->fetch_array()) {
                            if ($row != null) {
                               printf("
                                      <tr>
                                      <td>%s</td>
                                      <td><a target='_blank' href=\"noticia.php?ide=%d\" style='color: #007AC5;'>%s</a></td><td>
                                      ",$row["not_id"],$row["not_id"],$row["not_titulo"]);
                               $idc = $row["not_seccion"];
                                    try{
                                            require_once 'conexion.php';
                                            $sql1="select * from prensa_categoria where catid='$idc'";
                                            $result1=$conn->query($sql1);
                                            }catch(Exception $e){
                                                                 $error=$e->getMessage();
                                                                }
                                            while($row2=$result1->fetch_array()){
                                                    echo $row2['catnom'];}
                              printf("
                                        </td>
                                      <td>%s</td>
                                      ",$row["not_periodista"]);

                              if ($row["not_estado"]==0) {
                                echo "<td style='background-color:ForestGreen;'><p style='color:white;'>N</p></td>";
                                printf("
                                      <td><a title='Publicar' onclick='cargarPublicarNoticia(%s);'><i class='fas fa-upload'></i></a></td>
                                      <td><a title='Editar' onclick='cargarEditarNoticia(%s);'><i class='fas fa-edit'></i></a></td>
                                      <td><a title='Eliminar' onclick='cargarEliminarNoticia(%s);'><i class='fas fa-trash'></i></a></td>
                                      <td><a onclick='cargarRelacionarNoticia(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      <td><a onclick='cargarRelacionarVideo(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      <td><a onclick='cargarRelacionarFoto(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      </tr>",$row["not_id"],$row["not_id"],$row["not_id"],$row["not_id"],$row["not_id"],$row["not_id"]);
                                $result1->close();
                              }else if ($row["not_estado"]==1) {
                                echo "<td style='background-color:RoyalBlue;'><p style='color:white;'>P</p></td>";
                                printf("
                                      </td>
                                      <td><a title='Despublicar' onclick='cargarDespublicarNoticia(%s);'><i class='fas fa-download'></i></a></td>
                                      <td><a ><i> </i></a></td>
                                      <td><a ><i> </i></a></td>
                                      <td><a onclick='cargarRelacionarNoticia(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      <td><a onclick='cargarRelacionarVideo(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      <td><a onclick='cargarRelacionarFoto(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      </tr>",$row["not_id"],$row["not_id"],$row["not_id"],$row["not_id"]);
                                $result1->close();
                              }else if ($row["not_estado"]==2) {
                                echo "<td style='background-color:FireBrick;'><p style='color:white;'>B</p></td>";
                                printf("
                                      <td><a title='Publicar' onclick='cargarPublicarNoticia(%s);'><i class='fas fa-upload'></i></a></td>
                                      <td><a title='Editar' onclick='cargarEditarNoticia(%s);'><i class='fas fa-edit'></i></a></td>
                                      <td><a title='Eliminar' onclick='cargarEliminarNoticia(%s);'><i class='fas fa-trash'></i></a></td>
                                      <td><a onclick='cargarRelacionarNoticia(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      <td><a onclick='cargarRelacionarVideo(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      <td><a onclick='cargarRelacionarFoto(%s);' title='Relacionar' ><i class='fas fa-plus-square'></i></a></td>
                                      </tr>",$row["not_id"],$row["not_id"],$row["not_id"],$row["not_id"],$row["not_id"],$row["not_id"]);
                                $result1->close();
                              }
                              }
                            }
                            $result->close();
                            $conn->close();
                        ?>
              </tbody>
        </table>

        </div>
 </div>
