<aside class="tree-nav">
    <h4 class="pl-3">Navigation Menu</h4>
    <hr>
    <div id="tree">
        <ul id="treeData" style="display: none;">
            @foreach ($rootGroups as $group)
                <li class="folder">
                    <a href="/valves/group/show/{{ $group->id }}" target="contentFrame">
                        {{ $group->name }}
                    </a>
                    @if (count($group->getChildGroups) || count($group->getChildValves)) 
                        @include('components.valve.treeloop', ['childGroups' => $group->getChildGroups, 'childValves' => $group->getChildValves]) 
                    @endif
                </li>
            @endforeach

            @foreach ($rootValves as $valve)
                <li>
                    <a href="/valves/valve/show/{{ $valve->id }}" target="contentFrame">
                        {{ $valve->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
