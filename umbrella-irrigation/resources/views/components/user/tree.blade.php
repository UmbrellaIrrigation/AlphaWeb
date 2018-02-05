<aside class="col-lg-3 offset-lg-2 col-xl-2 offset-xl-1 tree-nav">
    <h4 class="pl-3">Navigation Menu</h4>
    <hr>
    <div id="tree">
        <ul id="treeData" style="display: none;">
            @foreach ($rootGroups as $group)
                <li class="folder">
                    <a href="/users/show/group/{{ $group->id }}" target="contentFrame">
                        {{ $group->name }}
                    </a>
                    @if (count($group->getChildGroups) || count($group->getChildUsers)) 
                        @include('components.user.treeloop', ['childGroups' => $group->getChildGroups, 'childUsers' => $group->getChildUsers]) 
                    @endif
                </li>
            @endforeach

            @foreach ($rootUsers as $user)
                <li>
                    <a href="/users/show/user/{{ $user->id }}" target="contentFrame">
                        {{ $user->name }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</aside>
