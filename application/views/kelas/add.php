<div id="dlgAddDataKelas" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="material-icons">add</i> <span>Tambah Data Kelas</span></h4>
			</div>
			<div class="modal-body no-padding">
				<form role="form" class="pform" name="frmAddDataKelas" id="frmAddDataKelas" action="<?=site_url('app_kelas/add/'.$tahun_ajaran)?>" method="post">
					<div class="row clearfix">
						<div class="col-sm-6 col-xs-12">
							<div class="pf-element pf-full-width form-group form-float">
								<label class="form-label">Nama Kelas</label>
								<div class="form-line pf-group">
									<input type="text" class="pf-field form-control" name="txtNama" id="txtNama" placeholder="Nama Kelas" style="width:100%;">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="pf-element pf-full-width form-group form-float">
								<label class="form-label">Kode Kelas</label>
								<div class="form-line pf-group">
									<input type="text" class="pf-field form-control" name="txtKode" id="txtKode" placeholder="Kode Kelas" style="width:100%;">
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="pf-element pf-full-width form-group form-float">
								<label class="form-label">Jurusan</label>
								<div class="pf-group" style="width:100%;">
									<input type="radio" class="with-gap radio-col-teal" name="rdJurusan" id="rdJurusan01" value="REGULER" checked>
									<label for="rdJurusan01">REGULER</label>
									<input type="radio" class="with-gap radio-col-red" name="rdJurusan" id="rdJurusan02" value="IPA">
									<label for="rdJurusan02">IPA</label>
									<input type="radio" class="with-gap radio-col-blue" name="rdJurusan" id="rdJurusan03" value="IPS">
									<label for="rdJurusan03">IPS</label>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="pf-element pf-full-width form-group form-float">
								<label class="pf-label">Tingkat</label>
								<div class="form-line pf-group">
									<input type="text" class="pf-field form-control" name="txtTingkat" id="txtTingkat" placeholder="Tingkat" style="width:100%;">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="pf-element pf-full-width form-group form-float">
								<label class="form-label">Kapasitas</label>
								<div class="form-line pf-group">
									<input type="text" class="pf-field form-control" name="txtKapasitas" id="txtKapasitas" placeholder="Kapasitas" style="width:100%;">
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="pf-element pf-full-width form-group form-float">
								<label class="form-label">Keterangan</label>
								<div class="form-line pf-group">
									<textarea class="pf-field form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan" style="width:100%;"></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="material-icons">clear</i> <span>Cancel</span></button>
				<button type="button" class="btn btn-success waves-effect" onclick="javascript:$('#frmAddDataKelas').submit();"><i class="material-icons">done</i> <span>Submit</span></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var is_clicked = 0;
$(function(){
	$('#dlgAddDataKelas').modal('show').on('hidden.bs.modal',function(){
		if(is_clicked>0){
			$.app_kelas.list_all(<?=$tahun_ajaran?>,<?=$jenis?>);
		}
		$('#'+$.app_kelas.isian).empty();
	});
	$.app_kelas.validasi('frmAddDataKelas','dlgAddDataKelas');
});
</script>