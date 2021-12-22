<script>
    const ctx_outcome_category = document.getElementById('outcomeCategoryChart').getContext('2d');
    const ctx_income_category = document.getElementById('incomeCategoryChart').getContext('2d');

    const hexToRGB = (color, alpha) => {
        let bigint = parseInt(color, 16);
        let r = (bigint >> 16) & 255;
        let g = (bigint >> 8) & 255;
        let b = bigint & 255;

        return `rgba(${r}, ${g}, ${b}, ${alpha})`;
    };

    const extractDataOptions = (json, title) => {

        let labels = json.map(e => e.title);
        let data_category = json.map(e => e.total);
        let backgroundColors = json.map(e => hexToRGB(e.color.replace('#', ''), 0.2));
        let borderColors = json.map(e => hexToRGB(e.color.replace('#', ''), 1));

        return {
            'labels': labels,
            'data': data_category,
            'backgroundColors': backgroundColors,
            'borderColors': borderColors,
            'title': title
        };
    };

    const factoryOptions = (options) => {
        return {
            type: 'bar',
            data: {
                labels: options.labels,
                datasets: [{
                    data: options.data,
                    backgroundColor: options.backgroundColors,
                    borderColor: options.borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    legend: false,
                    title: {
                        display: true,
                        text: options.title
                    }
                }
            },
        }
    }

    let json = @json($outcome_categories, JSON_PRETTY_PRINT);
    let options = extractDataOptions(json, 'Outcome statistics');
    const outcomeCategoryChart = new Chart(ctx_outcome_category, factoryOptions(options));

    json = @json($income_categories, JSON_PRETTY_PRINT);
    options = extractDataOptions(json, 'Income statistics');
    const incomeCategoryChart = new Chart(ctx_income_category, factoryOptions(options));
</script>
