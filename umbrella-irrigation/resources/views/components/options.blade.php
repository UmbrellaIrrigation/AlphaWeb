<nav class="bg-light option-nav">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item nav-link h5 pb-0">Create</li>
        @if (Request::is('users*'))
            <li class="nav-item">
                <a class="nav-link" href="#createUserModal" data-toggle="modal" data-target="#createUserModal">New User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#createUserGroupModal" data-toggle="modal" data-target="#createUserGroupModal">New User Group</a>
            </li>
        @elseif (Request::is('valves*'))
            <li class="nav-item">
                <a class="nav-link" href="#createValveModal" data-toggle="modal" data-target="#createValveModal">New Valve</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#createValveGroupModal" data-toggle="modal" data-target="#createValveGroupModal">New Valve Group</a>
            </li>
        @endif
    </ul>

    <hr>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item nav-link h5 pb-0">Filters</li>
        @if (Request::is('users*'))
            <li class="nav-item">
                <a class="nav-link" href="#">Admins
                    <span class="badge badge-primary">{{ count($admins) }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Employees
                    <span class="badge badge-primary">{{ count($employees) }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Guests
                    <span class="badge badge-primary">{{ count($guests) }}</span>
                </a>
            </li>
        @elseif (Request::is('valves*'))
            <li class="nav-item">
                <a class="nav-link" href="#">Suppressed
                    <span class="badge badge-primary">2</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Postponed
                    <span class="badge badge-primary">4</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Shutdown
                    <span class="badge badge-primary">6</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Alert
                    <span class="badge badge-primary">1</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Overridden
                    <span class="badge badge-primary">3</span>
                </a>
            </li>
        @endif
    </ul>

    <hr>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item nav-link h5 pb-0">Options</li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="treeSort">Sort</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="treeExpand">Expand All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="treeCollapse">Collapse All</a>
        </li>
    </ul>

</nav>