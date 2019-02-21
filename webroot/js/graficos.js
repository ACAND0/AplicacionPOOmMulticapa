

window.onload = function() {
            var departamentosBaja = document.getElementById("depBaja").value;
            var departamentosAlta = document.getElementById("depAlta").value;
            var ctx = document.getElementById("micanvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Baja","Alta"],
                    datasets: [{
                        label: '# Notas',
                        data: [departamentosBaja, departamentosAlta],
                        backgroundColor: [
                            '#ff4545',
                            '#80fc7a'
                        ],
                        borderColor: [
                            '#ff4545',
                            '#80fc7a'
                        ],
                        borderWidth: 1,

                    }]
                },
            });
            var ctx = document.getElementById("micanvas2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Baja", "Alta"],
                    datasets: [{
                        label: 'Estado de los departamentos',
                        data: [departamentosBaja, departamentosAlta],
                        backgroundColor: [
                            '#ff4545',
                            '#80fc7a'
                        ],
                        borderColor: [
                            '#ff4545',
                            '#80fc7a'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }