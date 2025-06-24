<?php
function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
}

function is_kasir() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'kasir';
}
