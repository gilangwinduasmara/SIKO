var hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']

function displayDaftarKonselingByHari(target){
    $('.dropdown-daftarkonseling').text(target)
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

$(document).ready(function(){
    let notifHtml = '';
    let chatHtml = '';
    let notifCount = 0;
    let chatCount = 0;

    axios.get('/services/notification').then(res=>{
        console.log(res.data)
        res.data.rows.map((item, index) => {
            if(item.type === 'chat'){
                $('#chat-badge').show();
                chatHtml +=`
                <li class="navi-item">
                    <a href=${"/notification/"+item.id} class="navi-link">
                        <div class="navi-text">
                            <div class="font-weight-bold">${item.title}</div>
                            <div class="text-muted">${item.message}</div>
                        </div>
                    </a>
                </li>
                `;
                $('#dropdown-chat').html(chatHtml)
            }else{
                $('#notif-badge').show();
                notifHtml +=`
                <li class="navi-item">
                    <a href=${"/notification/"+item.id} class="navi-link">
                        <div class="navi-text">
                            <div class="font-weight-bold">${item.title}</div>
                            <div class="text-muted">${item.message}</div>
                        </div>
                    </a>
                </li>
                `;
                $('#dropdown-notif').html(notifHtml)
            }


        })
    })

})
