<a href="/profile" class="list-group-item">
    <i class="fa fa-cog"></i> Minha conta
</a>

<a onclick="event.preventDefault();
            document.getElementById('sidebar-logout-form').submit();" href="#" class="list-group-item">
    <i class="fa fa-sign-out"></i> Sair
</a>

<form id="sidebar-logout-form" class="d-none" method="POST" action="/logout">
    {{ csrf_field() }}
</form>