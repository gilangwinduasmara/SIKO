
$('#button__conference').click(function(){
    showPersonalInformationById(selectedKonseling);
    $('#chat-container').hide();
    $('#conference-information-container').show();
});

function showChat(){
    $('#chat-spinner').show();
    try {
        showPersonalInformationById(null);
    }catch (e){

    }
    KTAppChat.init();
    setInterval(()=>{
        renderChat().then(()=>{
            $('#chat-spinner').hide();
        });
    }, 2000)

}

function sendChat(message){
    console.log('send chat',message);
    axios.post('/services/chatconference', {
        chat_konseling: message,
        case_conference_id: selectedCaseconference.id
    }).then(function(res){
        console.log(res);
    }).catch(function(err){
        console.log(err.message);
    });
}

async function renderChat(){
    console.log(selectedCaseconference);
    $('#chat__username').text(selectedCaseconference.judul_case_conference);

    let request = await axios.get('/services/chatconference?case_conference_id='+selectedCaseconference.id);
    let chats = request.data.rows;
    console.log(chats);
    let html = "";
    Object.keys(chats).map((timestamp, index) => {
        html+=`
            <div class="d-flex flex-column mb-5 align-items-center">
                <div class="mt-2 rounded p-1 bg-light-warning text-dark-50 font-weight-bold font-size-sm text-left max-w-400px">${timestamp}</div>
            </div>
        `;
        chats[timestamp].map((chat, index) => {
            console.log(chat.userID,userId);
            if(chat.UserID === user.id.toString()){
                html+=`
                    <div class="d-flex flex-column mb-5 align-items-end">
<!--                        <div class="d-flex align-items-center">-->
<!--                            <div class="symbol symbol-circle symbol-40 mr-3">-->
<!--                                <img alt="Pic" src="/metronic/theme/html/demo5/dist/assets/media/users/300_12.jpg">-->
<!--                            </div>-->
                            <div>

                            </div>
<!--                        </div>-->
                        <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-left max-w-400px d-flex align-items-center">
                            <div>
                                ${atob(chat.chat_konseling)}
                            </div>
                            <div class="text-muted font-size-sm ml-2">${moment(chat.created_at).format("hh:mm:ss")}</div>
                        </div>
                    </div>`;
            }else{
                html+=`
                    <div class="d-flex flex-column mb-5 align-items-start">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-40 mr-3">
                                <img class="img-fit" alt="Pic" src="/avatars/${chat.konselor.user.avatar}">
                            </div>
                            <div>
                                <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">${chat.konselor.nama_konselor}</a>
                            </div>
                        </div>
                        <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-left max-w-400px d-flex align-items-center">
                            <div>
                                ${atob(chat.chat_konseling)}
                            </div>
                            <div class="text-muted font-size-sm ml-2">${moment(chat.created_at).format("hh:mm:ss")}</div>
                        </div>
                    </div>`;
            }
        });
    });
    $('#messages-box').html(html);
}
