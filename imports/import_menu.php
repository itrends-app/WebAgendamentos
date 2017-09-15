<nav class="sidebar">
    <ul class="sidebar-menu">
        <li><span class="nav-section-title"></span></li>
        <li><a href="home.php"><span class="fa fa-dashboard"></span>Dashboard</a></li>
        <li class="have-children <?php echo ($pag == 'cad')?'active':'';?>" ><a href="#"><span class="fa fa-plus-circle"></span>Cadastrar</a>
            <ul <?php echo ($pag == 'cad')?'style="display:block"':'';?>>
                <li><a href="cadastrotutor.php">Tutores</a></li>
                <li><a href="#">Avaliação</a></li>
                <li><a href="cadastrousuario.php">Usuários</a></li>
            </ul>
        </li>
        <li class="have-children <?php echo ($pag == 'con')?'active':'';?>"><a href="#"><span class="fa fa-search"></span>Consultar</a>
            <ul <?php echo ($pag == 'con')?'style="display:block"':'';?>>
                <li><a href="consagendamentos.php">Agendamentos</a></li>
                <li><a href="#">Avaliações</a></li>
                <li><a href="consusuarios.php">Usuários</a></li>
            </ul>
        </li>
        <li class="have-children <?php echo ($pag == 'rel')?'active':'';?>"><a href="#"><span class="fa fa-flag"></span>Relatórios</a>
            <ul <?php echo ($pag == 'rel')?'style="display:block"':'';?>>
                <li><a href="relagendamentos.php">Agendamentos</a></li>
            </ul>
        </li>
        <li class="have-children <?php echo ($pag == 'config')?'active':'';?>"><a href="#"><span class="fa fa-cogs"></span>Configurações</a>
            <ul <?php echo ($pag == 'config')?'style="display:block"':'';?>>
                <li><a href="editarperfil.php">Perfil</a></li>
            </ul>
        </li>
        <li><a href="#"><span class="fa fa-sign-out"></span>Sair</a></li>
    </ul>
</nav>

