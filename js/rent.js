function updateDate(){

    var startDate = document.getElementById('startDate');
    var endDate = document.getElementById('endDate');

    startDate.addEventListener('change', (event) => { 
        var start = event.target.value
        var date = new Date(start);
        var dateEnd = new Date(date.getTime() + 86400000);
        var inputEndValue = endDate.value;
        var end = new Date(endDate.value);
        var dateFormat = dateEnd.getFullYear() + "-" + (dateEnd.getMonth() + 1).toString().padStart(2, "0") + "-" + dateEnd.getDate().toString().padStart(2, "0");
        endDate.min = dateFormat;
        if (dateEnd < end){
            endDate.value = inputEndValue;
        } else {
            endDate.value = dateFormat;
        }
    });
}

window.onload = function() { updateDate(); };

