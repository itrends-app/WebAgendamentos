<style>
    tr, td {
        border: none;
        padding-bottom: 5px;
    }
    .direita {
        text-align: right;
        padding-right: 10px;
    }

    .panel {
        padding: 20px;
    }
</style>
<div id="aba-horario">
    <div class="panel panel-default">
        <div class="row">
            <form method="post" action="" id="form-horario" name="formHorario">

                <div class="col-md-4">

                    <select name="status" class="form-control">
                        <option value="Habilitado">Habilitado</option>
                        <option value="Desabilitado">Desabilitado</option>
                    </select>

                    <div class="mg-top-20"></div>

                    <table>
                        <tr>
                            <td width="50">
                                <input type="checkbox" name="seg" value="seg"> seg:
                            </td>
                            <td>
                                <input type="text" name="seg_ini" class="form-control form-mask">
                            </td>
                            <td width="30">
                                até
                            </td>
                            <td>
                                <input type="text" name="seg_fim" class="form-control form-mask" >
                            </td>
                        </tr>

                        <tr>
                            <td width="50">
                                <input type="checkbox" name="ter" value="ter"> ter:
                            </td>
                            <td width="70">
                                <input type="text" name="ter_ini" class="form-control form-mask">
                            </td>
                            <td width="30">
                                até
                            </td>
                            <td width="70">
                                <input type="text" name="ter_fim" class="form-control form-mask">
                            </td>
                        </tr>

                        <tr>
                            <td width="50">
                                <input type="checkbox" name="qua" value="qua"> qua:
                            </td>
                            <td width="70">
                                <input type="text" name="qua_ini" class="form-control form-mask">
                            </td>
                            <td width="30">
                                até
                            </td>
                            <td width="70">
                                <input type="text" name="qua_fim" class="form-control form-mask">
                            </td>
                        </tr>

                        <tr>
                            <td width="50">
                                <input type="checkbox" name="qui" value="qui"> qui:
                            </td>
                            <td width="70">
                                <input type="text" name="qui_ini" class="form-control form-mask">
                            </td>
                            <td width="30">
                                até
                            </td>
                            <td width="">
                                <input type="text" name="qui_fim" class="form-control form-mask">
                            </td>
                        </tr>

                        <tr>
                            <td width="50">
                                <input type="checkbox" name="sex" value="sex"> sex:
                            </td>
                            <td width="70">
                                <input type="text" name="sex_ini" class="form-control form-mask">
                            </td>
                            <td width="30">
                                até
                            </td>
                            <td width="70">
                                <input type="text" name="sex_fim" class="form-control form-mask">
                            </td>
                        </tr>

                        <tr>
                            <td width="50">
                                <input type="checkbox" name="sab" value="sab"> sáb:
                            </td>
                            <td width="70">
                                <input type="text" name="sab_ini" class="form-control form-mask">
                            </td>
                            <td width="30">
                                até
                            </td>
                            <td width="70">
                                <input type="text" name="sab_fim" class="form-control form-mask">
                            </td>
                        </tr>

                        <tr>
                            <td width="60">
                                <input type="checkbox" name="dom" value="dom"> dom:
                            </td>
                            <td width="85">
                                <input type="text" name="dom_ini" class="form-control form-mask">
                            </td>
                            <td width="45">
                                até
                            </td>
                            <td width="70">
                                <input type="text" name="dom_fim" class="form-control form-mask">
                            </td>
                        </tr>

                    </table>

                </div>
                <div class="mg-top-20"></div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td width="155" class="direita">Exibição de Grade:</td>
                            <td width="128">
                                <select class="form-control" name="grade">
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select>
                            </td>
                            <td>min</td>
                        </tr>

                        <tr class="hidden">
                            <td class="direita">Agendamento Mínimo:</td>
                            <td>
                                <select class="form-control" name="agend_min">
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select>
                            </td>
                            <td>min</td>
                        </tr>

                        <tr class="hidden">
                            <td class="direita">Agendamento Padrão:</td>
                            <td>
                                <select class="form-control" name="agend_padrao">
                                    <option value="30">30</option>
                                    <option value="60">60</option>
                                </select>
                            </td>
                            <td>min</td>
                        </tr>

                        <tr class="hidden">
                            <td class="direita">Agendamento Máximo:</td>
                            <td>
                                <select class="form-control" name="agend_max">
                                    <option value="30">30</option>
                                    <option value="60">60</option>
                                    <option value="90">90</option>
                                    <option value="120">120</option>
                                </select>
                            </td>
                            <td>min</td>
                        </tr>

                    </table>

                    <br><br>

                    <table>
                        <tr>
                            <td class="direita">Pausa</td>
                            <td><input type="text" name="pausa" class="form-control"></td>
                            <td>Retorno </td>
                            <td><input type="text" name="retorno" class="form-control"></td>
                        </tr>
                    </table>
                </div>           

            </form>
        </div>
        
        <div class="mg-top-20"></div>
        <div class="panel-footer">
            <center>
                <input type="button" id="salvar-horario" value="Próximo" class="btn btn-success btn-mob">
            </center>
        </div>
    </div>

</div>