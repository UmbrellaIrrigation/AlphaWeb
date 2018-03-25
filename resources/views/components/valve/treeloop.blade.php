<ul>
    @foreach ($childGroups as $group)
        <li class="folder">
            <a href="/valves/group/show/{{ $group->id }}" target="contentFrame">
                {{ $group->name }}
            </a>
            @if (count($group->getChildGroups) || count($group->getChildValves)) 
                @include('components.valve.treeloop', ['childGroups' => $group->getChildGroups, 'childValves' => $group->getChildValves]) 
            @endif
        </li>
    @endforeach

    @foreach ($childValves as $valve)
        <li>
            <a href="/valves/valve/show/{{ $valve->id }}" target="contentFrame">
                {{ $valve->name }}
            </a>
        </li>
    @endforeach
</ul>