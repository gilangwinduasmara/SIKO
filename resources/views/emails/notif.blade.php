<div>
    @switch($notification->type)
        @case('new_konseling')
            {{$data->konseli->nama_konseli." memulai sesi konseling dengan anda"}}
            @break
        @case('end_konseling')
            {{"Sesi konseling dengan ".$data->konseli->nama_konseli." telah berakhir"}}
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
