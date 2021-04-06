<?php

echo '<br><p> <a href="/logout">Logout</a></p><br>';
echo($session->get('user_pseudo'));
echo '<br>--------<br>';
echo($session->get('user_id'));
echo '<br>--------<br>';
echo($session->get('user_mail'));
echo '<br>--------<br>';
