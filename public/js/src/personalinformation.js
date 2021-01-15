function showPersonalInformationById(id){
    $.each(konselings, function(i, konseling){
        if(konseling.id===id){
            $("#personal_information__"+konseling.id).show();
        }else{
            $("#personal_information__"+konseling.id).hide();
        }
    })
}
$(document).ready(function(){
    $("#personal_information__"+selectedKonseling).show();
})
$.each(konselings, function(i, konseling){
    $('#daftarkonseli__'+konseling.id).click(function(){
        selectedKonseling = konseling.id;
        selectedKonselingDetail = konseling;
        showPersonalInformationById(konseling.id);
        if($('#chat-container').is(':visible')){
            showChat();
        }
    })
})
