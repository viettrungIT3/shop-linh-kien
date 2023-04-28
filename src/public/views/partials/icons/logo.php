<?php
if ((isset($params["user_info"])) && $params["user_info"]["data"][0]->role_id != 3) { ?>
    <h1><a href="/admin/" class="logo">LOGO</a></h1>

<?php } else ?>
<h1><a href="/" class="logo">LOGO</a></h1>