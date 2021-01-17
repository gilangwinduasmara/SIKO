// Setup Event Listener
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }

$('#button__ask_referral').click(function (){
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    let searchParams = new URLSearchParams(window.location.search);
    const konseling_id = searchParams.get('id');
    axios.post('/services/referral/createagreement', {
        konseling_id
    }).then((res) => {
       window.location.href = window.location.href;
    });
});

$('#button__ask_case_conference').click(function (){
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    let searchParams = new URLSearchParams(window.location.search);
    const konseling_id = searchParams.get('id');
    axios.post('/services/conference/createagreement', {
        konseling_id
    }).then((res) => {
       console.log(res.data);
       window.location.href = window.location.href;
    });
});

$('#button__masuk_case_conference').click(function(){
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
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
    $('#modal__referral').modal('show');
});

$('#button_caseconference__agree').click(function(){
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    const konseling_id = konseling.id;
    axios.post('/services/conference/createagreement', {
        konseling_id
    }).then((res) => {
        window.location.href = "/dashboard";
    });
});

$('#button_caseconference__decline').click(function(){
    const konseling_id = konseling.id;
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    axios.post('/services/conference/declineagreement', {
        konseling_id
    }).then((res) => {
        window.location.href = "/dashboard";
    });
});

$('#button__close_case').click(function(){
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    const konseling_id = konseling.id;
    axios.post('/services/konseling/end', {
        id: konseling_id
    }).then(res => {
        window.location.href = "/dashboard";
    });
})


$('#button_referral__agree').click(function(){
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    const konseling_id = konseling.id;
    axios.post('/services/referral/createagreement', {
        konseling_id
    }).then((res) => {
        window.location.href = "/dashboard";
    });
});

$('#button_referral__decline').click(function(){
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    const konseling_id = konseling.id;
    axios.post('/services/referral/declineagreement', {
        konseling_id
    }).then((res) => {
        console.log(res.data)
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
            // $('#chat-container').show();
            // $('#conference-information-container').hide();
            showChat();
        }
    }
})

$('form[name="form__rekam_konseling"]').submit(function(e){
    console.log('submit')
    e.preventDefault();
    toastr.options = conf.toastr.options.saving
    toastr.info("", "Menyimpan data");
    axios.post('/services/rekamkonseling', $(this).serialize()).then((res)=>{
        window.location.href = window.location.href;
    })
})
