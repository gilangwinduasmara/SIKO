var hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']

function displayDaftarKonselingByHari(target){
    $.each(hari, function(i, v){
        if(target !== v){
            $('#jadwal__'+v).hide();
        }else{
            $('#jadwal__'+v).show();
        }
    });
}

$.each(hari, function(i, item){
    $("#daftarkonseling__hari_"+item).click(function(){
        displayDaftarKonselingByHari(item);
    });
    // default hari untuk daftar konseling
    displayDaftarKonselingByHari('Senin')
})
