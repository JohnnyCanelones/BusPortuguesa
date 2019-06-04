
var ctx = document.getElementById("myChart").getContext('2d');
var tipo_mantenimiento = document.getElementsByClassName('tipo_mantenimiento')
let veces = document.getElementsByClassName('value')
let labels = []
let data = []
let colores = []
function colorRandom() {
    let letras_numeros = '0123456789ABCDEF'
    let color = '#'
    for (let i = 0; i < 6; i++) {
        color += letras_numeros[Math.floor(Math.random() * 16)]
    }
    colores.push(color)
    
}
for (let i = 0; i < tipo_mantenimiento.length; i++) {
    labels.push(tipo_mantenimiento[i].dataset.value)
    data.push(veces[i].dataset.value)
    colorRandom()
      
}

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: '',
            data: data,
            backgroundColor:colores,
            borderColor: colores,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        responsive:{
            rules:[{
                condition:{
                    maxHeight:600
                }
            }]
        }
    }
});

