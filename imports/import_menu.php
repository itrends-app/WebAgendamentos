<nav class="sidebar">
    <ul class="sidebar-menu">
        <li><span class="nav-section-title"></span></li>
        <li><a href="home.php"><span class="fa fa-dashboard"></span>Dashboard</a></li>
        <li class="have-children <?php echo ($pag == 'tutor')?'active':'';?>" ><a href="#"><span class="fa fa-plus-circle"></span>Cadastrar</a>
            <ul <?php echo ($pag == 'tutor')?'style="display:block"':'';?>>
                <li><a href="cadastrotutor.php">Tutores</a></li>
                <li><a href="#">Avaliação</a></li>
                <li><a href="cadastrousuario.php">Usuários</a></li>
            </ul>
        </li>
        <li class="have-children"><a href="#"><span class="fa fa-search"></span>Consultar</a>
            <ul>
                <li><a href="consagendamentos.php">Agendamentos</a></li>
                <li><a href="#">Avaliações</a></li>
                <li><a href="consusuarios.php">Usuários</a></li>
            </ul>
        </li>
        <li class="have-children"><a href="#"><span class="fa fa-flag"></span>Relatórios</a>
            <ul>
                <li><a href="relagendamentos.php">Agendamentos</a></li>
            </ul>
        </li>
        <li class="have-children"><a href="#"><span class="fa fa-cogs"></span>Configurações</a>
            <ul>
                <li><a href="editarperfil.php">Perfil</a></li>
            </ul>
        </li>
        <li><a href="#"><span class="fa fa-sign-out"></span>Sair</a></li>
    </ul>
</nav>

