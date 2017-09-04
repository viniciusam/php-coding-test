<?php

echo '<ul>';
for ($i = 1; $i <= 100; $i++) {
    if ((($i % 3) === 0) && (($i % 5) === 0)) {
        echo '<li>foobar</li>';
    } else if (($i % 3) === 0) {
        echo '<li>foo</li>';
    } else if (($i % 5) === 0) {
        echo '<li>bar</li>';
    } else {
        echo '<li>$i</li>';
    }
}
echo '</ul>';

?>
