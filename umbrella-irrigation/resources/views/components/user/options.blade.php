<nav class="bg-light option-nav">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item nav-link h5 pb-0">Create</li>
        <li class="nav-item">
            <a class="nav-link" href="#createUserModal" data-toggle="modal" data-target="#createUserModal">New User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#createUserGroupModal" data-toggle="modal" data-target="#createUserGroupModal">New User Group</a>
        </li>
    </ul>

    <hr>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item nav-link h5 pb-0">Filters</li>
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
    </ul>

    <hr>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item nav-link h5 pb-0">Tree Options</li>
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