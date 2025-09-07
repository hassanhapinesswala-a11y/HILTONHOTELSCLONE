?php include 'db.php'; ?>
@media(max-width:700px){.search-card{flex-direction:column;align-items:stretch}}
</style>
</head>
<body>
<header>
<div class="container">
<div class="logo">HiltonHotelsClone</div>
</div>
</header>
 
 
<main class="container">
<section class="search-card">
<form id="searchForm" action="listings.php" method="get" style="display:flex;gap:12px;flex:1;">
<input name="city" placeholder="Destination (e.g., Karachi)" required>
<input name="check_in" type="date" required>
<input name="check_out" type="date" required>
<select name="sort">
<option value="best">Best Match</option>
<option value="price_asc">Price: Low to High</option>
<option value="price_desc">Price: High to Low</option>
<option value="rating_desc">Rating</option>
</select>
<button class="btn" type="submit">Search</button>
</form>
</section>
 
 
<section class="filters small" style="margin-top:18px">
<div>Filters: <strong>Price</strong>, <strong>Rating</strong>, <strong>Amenities</strong></div>
</section>
 
 
<h2 style="margin-top:22px">Featured Hotels</h2>
<div class="featured">
<?php
$res = $mysqli->query("SELECT * FROM hotels ORDER BY rating DESC LIMIT 6");
while($h = $res->fetch_assoc()):
?>
<div class="card">
<img src="<?= htmlspecialchars($h['image']) ?>" alt="<?= htmlspecialchars($h['name']) ?>">
<h3><?= htmlspecialchars($h['name']) ?></h3>
<div class="small"><?= htmlspecialchars($h['city']) ?> • <?= htmlspecialchars($h['rating']) ?> ★</div>
<p class="small" style="margin-top:8px;"><?= htmlspecialchars(substr($h['description'],0,120)) ?>...</p>
<div style="margin-top:8px;display:flex;gap:8px;align-items:center">
<a class="btn" href="hotel.php?id=<?= $h['id'] ?>">View</a>
</div>
</div>
<?php endwhile; ?>
</div>
 
 
<footer>
&copy; <?= date('Y') ?> HiltonHotelsClone — demo project
</footer>
</main>
 
 
<script>
const form = document.getElementById('searchForm');
form.addEventListener('submit',(e)=>{
const ci = new Date(form.check_in.value);
const co = new Date(form.check_out.value);
if (co <= ci) {
e.preventDefault();
alert('Check-out must be after check-in');
}
});
</script>
</body>
</html>
