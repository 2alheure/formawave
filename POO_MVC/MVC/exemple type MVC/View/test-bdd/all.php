<?php view('layout/header'); ?>

<table id="table">
	<thead>
		<tr>
			<th>Image</th>
			<th>Nom</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($trucsAAfficher as $truc) { ?>
			<tr>
				<td><img src="<?= $truc['image'] ?>" alt="" style="width: 200px"></td>
				<td><a href="<?= url('/test-bdd/' . $truc['id']) ?>"><?= $truc['nom'] ?></a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#table').DataTable();
	});
</script>
<?php view('layout/footer');
