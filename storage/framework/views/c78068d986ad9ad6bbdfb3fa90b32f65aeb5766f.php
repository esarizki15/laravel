<?php $__env->startSection('main'); ?>
	<div id="siswa">
		<h2>Detail Siswa</h2>

		<table class="table table-striped">
			<tr>
				<th>NISN</th>
				<td><?php echo e($siswa->nisn); ?></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?php echo e($siswa->nama_siswa); ?></td>
			</tr>
			<tr>
				<th>Kelas</th>
				<td><?php echo e($siswa->kelas->nama_kelas); ?></td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td><?php echo e($siswa->jenis_kelamin); ?></td>
			</tr>
			<tr>
				<th>Tanggal Lahir</th>
				<td><?php echo e($siswa->tanggal_lahir->format('d-M-Y')); ?></td>
			</tr>
			<tr>
				<th>Telepon</th>
				<td><?php echo e(!empty($siswa->telepon->nomor_telepon) ? 
				$siswa->telepon->nomor_telepon : '-'); ?> </td>
			</tr>
			<tr>
				<th>Hobi</th>
				<td>
				<?php foreach($siswa->hobi as $item): ?>
				<strong><span><?php echo e($item->nama_hobi); ?></span></strong>,
				<?php endforeach; ?>
				</td>
			</tr>
			<tr>
				<th>Foto</th>
				<td>
					<?php if(isset($siswa->foto)): ?>
						<img src="<?php echo e(asset('fotoupload/' . $siswa->foto)); ?>">
					<?php else: ?>
						<?php if($siswa->jenis_kelamin == 'L'): ?>
							<img src=" <?php echo e(asset('fotoupload/pria.jpg')); ?> ">
						<?php else: ?>
							<img src=" <?php echo e(asset('fotoupload/perempuan.jpg')); ?> ">
						<?php endif; ?>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>