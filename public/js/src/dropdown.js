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
                chatHtml+=`
                <li class="navi-item">
                    <a href="#" class="navi-link">
                        <div class="navi-text">
                            <div class="font-weight-bold">${item.title}</div>
                            <div class="text-muted">${atob(item.message)}</div>
                        </div>
                    </a>
                </li>
                `;
                chatCount++;
            }else{
                notifHtml+=`
                <li class="navi-item">
                    <a href="#" class="navi-link">
                        <div class="navi-text">
                            <div class="font-weight-bold ">${item.title}</div>
                            <div class="text-muted">${item.message}</div>
                        </div>
                    </a>
                </li>`;
                notifCount++;
            }
        })
        console.log(notifHtml)
        $('#dropdown-notif').html(notifHtml)
        $('#dropdown-chat').html(chatHtml)
        if(notifCount>0){
            $('#notif-badge').show();
        }else{
            $('#notif-badge').hide();
        }
        if(chatCount>0){
            $('#chat-badge').show();
        }else{
            $('#chat-badge').hide();
        }
    })

})
