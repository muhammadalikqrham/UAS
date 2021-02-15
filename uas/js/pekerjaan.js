let pekerjaan = document.querySelectorAll('#pekerjaan');
$.getJSON('http://localhost/uas/js/pekerjaan.JSON',function(data){
    for (let i = 0; i < pekerjaan.length; i++) {
        for (let j = 0; j < data.length; j++) {
            if (pekerjaan[i].innerText == data[j]['id']) {
                $('.pekerjaan'+i).html(data[j]['pekerjaan'])
                break;
            }   
            // console.log(data[j]['pekerjaan'])
        }   
    }
    for (let i = 0; i < data.length; i++) {
        $("#Pekerjaan").append("<option value='" + data[i]['id'] + "'>" + data[i]['pekerjaan'] +"</option");
        
    }
})