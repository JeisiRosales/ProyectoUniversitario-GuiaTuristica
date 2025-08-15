<input type="hidden" name="SERVERURL" id="SERVERURL" value = "<?php echo SERVERURL?>">

<!-- en esta sección cada grupo trabajará sobre la sección del menú que le corresponde y guiandose por la sección DOMICILIO ubicada
al final. Tomen encuenta la estructura del código y el nombre de las rutas y de las variables para que mantenga el mismo esquema de 
diseño -->

<div class="panel-group" id="accordion">       

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE PLAYAS -------------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->

                <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: rgb(0, 130, 193)" >
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style = "color : white" action="post">
                            <span class="fa fa-calendar">
                            </span> Playas </a>
                        </h4>
                    
                    </div><?php if  (($_SESSION['itemMenu'] == "Playas") OR ($_SESSION['itemMenu'] == "TipoPlaya"))
                    {?><div id="collapseOne" class="panel-collapse collapse in";>
                    <?php 
                    }
                      else 
                    {?> 
                        <div id="collapseOne" class="panel-collapse collapse";><?php 
                    }?>          
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary" style="font-size:20px; color:blue"></span>
                                        <a href="<?php echo SERVERURL?>Playas/ListarPlayas"> Palyas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary" style="font-size:20px; color:blue"></span>
                                        <a href="<?php echo SERVERURL?>TipoPlayas/ListarTipoPlayas"> Tipo Playas</a>
                                    </td>
                                </tr>

                            
                            </table>
                        </div>
                    </div>
                </div>

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION RELIGION  -------------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->

                <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: purple">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style = "color : white" action="post"><span class="glyphicon glyphicon-th">
                            </span> Religión</a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "Iglesias") OR ($_SESSION['itemMenu'] == "Santos"))
                    {?>
                         <div id="collapseTwo" class="panel-collapse collapse in";>   
                    <?php 
                    }
                      else 
                    {?> 
                        <div id="collapseTwo" class="panel-collapse collapse";>   
                    <?php 
                    }?>
                     <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary" style="font-size:20px; color:blue"></span>
                                        <a href="<?php echo SERVERURL?>Iglesias/ListarIglesias"> Iglesias</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary" style="font-size:20px; color:blue"></span>
                                        <a href="<?php echo SERVERURL?>Santos/ListarSantos"> Santos</a>
                                    </td>
                                </tr>
                            </table>
                        </div>   
                     </div>
                </div>
<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE HISTORIA ------------------------------------------------------>
<!--------------------------------------------------------- -------------------------------------------------------------------------->

                <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: red">
                        <h4 class="panel-title">
                            <span class= "fab fa-expeditedssl" style = "color : white" ></span>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style = "color : white"><span class="">
                            </span>Historia</a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "Sitios") OR ($_SESSION['itemMenu'] == "TarifarioSitios"))
                    {?>
                         <div id="collapseThree" class="panel-collapse collapse in";>   
                    <?php 
                    }
                      else 
                    {?> 
                        <div id="collapseThree" class="panel-collapse collapse";>   
                    <?php 
                    }?>
                    <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary" style="font-size:20px; color:blue"></span>
                                        <a href="<?php echo SERVERURL?>Sitios/ListarSitios"> Sitios Históricos</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary" style="font-size:20px; color:blue"></span>
                                        <a href="<?php echo SERVERURL?>TarifarioSitios/ListarTarifarioSitios"> Tarifario Sitios</a>
                                    </td>
                                </tr>
                            </table>
                        </div>   
                     </div>
                       
                </div>

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE PARQUES-------------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->
                

                <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: green">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" style = "color : white"><span class="fa fa-cog">
                            </span> Parques y Monumentos</a>
                        </h4>
                        
                    </div><?php if  (($_SESSION['itemMenu'] == "Parques") OR ($_SESSION['itemMenu'] == "TarifarioParques") OR ($_SESSION['itemMenu'] == "TipoParques")){?>
                         <div id="collapseFour" class="panel-collapse collapse in";>   
                    <?php 
                    }
                      else 
                    {?> 
                        <div id="collapseFour" class="panel-collapse collapse";>   
                    <?php 
                    }?>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="fas fa-clinic-medical" style="font-size:20px; color:purple"></span>
                                        <a href="<?php echo SERVERURL?>Parques/ListarParques">Parques y Monumentos</a>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fas fa-hospital" style="font-size:20px; color:darkgreen"> </span>
                                        <a href="<?php echo SERVERURL?>TipoParques/ListarTipoParques">Tipos Parques</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fas fa-gas-pump" style="font-size:20px; color:brown"></span>
                                        <a href="<?php echo SERVERURL?>TarifarioParques/ListarTarifarioParques">Tarifario Parques</a>
                                    </td>
                                </tr>
                                </table>
                                
                        </div>
                    </div>
                    </div>

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE MUSEOS -------------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->

                    <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: rgb(128, 0, 32)">
                        <h4 class="panel-title" style = "color : white">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="fas fa-calculator">
                            </span> Museos </a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "Museos") OR ($_SESSION['itemMenu'] == "TarifarioMuseos")) {?>
                    <div id="collapseFive" class="panel-collapse collapse in"><?php 
                    }
                      else 
                    {?> 
                        <div id="collapseFive" class="panel-collapse collapse">
                    <?php 
                    }?>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="fas fa-money" style="font-size:20px; color:darkblue"></span>
                                        <a href="<?php echo SERVERURL?>Museos/ListarMuseos"> Museos</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fas fa-money" style="font-size:20px; color:blue"></span>
                                        <a href="<?php echo SERVERURL?>TarifarioMuseos/ListarTarifarioMuseos"> Tarifario Museos</a>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                 </div>

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE GASTRONOMIA --------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->

                 <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: orange ">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" style = "color : white"><span class="fa fa-cog">
                            </span> Gastronomía </a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "Establecimientos") OR ($_SESSION['itemMenu'] == "TipoEstablecimiento")){?>
                         <div id="collapseSix" class="panel-collapse collapse in";>   
                    <?php 
                    }
                      else 
                    {?> 
                        <div id="collapseSix" class="panel-collapse collapse";>   
                    <?php 
                    }?>
                        <div class="panel-body">
                            <table class="table">
                                
                                <tr>
                                    <td>
                                        <span class="fas fa-hospital" style="font-size:20px; color:darkgreen"> </span>
                                        <a href="<?php
                                        echo SERVERURL?>Establecimientos/ListarEstablecimientos"> Establecimientos</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fas fa-medkit" style="font-size:20px; color:lightgreen"> </span>
                                        <a href="<?php echo SERVERURL;?>TipoEstablecimientos/ListarTipoEstablecimientos">Tipo Establecimiento</a>
                                    </td>
                                </tr>
                             
                                     
                            </table>
                        </div>
                    </div>
                    </div>
<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE HOTELES --- --------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->
                
                  <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: darkblue">
                        <h4 class="panel-title" style = "color : white">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><span class="glyphicon glyphicon-globe">
                            </span> Hoteles/Alojamiento </a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "Alojamientos") OR ($_SESSION['itemMenu'] == "Categorías") ) {?>
                    <div id="collapseSeven" class="panel-collapse collapse in"><?php 
                    }
                      else 
                    {?> 
                        <div id="collapseSeven" class="panel-collapse collapse">
                    <?php 
                    }?>
                        <div class="panel-body">
                            <table class="table">
                               
                                <tr>
                                    <td>
                                        <span class="fas fa-chess-king" style="font-size:20px; color:yellow"></span>
                                        <a href="<?php echo SERVERURL?>Alojamientos/ListarAlojamientos"> Hoteles y Alojamientos</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <span class="fas fa-chess-knight" style="font-size:20px; color:green"></span>
                                        <a href="<?php echo SERVERURL?>Categorías/ListarCategorías"> Categorías</a>
                                    </td>
                                </tr>
                              
                            </table>
                        </div>
                    </div>
                 </div>
            

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE AGENCIAS ------------------------------------------------------>
<!--------------------------------------------------------- -------------------------------------------------------------------------->

          <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color:  #DC3545">
                        <h4 class="panel-title" style = "color : white">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><span class="glyphicon glyphicon-globe">
                            </span> Agencias de Viaje </a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "Agencias") OR ($_SESSION['itemMenu'] == "ServiciosAgencias")) {?>
                    <div id="collapseEight" class="panel-collapse collapse in"><?php 
                    }
                      else 
                    {?> 
                        <div id="collapseEight" class="panel-collapse collapse">
                    <?php 
                    }?>
                        <div class="panel-body">
                            <table class="table">
                               
                                <tr>
                                    <td>
                                        <span class="fas fa-chess-king" style="font-size:20px; color:yellow"></span>
                                        <a href="<?php echo SERVERURL?>Agencias/ListarAgencias"> Agencias</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <span class="fas fa-chess-knight" style="font-size:20px; color:green"></span>
                                        <a href="<?php echo SERVERURL?>Servicios/ListarServicios"> Servicios</a>
                                    </td>
                                </tr>
                              
                            </table>
                        </div>
                    </div>
                 </div>

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE COMERCIO ------------------------------------------------------>
<!--------------------------------------------------------- -------------------------------------------------------------------------->

          <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color:rgb(250, 221, 60)">
                        <h4 class="panel-title" style = "color : white">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine"><span class="glyphicon glyphicon-globe">
                            </span> Centros Comerciales </a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "Comercios") OR ($_SESSION['itemMenu'] == "Tiendas")) {?>
                    <div id="collapseNine" class="panel-collapse collapse in"><?php 
                    }
                      else 
                    {?> 
                        <div id="collapseNine" class="panel-collapse collapse">
                    <?php 
                    }?>
                        <div class="panel-body">
                            <table class="table">
                               
                                <tr>
                                    <td>
                                        <span class="fas fa-chess-king" style="font-size:20px; color:yellow"></span>
                                        <a href="<?php echo SERVERURL?>Comercios/ListarComercios"> Centros Comerciales</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <span class="fas fa-chess-knight" style="font-size:20px; color:green"></span>
                                        <a href="<?php echo SERVERURL?>Tiendas/ListarTiendas"> Tiendas de Marcas</a>
                                    </td>
                                </tr>
                              
                            </table>
                        </div>
                    </div>
                 </div>

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- SECCION DE SALUD Y SEGURIDAD---------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->

          <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: black">
                        <h4 class="panel-title" style = "color : white">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen"><span class="glyphicon glyphicon-globe">
                            </span>Salud y Seguridad</a>
                        </h4>
                    </div><?php if  (($_SESSION['itemMenu'] == "CentrosSaludySeduridad") OR ($_SESSION['itemMenu'] == "TipoCentros") OR ($_SESSION['itemMenu'] == "ServiciosCentros")) {?>
                    <div id="collapseTen" class="panel-collapse collapse in"><?php 
                    }
                      else 
                    {?> 
                        <div id="collapseTen" class="panel-collapse collapse">
                    <?php 
                    }?>
                        <div class="panel-body">
                            <table class="table">
                               
                                <tr>
                                    <td>
                                        <span class="fas fa-chess-king" style="font-size:20px; color:yellow"></span>
                                        <a href="<?php echo SERVERURL?>CentrosSaludySeduridad/ListarHospitalesyPolicias">Clínias, Hospitales y Cuerpos Policiales</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <span class="fas fa-chess-knight" style="font-size:20px; color:green"></span>
                                        <a href="<?php echo SERVERURL?>TipoCentros/ListarTipoCentrosSaludySeguridad"> Tipos Centros Salud y Seguridad</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <span class="fas fa-chess-knight" style="font-size:20px; color:green"></span>
                                        <a href="<?php echo SERVERURL?>ServiciosCentros/ListarServiciosCentros"> Servicios de Salud y Seguridad</a>
                                    </td>
                                </tr>
                              
                            </table>
                        </div>
                    </div>
                 </div>


<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- DOMICILIO ---------------------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->

                  <div class="panel panel-default">
                    <div class="panel-heading" style =" background-color: #2F5597">
                        <h4 class="panel-title" style = "color : white">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven"><span class="glyphicon glyphicon-globe">
                            </span> Domicilio </a>
                        </h4>
                    </div>


                    <!-- Note que aquí todos los nombres son en plural
                     y eso es equivalente al nombre de la carpeta que se guardan en la carpeta VIEWS
                     y logicamente que tienen relacion con los controladores y modelos
                     dado que estamos trabajando bajo la arquitectura del MVC o Modelo Vista Controlador
                    -->
                    <?php if (($_SESSION['itemMenu'] == "Estados") OR ($_SESSION['itemMenu'] == "Ciudades") OR ($_SESSION['itemMenu'] == "Municipios") OR ($_SESSION['itemMenu'] == "Parroquias")) 
                    {?>
                           <div id="collapseEleven" class="panel-collapse collapse in"><?php 
                    }
                    else 
                    {?> 
                           <div id="collapseEleven" class="panel-collapse collapse">
                    <?php 
                    }?>
                    
                    <div class="panel-body">
                            <table class="table">
                               
                                <tr>
                                    <td>
                                        <span class="fas fa-chess-king" style="font-size:20px; color:yellow"></span><a href="<?php echo SERVERURL?>Estados/ListarEstados"> Estado</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <span class="fas fa-chess-knight" style="font-size:20px; color:green"></span><a href="<?php echo SERVERURL?>Ciudades/ListarCiudades"> Ciudad</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fas fa-chess-rook" style="font-size:20px; color:black"></span><a href="<?php echo SERVERURL?>Municipios/ListarMunicipios"> Municipio</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fas fa-chess-pawn" style="font-size:20px; color:red"></span><a href="<?php echo SERVERURL?>Parroquias/ListarParroquias"> Parroquia</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                 </div>

<!------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------------------- FIN MENU  ---------------------------------------------------------------->
<!--------------------------------------------------------- -------------------------------------------------------------------------->

</div>
