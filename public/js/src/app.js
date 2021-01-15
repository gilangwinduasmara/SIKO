// Setup Event Listener


$('#button__ask_referral').click(function (){
    let searchParams = new URLSearchParams(window.location.search);
    const konseling_id = searchParams.get('id');
    axios.post('/services/referral/createagreement', {
        konseling_id
    }).then((res) => {
       window.location.href = window.location.href;
    });
});

$('#button__ask_case_conference').click(function (){
    let searchParams = new URLSearchParams(window.location.search);
    const konseling_id = searchParams.get('id');
    axios.post('/services/conference/createagreement', {
        konseling_id
    }).then((res) => {
       console.log(res.data);
    });
});

$('#button__masuk_case_conference').click(function(){
    var checkedKonselors = [];
    let searchParams = new URLSearchParams(window.location.search);
    $.each(konselors, function(i, konselor){
        if($('#checkbox__konselor_selector_'+konselor.id).is(':checked')){
            checkedKonselors.push(konselor.id);
        }
    });
    let data = {
        judul_case_conference: $('#input__judul_case').val(),
        konseling_id: searchParams.get('id'),
        konselors:checkedKonselors
    };

    axios.post('/services/conference', data).then(res=>{
        window.location.href = "/caseconference"
    });

});
$('#button__submit_case_conference').click(function(){
    $('#step_2').hide();
    $('#step_3').show();
});

$('#button__submit_referal').click(function(){

})

$('#button__submit_close_case').click(function(){

})

// Informasi Konseli Event Listener

$('button[name="personal_information__ruangkonseling"]').click(function(){
    konselingId = $(this).attr('konselingId');
    $('#chat-container').show();
    showChat();
})

$('button[name="personal_information__caseconference"]').click(function(){
    window.location.href=$(this).attr('href')
})

$('button[name="personal_information__referal"]').click(function(){
    window.location.href=$(this).attr('href')
})
$('button[name="personal_information__rangkumankonseling"]').click(function(){
    // ganti pakai name!
    $('#modal__rangkumankonseling_'+$(this).data('value')).modal('show')
})



$('button[name="konseli__caseconference"]').click(function(){
    console.log('modal');
    $('#modal__case_conference').modal('show');
});

$('button[name="konseli__referral"]').click(function(){
    console.log('modal');
    $('#modal__case_conference').modal('show');
});

$('#button_caseconference__agree').click(function(){
    const konseling_id = konseling.id;
    axios.post('/services/conference/createagreement', {
        konseling_id
    }).then((res) => {
        window.location.href = "/dashboard";
    });
});

$('#button_caseconference__decline').click(function(){
    const konseling_id = konseling.id;
    axios.post('/services/conference/declineagreement', {
        konseling_id
    }).then((res) => {
        window.location.href = "/dashboard";
    });
});


$('#button_caseconference__agree').click(function(){
    const konseling_id = konseling.id;
    axios.post('/services/referral/createagreement', {
        konseling_id
    }).then((res) => {
        window.location.href = "/dashboard";
    });
});

$('#button_caseconference__decline').click(function(){
    const konseling_id = konseling.id;
    axios.post('/services/referral/declineagreement', {
        konseling_id
    }).then((res) => {
        window.location.href = "/dashboard";
    });
});

$('form[name="form__rangkumankonseling"').submit(function(e){
    e.preventDefault();
    axios.post('/services/rangkumankonseling', $(this).serialize()).then((res) => {
        console.log(res.data)
        window.location.href="/daftarkonseli"
    })
})


function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

$(document).ready(function(){
    let urlParam = new URLSearchParams(window.location.search);
    let path = window.location.pathname.split("/").pop()
    if(path === "caseconference"){
        if(urlParam.has("id")){
            selectedCaseconference = caseconferences.filter((o) => (o.id === parseInt(urlParam.get("id"))))[0];
            $('#chat-container').show();
            $('#conference-information-container').hide();
            showChat();
        }
    }
})
