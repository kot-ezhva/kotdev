<div class="col-xs-4 col-xs-offset-4">
    <form class="form-signin form-vertical" method="post">
        <h2>Войдите</h2>
        <div class="form-group label-floating">
            <label class="control-label">Логин</label>
            <input type="text" class="form-control" autofocus="" required="" name="username">
        </div>

        <div class="form-group label-floating">
            <label class="control-label">Пароль</label>
            <input type="password" class="form-control" required="" name="password">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
</div>
<style>
    body {
        padding-top: 100px;
        padding-bottom: 40px;
        background-color: #E0E0E0;
        background: linear-gradient(to top right, #BDBDBD, #E0E0E0);
        background-attachment: fixed;
    }

    .form-signin{
        background: #ffffff;
        padding: 5px 15px;
        box-shadow: 0 0 10px 2px rgba(0,0,0,0.25);
    }
</style>