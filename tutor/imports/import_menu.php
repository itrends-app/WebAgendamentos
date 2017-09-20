<nav class="sidebar">
    <ul class="sidebar-menu">
        <li><span class="nav-section-title"></span></li>
        <li><a href="home.php"><span class="fa fa-dashboard"></span>Dashboard</a></li>
        <li class="have-children <?php echo ($pag == 'opt')?'active':'';?>" ><a href="#"><span class="fa fa-bars"></span>Opções</a>
            <ul <?php echo ($pag == 'opt')?'style="display:block"':'';?>>
                <li><a href="consulta_agendamentos.php">Agendamentos</a></li>
                <li><a href="reagendar_horario.php">Reagendar</a></li>
                <li><a href="visualiza_horarios.php">Grade de Horários</a></li>
                <li><a href="#">Cadastrar Avaliação</a></li>
            </ul>
        </li>
        <li class="have-children <?php echo ($pag == 'rel')?'active':'';?>"><a href="#"><span class="fa fa-flag"></span>Relatórios</a>
            <ul <?php echo ($pag == 'rel')?'style="display:block"':'';?>>
                <li><a href="gera_relatorio_agendamentos.php">Agendamentos</a></li>
            </ul>
        </li>
        <li><a href="./php/Logoff.php"><span class="fa fa-sign-out"></span>Sair</a></li>
    </ul>
</nav>

