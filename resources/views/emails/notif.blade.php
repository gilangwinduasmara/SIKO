<div>
    @switch($notification->type)
        @case('new_konseling')
            {{$data->konseli->nama_konseli." memulai sesi konseli dengan anda"}}
            @break
        @case('end_konseling')
            {{"Sesi konseli dengan ".$data->konseli->nama_konseli." telah berakhir"}}
            @break
        @case('ask_referral')
            {{$data->konselor->nama_konselor." meminta persetujuan referal"}}
            @break
        @case('agreed_referral')
            {{$data->konselor->nama_konselor." menyetujui persetujuan referal"}}
            @break
        @case('declined_referral')
            {{$data->konselor->nama_konselor." menolak persetujuan referal"}}
            @break
        @case('ask_conference')
            {{$data->konselor->nama_konselor." meminta persetujuan referal"}}
            @break
        @case('agreed_conference')
            {{$data->konselor->nama_konselor." menyetujui persetujuan referal"}}
            @break
        @case('declined_conference')
            {{$data->konselor->nama_konselor." menolak persetujuan referal"}}
            @break
        @default
    @endswitch
</div>
{{-- switch($notification->type){
    case 'new_konseling':
        break;
    case 'end_konseling':
        break;
    case 'ask_referral':
        break;
    case 'agreed_referral':
        break;
    case 'declined_referral':
        break;
    case 'ask_conference':
        break;
    case 'agreed_conference':
        break;
    case 'declined_conference':
        break;
} --}}
