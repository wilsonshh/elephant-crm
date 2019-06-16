var random = function random() {
    return Math.round(Math.random() * 100);
}; // eslint-disable-next-line no-unused-vars




$.getJSON('/api/v1/gender', function(data) {
    var genderType = [];
    var genderCount = [];

    $.each(data, function(i, category) {
        console.log(i + ":");
        $.each(category, function(key, obj) {
            genderCount.push(obj);
            genderType.push(key);
        });
    });
    var pieChart = new Chart($('#canvas-5'), {
        type: 'pie',
        data: {
            labels: genderType,
            datasets: [{
                data: genderCount,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        },
        options: {
            responsive: true
        }
    });
});
$.getJSON('/api/v1/job', function(data) {
    var jobType
    var jobCount;
    $.each(data, function(i, category) {
        console.log(i + ":");
        jobType = data.map(u => (u.job_title))
        jobCount = data.map(u => (u.count))

    });



    var radarChart = new Chart($('#canvas-4'), {
        type: 'radar',
        data: {
            labels: jobType,
            datasets: [{
                label: '',
                backgroundColor: 'rgba(220, 220, 220, 0.2)',
                borderColor: 'rgba(220, 220, 220, 1)',
                pointBackgroundColor: 'rgba(220, 220, 220, 1)',
                pointBorderColor: '#fff',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220, 220, 220, 1)',
                data: jobCount
            }]
        },
        options: {
            responsive: true
        }
    }); // eslint-disable-next-line no-unused-vars


});

$.getJSON('/api/v1/activity', function(data) {
    var activity
    var activityCount;
    $.each(data, function(i, category) {
        console.log(i + ":");
        activity = data.map(u => (u.activity))
        activityCount = data.map(u => (u.count))

    });



    var barChart = new Chart($('#canvas-2'), {
        type: 'bar',
        data: {
            labels: activity,
            datasets: [{
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                borderColor: 'rgba(220, 220, 220, 0.8)',
                highlightFill: 'rgba(220, 220, 220, 0.75)',
                highlightStroke: 'rgba(220, 220, 220, 1)',
                data: activityCount
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
        }
    });


});