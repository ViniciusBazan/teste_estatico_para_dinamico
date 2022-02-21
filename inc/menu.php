<?php 

//Início do Array do menu

$menu = array(
    0 => array(
        "item"    => "Dashboard",
        "href"     => "index.php",
        "active"  => true,
        "icon"    => "fa fa-home",
        "submenu" => ""
    ),
    1 => array(
        "item"    => "Cadastro",
        "href"    => "javascript:;",
        "active"  => false,
        "icon"    => "fa fa-file-text",
        "submenu" => array(
            0 => array(
                "subitem" => "Cliente",
                "href"    => "#"
            ),
            1 => array(
                "subitem" => "Fornecedor",
                "href"    => "#"
            ),
            2 => array(
                "subitem" => "Perfil de acesso",
                "href"    => "#"
            ),
            3 => array(
                "subitem" => "Produtos",
                "href"    => "#"
            ),
            4 => array(
                "subitem" => "Usuário",
                "href"    => "#"
            ),
        )
    ),
    2 => array(
        "item"    => "Relatório",
        "href"    => "javascript:;",
        "active"  => false,
        "icon"    => "fa fa-bar-chart-o",
        "submenu" => array(
            0 => array(
                "subitem" => "Cliente",
                "href"    => "#"
            ),
            1 => array(
                "subitem" => "Faturamento",
                "href"    => "#"
            ),
            2 => array(
                "subitem" => "Produtos",
                "href"    => "#"
            )
        )
    )
);


$json = json_encode($menu);
echo "<script>console.log('${json}')</script>";



?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
                <!-- INICIO MENU DINAMICO -->
                <?php
                foreach($menu as &$li){
                    ?> <li class=" <?php if($li["active"] == true){echo "start active";} ?>">
                        <a href="<?php echo $li["href"]; ?>">
                        <i class="<?php echo $li["icon"]; ?>"></i>
                        <span class="title">
                            <?php echo $li["item"]; ?>
                        </span>
                        <?php
                        if($li["active"] == true){
                            echo "<span class='selected'>";
                            echo "</span>";
                        }

                        if(is_array($li["submenu"])){
                            echo "<span class='arrow'>";
                            echo "</span>";
                            echo "</a>";
                            echo "<ul class='sub-menu'>";

                            foreach($li["submenu"] as &$submenu){
                                ?>
                                <li>
                                    <a href="<?php echo $submenu["href"]; ?>"><?php echo $submenu["subitem"]; ?></a>
                                </li>
                                <?php
                            }
                            echo "</ul>";
                            echo "</li>";

                        }else{
                            echo "</a>";
                            echo "</li>";
                        }
                        ?>
                <?php
                }
                ?>
                
                <!-- FIM MENU DINÂMICO -->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->