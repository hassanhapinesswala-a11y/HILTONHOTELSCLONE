<?php include 'db.php';
$hotel_id = intval($_GET['id'] ?? 0);
$room_pref = intval($_GET['room'] ?? 0);
$hotel = null;
if($hotel_id){
$hres = $mysqli->query("SELECT * FROM hotels WHERE id=$hotel_id");
$hotel = $hres->fetch_assoc();
}
$rooms = [];
if($hotel){
$rres = $mysqli->query("SELECT * FROM rooms WHERE hotel_id={$hotel['id']}");
while($row=$rres->fetch_assoc()) $rooms[]=$row;
}
?>
 
 
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= htmlspecialchars($hotel['name'] ?? 'Hotel') ?></title>
<style>
body{font-family:Inter,Arial;background:#f7f9fc;margin:0;color:#111}
.container{max-width:1000px;margin:18px auto;padding:12px}
.hero{display:flex;gap:18px}
.hero img{width:380px;height:260px;object-fit:cover;border-radius:12px}
.info{flex:1}
.rooms{margin-top:18px;display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px}
.room-card{background:#fff;padding:12px;border-radius:10px}
.btn{background:#0b69ff;color:#fff;padding:10px 12px;border-radius:8px;text-decoration:none}
.form-row{margin:8px 0}
</style>
</head>
<body>
<div class="container">
<a href="index.php">&larr; Home</a>
<?php if(!$hotel): ?>
<h2>Hotel not found</h2>
<?php else: ?>
<div class="hero">
<img src="<?= htmlspecialchars($hotel['image']) ?>" alt="hotel">
<div class="info">
<h1><?= htmlspecialchars($hotel['name']) ?></h1>
<div class="small"><?= htmlspecialchars($hotel['city']) ?> • <?= htmlspecialchars($hotel['rating']) ?> ★</div>
<p style="margin-top:8px"><?= htmlspecialchars($hote
