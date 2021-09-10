<?php require_once 'header.php'; ?>

<section class="add-user">
    <div>
    <form action="" method="POST">
            <label for="username">Username</label>
            <input name="username" type="text" id="username" class="input-post" required>

            <label for="email">Email</label>
            <input name="mail" type="email" id="email" class="input-post" required placeholder="seuemail@dominio">

            <label for="pass">Senha</label>
            <input name="pass" type="password" id="pass" class="input-post" required placeholder="*****">

            </br>
            <input type="submit" value="criar_conta" class="enviar" name="criar_conta">
        </form>

        <?php
            if(isset($_POST['criar_conta'])){
                $username = $_POST['username'];
                $mail = $_POST['mail'];
                $pass = $_POST['pass'];
                $user = wp_insert_user([
                    'user_login'		=> $username,
                    'user_pass'	 		=> $pass,
                    'user_email'		=> $mail,
                    'first_name'		=> '',
                    'last_name'			=> '',
                    'user_registered'	=> date('Y-m-d H:i:s'),
                    'role'				=> 'editor'
                    
                ]);
            }
            
        ?>
    </div>
</section>

<?php require_once 'footer.php'; ?>
