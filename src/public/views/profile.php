<link href="<?= get_assets_uri("css/profile.css") ?>" rel="stylesheet" type="text/css" id="profile-stylesheet">
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Profile</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->

<section class="profile-page">
    <div class="container">
        <div class="row">
            <!-- Sidenav -->
            <div class="sidenav col-12 col-sm-4">
                <div class="card">
                    <div class="pic bs-md">
                        <img src="<?php echo $_ENV["BASE_URL"] . "/uploads/" . ($params['user']->avatar != null ? $params['user']->avatar : "no-avt.png") ?>" alt="" width="100" height="100" loading="lazy">
                        <a id="change-avatar" class="lx-btn"><i class="fas fa-camera-retro"></i></a>
                    </div>

                    <div class="sidenav-url">
                        <div class="url">
                            <a href="#profile" class="active">Profile</a>
                            <hr align="center">
                        </div>
                        <div class="url">
                            <a href="#settings">Settings</a>
                            <hr align="center">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->

            <!-- Main -->
            <div class="main col-12 col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <button id="edit-profile" class="btn btn-secondary edit-profile" onclick="EditProfile(<?= $params['user']->id ?>)">
                            <i class="fas fa-broom"></i>&nbsp;&nbsp;Edit
                        </button>
                        <button id="save-profile" class="btn btn-success edit-profile" onclick="SaveProfile(<?= $params['user']->id ?>)">
                            <i class="fas fa-save"></i>&nbsp;&nbsp;Save
                        </button>
                        <table id="tb1">
                            <tbody>
                                <tr>
                                    <!-- <td style="width: 120px;">First Name: </td> -->
                                    <td>First Name: </td>
                                    <td><?= $params['user']->first_name ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name: </td>
                                    <td><?= $params['user']->last_name ?></td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td><?= $params['user']->login ?></td>
                                </tr>
                                <tr>
                                    <td>Phone number: </td>
                                    <td><?= $params['user']->phone_number ?></td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td><?= $params['user']->address ?></td>
                                </tr>
                                <tr>
                                    <td>Role: </td>
                                    <td><?= ($params['user']->role_id == 1) ? "Amin" : (($params['user']->role_id == 2) ? "Employeee" : "User") ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="tb2">
                            <tbody>
                                <tr>
                                    <!-- <td style="width: 120px;">First Name: </td> -->
                                    <td>First Name: </td>
                                    <td id="first_name">
                                        <input type="text" id="user-name" value="Lorem Ipsum" autocomplete="username" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Name: </td>
                                    <td id="last_name">
                                        <input type="text" id="user-name" value="Lorem Ipsum" autocomplete="username" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td id="login">
                                        <input type="email" id="email" value="lorem@ipsum.com" autocomplete="username">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone number: </td>
                                    <td id="phone_number">
                                        <input type="number" id="user-id" value="424242" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td id="address">
                                        <input type="text" id="user-name" value="Lorem Ipsum" autocomplete="username" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Role: </td>
                                    <td><?= ($params['user']->role_id == 1) ? "Amin" : (($params['user']->role_id == 2) ? "Employeee" : "User") ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End -->
        </div>
    </div>
</section>

<script src="<?= get_assets_uri("js/profile.js") ?>"></script>