<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
var <?=$this->router->fetch_class()?> = App.subclass({
	constructor : function(site_url,jsonParam) {
		this.site_url = site_url;
		this.jsonParam = jsonParam;
	},
	get_json_provinsi:function(f_callback){
		$.getJSON($.app.site_url+'/app_json/list_provinsi',function(retval){
			if(typeof f_callback == 'function'){
				f_callback(retval);
			}
		});
	},
	get_json_kabupaten:function(provinsi_id,f_callback){
		var that = this;
		$.getJSON($.app.site_url+'/app_json/list_kabupaten_by_provinsi/'+provinsi_id,function(retval){
			if(typeof f_callback == 'function'){
				f_callback(retval);
			}
		});
	},
	/* begin data alamat */
	load_data_alamat:function(pegawai_id){
		$.app.tunggu('container_alamat',1);
		$('#container_alamat').load(this.site_url+'/list_alamat/'+pegawai_id,function(){
			$.app.tunggu('container_alamat',0);
		});
	},
	form_add_alamat:function(pegawai_id){
		var that = this;
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+this.jsonParam.isian).load(this.site_url+'/form_add_alamat/'+pegawai_id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	form_edit_alamat:function(id){
		var that = this;
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+that.jsonParam.isian).load(this.site_url+'/form_edit_alamat/'+id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	delete_alamat:function(id,pegawai_id){
		var that = this;
		$.app.my_confirm('Anda yakin hendak menghapus data Alamat ini?',function(){
			$.ajax({
				url:that.site_url+'/delete_alamat/'+id,
				success:function(){
					$.app.myalert("Data Alamat Berhasil Dihapus",'warning');
					that.load_data_alamat(pegawai_id);
				}
			})
		});
	},
	validasi_alamat:function(frmId,dlgModal){
		var that = this;
		seajs.use(['jquery-validation','jquery-validation-additional'],function(){
			$('#'+frmId).validate({
				rules:{
					txtAlamat:{
						required:true
					},
					cbProvinsi:{
						required:true
					},
					cbKabupaten:{
						required:true
					},
				},
				messages:{
					txtAlamat:{
						required:'Alamat Masih Kosong'
					},
					cbProvinsi:{
						required:'Provinsi Masih Kosong'
					},
					cbKabupaten:{
						required:'Kabupaten Masih Kosong'
					},
				},
				submitHandler:function(){
					$.app.submit_form(frmId,dlgModal);
				}
			});
		});
	},
	/* end data alamat */
	/* begin pasangan */
	load_data_pasangan:function(pegawai_id){
		$.app.tunggu('container_pasangan',1);
		$('#container_pasangan').load(this.site_url+'/list_pasangan/'+pegawai_id,function(){
			$.app.tunggu('container_pasangan',0);
		});
	},
	form_add_pasangan:function(pegawai_id){
		var that = this;
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+this.jsonParam.isian).load(this.site_url+'/form_add_pasangan/'+pegawai_id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	form_edit_pasangan:function(id){
		var that = this;
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+that.jsonParam.isian).load(this.site_url+'/form_edit_pasangan/'+id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	form_upload_pasangan:function(id,pegawai_id){
		var that = this;
		$('#'+this.jsonParam.isian).empty();
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+that.jsonParam.isian).load(this.site_url+'/form_upload/'+id,{'pegawai_id':pegawai_id},function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	delete_pasangan:function(id,pegawai_id){
		var that = this;
		$.app.my_confirm('Anda yakin hendak menghapus data pasangan?',function(){
			$.ajax({
				url:that.site_url+'/delete_pasangan/'+id,
				success:function(){
					$.app.myalert("Data Pasangan Berhasil Dihapus",'warning');
					that.load_data_pasangan(pegawai_id);
				}
			})
		});
	},
	validasi_pasangan:function(frmId,dlgModal){
		var that = this;
		seajs.use(['jquery-validation','jquery-validation-additional'],function(){
			$('#'+frmId).validate({
				rules:{
					txtNama:{
						required:true
					},
					txtTmptLahir:{
						required:true
					},
					txtTglLahir:{
						required:true
					},
					txtPekerjaan:{
						required:true
					},
					txtNoBpjs:{
						required:true
					},
					txtNoSuratNikah:{
						required:true
					},
					txtTglNikah:{
						required:true
					},
				},
				messages:{
					txtNama:{
						required:'Nama Masih Kosong'
					},
					txtTmptLahir:{
						required:'Tempat Lahir Masih Kosong'
					},
					txtTglLahir:{
						required:'Tgl. Lahir Masih Kosong'
					},
					txtPekerjaan:{
						required:'Pekerjaan Masih Kosong'
					},
					txtNoBpjs:{
						required:'No. BPJS Masih Kosong'
					},
					txtNoSuratNikah:{
						required:'No. Surat Nikah Masih Kosong'
					},
					txtTglNikah:{
						required:'Tgl. Nikah Masih Kosong'
					},
				},
				submitHandler:function(){
					$.app.submit_form(frmId,dlgModal);
				}
			});
		});
	},
	/* end pasangan */
	load_data_anak:function(pegawai_id){
		$('#container_anak').empty();
		$.app.tunggu('container_anak',1);
		$('#container_anak').load(this.site_url+'/list_anak/'+pegawai_id,function(){
			$.app.tunggu('container_anak',0);
		});
	},
	form_add_anak:function(pegawai_id){
		var that = this;
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+this.jsonParam.isian).load(this.site_url+'/form_add_anak/'+pegawai_id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	form_edit_anak:function(id){
		var that = this;
		$.app.tunggu(this.jsonParam.isian,1);
		$('#'+that.jsonParam.isian).load(this.site_url+'/form_edit_anak/'+id,function(){
			$.app.tunggu(that.jsonParam.isian,0);
		});
	},
	delete_anak:function(id,pegawai_id){
		var that = this;
		$.app.my_confirm('Anda yakin hendak menghapus data anak?',function(){
			$.ajax({
				url:that.site_url+'/delete_anak/'+id,
				success:function(){
					$.app.myalert("Data Anak Berhasil Dihapus",'warning');
					that.load_data_anak(pegawai_id);
				}
			})
		});
	},
	validasi_anak:function(frmId,dlgModal){
		var that = this;
		seajs.use(['jquery-validation','jquery-validation-additional'],function(){
			$('#'+frmId).validate({
				rules:{
					txtNama:{
						required:true
					},
					txtTmptLahir:{
						required:true
					},
					txtTglLahir:{
						required:true
					},
					txtNoBpjs:{
						required:true
					},
				},
				messages:{
					txtNama:{
						required:'Nama Masih Kosong'
					},
					txtTmptLahir:{
						required:'Tempat Lahir Masih Kosong'
					},
					txtTglLahir:{
						required:'Tgl. Lahir Masih Kosong'
					},
					txtNoBpjs:{
						required:'No. BPJS Masih Kosong'
					},
				},
				submitHandler:function(){
					$.app.submit_form(frmId,dlgModal);
				}
			});
		});
	},
});