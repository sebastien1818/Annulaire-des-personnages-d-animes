//graphique viste par jour
const lineChart = document.querySelector('#lineChart');
        const graph1 = new Chart(lineChart, {
            // The type of chart we want to create
            type: "line",
            data: {
                labels: labelLine,
                datasets: [
                    {
                        data: dataLine,
                        backgroundColor: ["orange"],
                        borderColor: ["orange"],
                        label: "Visites par jour",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: {
                    title: {
                        text: "Visites selon les jours",
                        display: true,
                        position: "top",

                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        });

        //graphique visites par langues

        const lineChart2 = document.querySelector('#lineChart2');
        const graph2 = new Chart(lineChart2, {
            // The type of chart we want to create
            type: "line",
            data: {
                labels: labelLine2,
                datasets: [
                    {
                        data: dataLine2,
                        backgroundColor: ["orange"],
                        borderColor: ["orange"],
                        label: "Visites par langue",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: {
                    title: {
                        text: "Visites selon les langues",
                        display: true,
                        position: "top",
                        
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        });

        const lineChart3 = document.querySelector('#lineChart3');
        const graph3= new Chart(lineChart3, {
            // The type of chart we want to create
            type: "pie",
            data: {
                labels: labelLine3,
                datasets: [
                    {
                        data: dataLine3,
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