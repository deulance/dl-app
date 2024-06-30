<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ env('APP_NAME') }} Admin Register</title>
    @include('admin.layouts.header')
</head>
<body class="admin-register-page">
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4> Registrar nova conta</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.layouts.flash-messages')
                                <form method="POST" action="{{ route('admin_register') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Preencha sem nome
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Preencha seu email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input id="cpf" type="text" class="form-control" name="cpf" tabindex="3" required>
                                        <div class="invalid-feedback">
                                            Preencha seu CPF
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="3" required>
                                        <div class="invalid-feedback">
                                            Preencha sua senha
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmar Senha</label>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="4" required>
                                        <div class="invalid-feedback">
                                            Confirme sua senha
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="5">
                                            Registrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Ja tem uma conta? <a href="{{ route('admin_login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.layouts.script')
</body>
</html>
