<script>
    const ctx = document.getElementById('resumeChart').getContext('2d');

    let income = {{$income}};
    let outcome = {{$outcome}};
    let total = income + outcome;
    let data = [
        parseInt((outcome / total) * 100),
        parseInt((income / total) * 100),
    ];

    const resumeChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Outcome', 'Income'],
            datasets: [{
                label: '% of transactions',
                data: data,
                backgroundColor: [
                    'rgba(237, 85, 101, 0.2)',
                    'rgba(160, 212, 104, 0.2)',
                ],
                borderColor: [
                    'rgba(237, 85, 101, 1)',
                    'rgba(160, 212, 104, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Resume chart'
                }
            }
        },
    });
</script>
