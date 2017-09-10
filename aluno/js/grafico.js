google.charts.load("current", {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var mes_atual = <?php echo $mes_atual; ?>;
        var data;
        var janeiro = <?php echo $jan; ?>;
        var fevereiro = <?php echo $fev; ?>;
        var marco = <?php echo $marco; ?>;
        var abril = <?php echo $abril; ?>;
        var maio = <?php echo $maio; ?>;
        var junho = <?php echo $junho; ?>;
        var julho = <?php echo $julho; ?>;
        var agosto = <?php echo $agosto; ?>;
        var setembro = <?php echo $setembro; ?>;
        var outubro = <?php echo $outubro; ?>;
        var novembro = <?php echo $novembro; ?>;
        var dezembro = <?php echo $dezembro; ?>;


        if (mes_atual === 1) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Nov", novembro, "#ec6907"],
                ["Dez", dezembro, "#ec6907"],
                ["Jan", janeiro, "#ec6907"]
            ]);
        } else if (mes_atual === 2) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Dez", dezembro, "#ec6907"],
                ["Jan", janeiro, "#ec6907"],
                ["Fev", fevereiro, "#ec6907"]
            ]);
        } else if (mes_atual === 3) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Jan", janeiro, "#ec6907"],
                ["Fev", fevereiro, "#ec6907"],
                ["Mar", marco, "#ec6907"]
            ]);
        } else if (mes_atual === 4) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Fev", fevereiro, "#ec6907"],
                ["Mar", marco, "#ec6907"],
                ["Abr", abril, "#ec6907"]
            ]);
        } else if (mes_atual === 5) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Mar", marco, "#ec6907"],
                ["Abr", abril, "#ec6907"],
                ["Mai", maio, "#ec6907"]
            ]);
        } else if (mes_atual === 6) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Abr", abril, "#ec6907"],
                ["Mai", maio, "#ec6907"],
                ["Junho", junho, "#ec6907"]
            ]);
        } else if (mes_atual === 7) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Mai", maio, "#ec6907"],
                ["Jun", junho, "#ec6907"],
                ["Jul", julho, "#ec6907"]
            ]);
        } else if (mes_atual === 8) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Jun", junho, "#ec6907"],
                ["Jul", julho, "#ec6907"],
                ["Ago", agosto, "#ec6907"]
            ]);
        } else if (mes_atual === 9) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Jul", julho, "#ec6907"],
                ["Ago", agosto, "#ec6907"],
                ["Set", setembro, "#ec6907"]
            ]);
        } else if (mes_atual === 10) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Ago", agosto, "#ec6907"],
                ["Set", setembro, "#ec6907"],
                ["Out", outubro, "#ec6907"]
            ]);
        } else if (mes_atual === 11) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Set", setembro, "#ec6907"],
                ["Out", outubro, "#ec6907"],
                ["Nov", novembro, "#ec6907"]
            ]);
        } else if (mes_atual === 12) {
            data = google.visualization.arrayToDataTable([
                ["Element", "Qtde.", {role: "style"}],
                ["Out", outubro, "#ec6907"],
                ["Nov", novembro, "#ec6907"],
                ["Dez", dezembro, "#ec6907"]
            ]);
        }

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "Quantidade de agendamentos por mês",
            width: 600,
            height: 400,
            bar: {groupWidth: "60%"},
            legend: {position: "none"}
        };
        var chart = new google.visualization.LineChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }


