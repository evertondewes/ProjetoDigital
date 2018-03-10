<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-white text-center">
            Opções
        </div>

        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                <a href="/profile" class="list-group-item">Visão geral</a>
                <a href="/profile/email" class="list-group-item">E-mail</a>
                <a href="/profile/username" class="list-group-item">Nome de usuário</a>
                <a href="/profile/password" class="list-group-item">Alterar senha</a>
                <a href="/profile/address" class="list-group-item">Endereço</a>
                <a href="/profile/phone-numbers" class="list-group-item">Telefones</a>
                <a href="#" class="list-group-item text-danger" data-form-id="#deactivate-form" data-toggle="modal" data-target="#are-you-sure-modal">
                    Desativar conta
                </a>

                <form class="d-none" id="deactivate-form" method="POST" action="/profile">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </div>
    </div>
</div>
