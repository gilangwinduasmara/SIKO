let jadwalKonselor= {};
var selectedJadwal= null;
var selectedKonselor= null;

let days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

function onJadwalSelected(id){
    selectedJawdal = id;
    console.log(selectedJadwal)
    $('#input__jadwal_konselor_id').val(id);
    $('#button__daftar_sesi').attr('disabled', false);
    $('#button__daftar_sesi_referral').attr('disabled', false);
}

$.each(days, function(index, hari){
    $('#list_hari__'+hari).click(function (){
        let aEl = $($(this).children()[0]);
        if(aEl.data('toggle') === 'pill'){
            $('#button__daftar_sesi').attr('disabled', true);
            console.log(aEl.data('value'));
            const selectedJadwalKonselor = jadwalKonselor[aEl.data('value')];
            let html = "";
            selectedJadwalKonselor.map((jadwal, index) => {
                html +=`
                <li onclick="onJadwalSelected(${jadwal.id})" class="card card-custom nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                    <a class="nav-link py-2 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-value="{{ucwords($day)}}" href="#">
                        <span class="font-size-sm py-2 font-weight-bold text-center">${jadwal.jam_mulai+":00-"+jadwal.jam_akhir+":00"}</span>
                    </a>
                </li>
            `;
            });
            $('#ul__days_selector').html(html);
        }
    });
});

$.each(konselors, function(index, konselor){
    $('#daftarkonselor__'+konselor.id).click(function(){
       console.log(konselor.id);
       renderJadwalSelector(konselor.id);
       $('#button__daftar_sesi_referral').attr('disabled', true);
       $('#button__daftar_sesi').attr('disabled', true);
       $('#input__konselor_id').val(konselor.id);
    });
});

$('#form_daftar_sesi').submit(function(e){
    e.preventDefault();
    console.log($(this).serialize());
    axios.post('/services/konseling', $(this).serialize()).then(res => {
        console.log(res.data);
        window.location.href="/dashboard";
    });
});

function renderJadwalSelector(konselor_id){
    resetState();
    axios.get('/services/jadwalkonselor?konselor_id='+konselor_id).then(res => {
        jadwalKonselor = res.data.data;
        console.log(Object.keys(res.data.data));
        Object.keys(res.data.data).map((hari, index) => {
            $('#day_item__'+hari).attr('data-toggle', 'pill');
            $($('#day_item__'+hari).children()[0]).addClass('text-dark');
        });
    });
}

function resetState(){
    days.map((hari, index) => {
        $('#day_item__'+hari).attr('data-toggle', '');
        $($('#day_item__'+hari).children()[0]).removeClass('text-dark');
    });
}
