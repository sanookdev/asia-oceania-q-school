<?
$imagesDir = '../uploads/profiles/21/';
$images = glob($imagesDir . '*.{jpg,jpeg,png,gif,pdf}', GLOB_BRACE);

echo "<pre>";
print_r($images);
echo "</pre>";

echo __DIR__;
// echo json_encode($images);
?>