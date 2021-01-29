<div>
    @switch($notification->type)
        @case('new_konseling')
            {{$data->konseli->nama_konseli." memulai sesi konseling dengan anda"}}
            @break
        @case('end_konseling')
            @if($user->role == 'konseli')
            {{"Sesi konseling dengan ".$data->konselor->nama_konselor." telah berakhir"}}
            @else
            {{"Sesi konseling dengan ".$data->konseli->nama_konseli." telah berakhir"}}
            @endif
            @break
        @case('ask_referral')
            {{$data->konselor->nama_konselor." meminta persetujuan referal"}}
            @break
        @case('agreed_referral')
            {{$data->konseli->nama_konseli." menyetujui persetujuan referal"}}
            @break
        @case('new_referral')
            @if($user->role == 'konseli')
            {{"Sesi konseling anda telah berpindah ke konselor baru"}}
            @else
            {{"Anda menerima referral konseling"}}
            @endif
            @break
        @case('declined_referral')
            {{$data->konseli->nama_konseli." menolak persetujuan referal"}}
            @break
        @case('ask_conference')
            {{$data->konselor->nama_konselor." meminta persetujuan referal"}}
            @break
        @case('agreed_conference')
            {{$data->konseli->nama_konseli." menyetujui persetujuan referal"}}
            @break
        @case('declined_conference')
            {{$data->konseli->nama_konseli." menolak persetujuan referal"}}
            @break

        @default
    @endswitch
</div>
