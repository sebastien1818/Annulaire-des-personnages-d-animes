const lineChart = document.querySelector('#lineChart');
        const graph1 = new Chart(lineChart, {
            // The type of chart we want to create
            type: "pie",
            data: {
                labels: labelLine,
                datasets: [
                    {
                        data: dataLine,
                        backgroundColor: ["orange","yellow","red",],
                        label: "Nombre par race",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: {
                    title: {
                        text: "Nombre selon les races des personnages",
                        display: true,
                        position: "top",

                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        });