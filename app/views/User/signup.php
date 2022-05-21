<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2><?php __('tpl_signup'); ?></h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="<?= base_url() ?>">Home</a>
                </li>
                <li class="is-marked">
                    <a href="#"><?php __('tpl_signup'); ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Account-Page -->
<div class="page-account u-s-p-t-80">
    <div class="container">
        <div class="row">

            <!-- Register -->
            <div class="col-lg-6">
                <div class="reg-wrapper">
                    <h2 class="account-h2 u-s-m-b-20"><?php __('tpl_signup'); ?></h2>

                    <form method="post">
                        <div class="u-s-m-b-30">
                            <label for="user-name"><?php __('tpl_signup_name_input'); ?>
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="name" name="name" class="text-field" placeholder="<?php __('tpl_signup_name_input'); ?>" value="<?= get_field_value('name') ?>" >
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="email"><?php __('tpl_signup_email_input'); ?>
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="email" name="email" class="text-field" placeholder="<?php __('tpl_signup_email_input'); ?>" value="<?= get_field_value('email') ?>">
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="user-name"><?php __('tpl_signup_address_input'); ?>
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="address" name="address" class="text-field" placeholder="<?php __('tpl_signup_address_input'); ?>" value="<?= get_field_value('address') ?>">
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="password"><?php __('tpl_signup_password_input'); ?>
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="password" name="password" class="text-field" placeholder="<?php __('tpl_signup_password_input'); ?>" >
                        </div>

                        <div class="u-s-m-b-30">

                        </div>
                        <div class="u-s-m-b-45">
                            <button class="button button-primary w-100"><?php __('user_signup_signup_btn'); ?></button>
                        </div>
                    </form>
                    <?php
                        if (isset($_SESSION['form_data'])) {
                            unset($_SESSION['form_data']);
                        }
                    ?>


                </div>
            </div>
            <!-- Register /- -->
        </div>
    </div>
</div>