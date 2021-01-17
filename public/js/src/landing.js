let state = {
    selectedRole: 'konseli'
};
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        items: 4,
    });
});


function changeSelectedRole(){
    var roleEl = $('.role-select .role');
    var activeRoleEl = $('.role-select .active-role');
    $('.role-select .active-role').attr('class', 'role');

    if(state.selectedRole === 'konseli'){
        state.selectedRole = 'konselor';
        $('#toggle__selected').addClass('is-konselor-selected');
    }else{
        state.selectedRole = 'konseli';
        $('#toggle__selected').removeClass('is-konselor-selected');
    }
    $('input[name="role"]').attr('value', state.selectedRole);
    $('#toggle__selected').text(state.selectedRole);

    activeRoleEl.attr('class', 'role');
    roleEl.attr('class', 'active-role');
}

$('#button__login').click(function(){
    $('#modal__login').modal('show');
});

$('.role-select > a').click(function(){
    changeSelectedRole();
});

$('#form__login').submit(function(e){
    e.preventDefault();
    toastr.options = conf.toastr.options.saving;
    toastr.info("Sedang memproses data")
    // console.log($(this).serialize());
    const url = state.selectedRole === 'konselor' ? '/services/auth/login' : '/services/auth/siasat';
    axios.post(url, $(this).serialize()).then((response) => {
        if(response.data.success){
            if(response.data.action !== 'register'){
                window.location.href = "/dashboard";
            }else{
                const data = response.data.data;
                $('#modal__register').modal('show');
                $('#modal__login').modal('hide');
                $('#input__nama').val(data.nama);
                $('#input__name').val(data.nama);
                $('#input__nim').val(data.nim);
                $('#input__nohp').val(data.nohp);
                $('#input__prodi').val(data.progdi);
                $('#input__fakultas').val(data.fakultas);
                $('#input__email').val(data.email);
            }
        }else{
            toastr.options = conf.toastr.options.saving;
            toastr.error("Login gagal!", response.data.message)
        }
    });
});


$('#form__register').submit(function (e){
    e.preventDefault();
    axios.post('/services/auth/register', $(this).serialize()).then(res => {
        if(res.data.success){
            $('#modal__login').modal('show');
            $('#modal__register').modal('hide');
            // window.location.href="/dashboard";
        }else{

        }
    });
});
