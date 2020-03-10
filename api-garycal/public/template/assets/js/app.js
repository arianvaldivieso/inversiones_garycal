$('.select').select2({
    minimumResultsForSearch: "-1"
});

$.extend( $.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{ 
        orderable: false,
        width: '100px',
        targets: [ 2 ]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filtrar:</span> _INPUT_',
        lengthMenu: '<span>Ver:</span> _MENU_',
        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
    },
    drawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
});


// Basic datatable
$('.datatable-basic').DataTable();


// Datatable with saving state
$('.datatable-save-state').DataTable({
    stateSave: true
});


// Scrollable datatable
$('.datatable-scroll-y').DataTable({
    autoWidth: true,
    scrollY: 300
});



// External table additions
// ------------------------------

// Add placeholder to the datatable filter option
$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


// Enable Select2 select for the length option
$('.dataTables_length select').select2({
    minimumResultsForSearch: "-1"
});


baseURL = 'http://127.0.0.1/smartech';

$('.form-ajax').on('submit', function(event) {
	event.preventDefault();

	$.ajax({
		url: `${baseURL}/${$(this).attr('action')}`,
		type: $(this).attr('method'),
		dataType: 'json',
		data: $(this).serializeArray(),
		beforeSend: () => {
			// $.blockUI({
			// 	message: ''
			// });
			$.each($('.validation'), function(index, val) {
				$(val).text('');
			});
		},
		success: res => {

			if (!res.status) {
				$.each(Object.keys(res.errors), function(index, val) {
					$(`.validation[data-id="${val}"]`).text(res.errors[val])
				});
			}else{

				let alert = swal({
					title: res.title,
  				text: res.text,
  				icon: res.icon,
				})

				if (res.redirect) {
					alert.then(() => {
					  location.href = `${baseURL}/${res.redirect}`;
					});
				}

				
			}

			$.unblockUI();
		}
	});

  return false;
});


Dropzone.prototype.defaultOptions.dictDefaultMessage = "Sube tus archivos aqui";
Dropzone.prototype.defaultOptions.dictFallbackMessage = "Tu navegador no es compatible con este plugin.";
Dropzone.prototype.defaultOptions.dictFallbackText = "Please use the fallback form below to upload your files like in the olden days.";
Dropzone.prototype.defaultOptions.dictFileTooBig = "Archivo muy grande ({{filesize}}MiB). : {{maxFilesize}}MiB.";
Dropzone.prototype.defaultOptions.dictInvalidFileType = "Solo se pueden subir imagenes.";
Dropzone.prototype.defaultOptions.dictResponseError = "El servidor respondio con {{statusCode}}.";
Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancela la subida";
Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "Estas seguro que quieres cancelar esta subida?";
Dropzone.prototype.defaultOptions.dictRemoveFile = "Remover archivo";
Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "Ya no pudes subir mas archivos";


var myDropzone = $("#dropzone-products").dropzone({
	paramName: 'data',
	url: `${baseURL}/panel/products/file-upload`,
	maxFiles: 10,
	addRemoveLinks: true,
	acceptedFiles: 'image/*',
	init: function () {

		var dropzone = this;
		if ($('#files').length) {
			$.each(JSON.parse($('#files').val()), function(index, val) {

				let type = val.file_name.split('.')[1];

				var mockFile = {
		      name: val.file_name,
		      size: val.file_size, 
		      // type: `image/${type}`,
		      accepted: true,
		      id:val.id
		    };


		    dropzone.files.push(mockFile);  
		    dropzone.emit("addedfile", mockFile);
		    dropzone.emit("thumbnail", mockFile, `${baseURL}/uploads/products/${val.file_name}`);
		    dropzone.emit("complete", mockFile); 
				
			});
		}

		this.on("removedfile", function(file){
			$.get(`${baseURL}/panel/products/delete-file/${file.id}/${file.name}`);
			console.log(file)
		});
    
	}
});



var options = {
	url: `${baseURL}/panel/products/get-taxonomy/brand`, 
	getValue: "name",
	list: {
		match: {
			enabled: true
		}
	}
};

$("#brand").easyAutocomplete(options);
options.url = `${baseURL}/panel/products/get-taxonomy/model`;
$("#model").easyAutocomplete(options);


$('.publish').on('click', function() {
	
	var id = $(this).data('id');
	var text = $(this).text();

	var date = moment().unix();

	$('select[name="status"]').removeAttr('selected');

	if (text == 'Baneado') {
		$('select[name="status"]').val('baned')
	}else if (text == 'Publicado') {
		$('select[name="status"]').val('publish')
	}else{
		$('select[name="status"]').val('');
	}

	$('select[name="status"]').change();
	$('input#id').val(id);
	$('input#date').val(date);


	$('#modal_mini').modal();
});

