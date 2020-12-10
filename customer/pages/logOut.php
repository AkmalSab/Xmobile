<?php

include '../phpFunction.php';
startSession();
endSession();
echo "<script>
      window.location.href = '../index.php';
</script>";
?>