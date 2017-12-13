<ul>
    @foreach ($childGroups as $group)
        <li class="folder">
            {{ $group->name }}
            @if (count($group->getChildGroups) || count($group->getChildUsers)) 
                @include('components.user.treeloop', ['childGroups' => $group->getChildGroups, 'childUsers' => $group->getChildUsers]) 
            @endif
        </li>
    @endforeach

    @foreach ($childUsers as $user)
        <li>
            <a href="/users/show/user/{{ $user->id }}" target="contentFrame">
                {{ $user->name }}
            </a>
        </li>
    @endforeach
</ul>