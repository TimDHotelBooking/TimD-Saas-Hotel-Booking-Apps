<?php
if ($type->status == 1) {
    echo '<span class="badge badge-success">Active</span>';
} elseif ($type->status == 0) {
    echo '<span class="badge badge-danger">Inactive</span>';
}
?>
