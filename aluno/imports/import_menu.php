<nav class="sidebar">
    <ul class="sidebar-menu">
        <li><span class="nav-section-title"></span></li>
        <li><a href="home.php"><span class="fa fa-home"></span>Início</a></li>
        <li class="have-children <?php echo ($pag == 'opt')?'active':'';?>" ><a href="#"><span class="fa fa-bars"></span>Opções</a>
            <ul <?php echo ($pag == 'opt')?'style="display:block"':'';?>>
                <li><a href="horarios.php">Agendar Horários</a></li>
                <li><a href="consulta_agendamentos.php">Agendamentos</a></li>
            </ul>
        </li>
        <li><a href="home.php"><span class="fa fa-flag"></span>Relatório</a></li>
        <li><a href="#"><span class="fa fa-sign-out"></span>Sair</a></li>
    </ul>
</nav>

