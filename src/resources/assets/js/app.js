import Chart from 'chart.js';

const basketStatistics = document.querySelector('#basketStatistics');
if (basketStatistics) {
  const data = JSON.parse(basketStatistics.dataset.statistics);
  const labels = JSON.parse(basketStatistics.dataset.brands);
  const label = 'Куплено брендов';

  new Chart(basketStatistics, {
    type: 'bar',
    data: {
      datasets: [
        {
          label,
          data,
        },
      ],
      labels,
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          }],
      },
    },
  });
}