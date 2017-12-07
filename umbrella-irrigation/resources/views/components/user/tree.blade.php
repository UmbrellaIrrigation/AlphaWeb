<aside class="col-md-2 offset-md-1 tree-nav">
    <h4 class="pl-3">Navigation Menu</h4>
    <hr>
    <div id="tree">
        <ul id="treeData" style="display: none;">
            @foreach ($rootGroups as $group)
                <li class="folder">
                    {{ $group->name }}
                    @if (count($group->getChildGroups) || count($group->getChildUsers)) 
                        @include('components.users.treeloop', ['childGroups' => $group->getChildGroups, 'childUsers' => $group->getChildUsers]) 
                    @endif
                </li>
            @endforeach

            @foreach ($rootUsers as $user)
                <li>
                    {{ $user->name }}
                </li>
            @endforeach



            <li id="22" class="folder">Employees
                <ul>
                    <li id="6">Jeff Wiegley</li>
                    <li id="7">Ramses Ordonez</li>
                </ul>
            </li>
            <li id="231" class="folder">Admins
                    <ul>
                        <li id="2">
                            <a href="/users/show" target="contentFrame">
                                Lemuel Dizon
                            </a>
                        </li>
                        <li id="1">
                            <a href="//en.wikipedia.org/wiki/Snake" target="contentFrame">
                                Raffi "Snake" Bilemjian
                            </a>
                        </li>
                    </ul>
                </li>
            <li id="3" class="folder">Guest
                <ul>
                    <li id="10" class="folder">Oviatt Library
                        <ul>
                            <li id="131">Sina "Belajio" Eradat</li>
                        </ul>
                    </li>
                    <li id="411">John Doe</li>
                    <li id="9">Jane Dow</li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
