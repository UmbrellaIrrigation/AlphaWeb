<ul>
    @foreach ($childGroups as $group)
        <li class="folder">
            {{ $group->name }}
            @if (count($group->getChildGroups) || count($group->getChildUsers)) 
                @include('components.users.treeloop', ['childGroups' => $group->getChildGroups, 'childUsers' => $group->getChildUsers]) 
            @endif
        </li>
    @endforeach

    @foreach ($childUsers as $user)
        <li>
            {{ $user->name }}
        </li>
    @endforeach
</ul>