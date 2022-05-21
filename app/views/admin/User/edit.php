<div class="card">

    <div class="card-body">


        <form action="" method="post" class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= h($user['email']) ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="required">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="required">Имя</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= h($user['name']) ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="address" class="required">Адрес</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?= h($user['address']) ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="role" class="required">Роль</label>
                    <select name="role" id="role" class="form-control">
                        <option value="user" <?php if($user['role'] == 'user') echo 'selected'?>>Пользователь</option>
                        <option value="user" <?php if($user['role'] == 'admin') echo 'selected'?>>Администратор</option>
                    </select>
                </div>
            </div>

            <br>

            <div class="col">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>

        </form>

    </div>

</div>